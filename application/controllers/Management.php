<?php

defined('BASEPATH') OR exit('No direct script access allowed') ;
defined('REST') OR exit('REST API unreachable');
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 06/04/18
 * Time: 11:27
 */
class Management extends CI_Controller
{
    public function __construct()
    {
        parent::__construct() ;
        $this->load->library(['HTML', 'session', 'form_validation']) ;
        $this->load->helper(['util', 'url', 'HTML']) ;
    }

    /**
     * Affiche la page de listing des subordonnés.
     */
    public function subordinates()
    {
      // En cas de non connexion
      if(!check_session($this->session))
      {
          // redirection vers la page de connection
          redirect("signin", "location", 302) ;
          exit(0) ;
      }
      $data['error_msg'] = "" ;
      $data['employees'] = null ;
      $data['name'] = $this->session->userdata('name') ;
      $data['view'] = "ace/management/subordinates.php" ;
      try
      {
          $data['employees'] = get(REST, "/employee/subordinate/get/all/{$this->session->userdata('token')}")['json'] ;
      }catch (Exception $exception)
      {
          $data['error_msg'] = '<div class="alert alert-warning">'.$exception->getMessage().'</div>';
      }
      $this->load->view('ace/management/persons', $data) ;
    }

    /**
     * Affiche la page de profil d'un employé.
     * @param $id L'identifiant de l'employé.
     */
    public function subordinate($id)
    {

    }

    /**
     * Affiche la page de profil d'un client.
     * @param $id_customer L'identifiant du client.
     */
    public function customer($id_customer)
    {
        // En cas de non connexion
        if(!check_session($this->session))
        {
            // redirection vers la page de connection
            redirect("signin", "location", 302) ;
            exit(0) ;
        }
        $data['error_msg'] = "" ;
        $data['customer'] = null ;
        try
        {
            $data['customer'] = get(REST, "/customer/get/id/{$id_customer}")['json'] ;
            $data['name'] = $data['customer']['name'] ;
            $data['email'] = $data['customer']['email'] ;
            $data['surname'] = $data['customer']['surname'] ;
            $data['id_customer'] = $id_customer ;
        }catch (Exception $exception)
        {
            $data['error_msg'] = '<div class="alert alert-warning">'.$exception->getMessage().'</div>';
        }
        $this->load->view('ace/management/customer', $data) ;
    }

    /**
     * Affiche la page de listing de tout les clients
     */
    public function customers()
    {
        if(!check_session($this->session))
        {
            redirect("signin", "location", 302) ;
            exit(0) ;
        }
        $data['error_msg'] = "" ;
        $data['name'] = $this->session->userdata("name") ;
        $data['customers'] = null ;
        $data['view'] = "ace/management/customers.php" ;
        try
        {
            $data['customers'] = get(REST, "/customer/get/all/{$this->session->userdata('token')}") ;
        }catch (Exception $exception)
        {
            $data['error_msg'] = '<div class="alert alert-warning">'.$exception->getMessage().'</div>';
        }
        $this->load->view('ace/management/persons', $data) ;
    }

    /**
     * Affiche la page d'inscription d'un employé ou d'un client.
     */
    public function subscription()
    {
        // En cas de non session
        if(!check_session($this->session))
        {
            redirect("signin", "location", 302) ;
            exit(0) ;
        }
        $data['status_code'] = 0 ;
        $data['error_msg'] = '' ;
        $data['name'] = $this->session->userdata("name") ;

        /* validation de formulaire */
        // Le nom
        $this->form_validation->set_rules("name", "nom réel",
            ['required', 'strip_tags', 'trim', 'alpha'],
            ['required'=>'Le {field} est obligatoire',
                'check_name'=>'Le {field} ne peut contenir que des caractères alphabétiques']) ;
        // Le prénom
        $this->form_validation->set_rules("surname", "prénom",
            ['required', 'strip_tags', 'trim', 'alpha'],
            ['required'=>'Le {field} est obligatoire',
                'check_name'=>'Le {field} ne peut contenir que des caractères alphabétiques']) ;
        // L'email
        $this->form_validation->set_rules("e-mail", "addresse électronique",
            ['required', 'strip_tags', 'trim'],
            ['required'=>'L\' {field} est obligatoire']) ;
        // Le mot de passe
        $this->form_validation->set_rules("passwd", "mot de passe",
            ['required', 'strip_tags', 'trim', 'check_password'],
            ['required'=>'L\' {field} est obligatoire',
                'check_password'=>'Le {field} doit contenir au moins 6 caractères avec des chiffres et des lettres']) ;

        if($this->form_validation->run())
        {
            try
            {
                $ids = [
                    'name'=>$this->input->post("name"),
                    'surname'=>$this->input->post("surname"),
                    'email'=>$this->input->post("e-mail"),
                    'passwd'=>$this->input->post("passwd"),
                    'type'=>$this->input->post("type")
                ] ;

                $response = post(REST,
                    "/subscription/{$this->session->userdata('token')}",
                    $ids) ;
                $data['status_code'] = $response['status'] ;
            }catch (Exception $exception)
            {
                $data['error_msg'] = '<div class="alert alert-warning">'.$exception->getMessage().'</div>';
            }
        }

        $this->load->view("ace/management/subscription", $data) ;
    }
}
