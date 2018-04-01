<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 17/03/18
 * Time: 17:24
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Signup.
 * Cette classe est le controlleur de la page d'inscription.
 */
class Signup extends CI_Controller
{
    /**
     * Tableau contenant les variables à afficher dans la vue
     * @var array
     */
    protected $data ;

    public function __construct()
    {
        parent::__construct() ;
        /* Chargement des helpers et library */
        $this->load->library(['session', 'form_validation']) ;
        $this->load->helpers(['url', 'form', 'util']) ;
    }

    /**
     * Cette fonction affiche le formulaire de inscription.
     */
    public function index()
    {
        // En cas de non connexion
        if(!$this->session->has_userdata('token') or $this->session->userdata('token') === "")
        {
            // redirection vers la page de connection
            redirect("signin", "location", 302) ;
            exit(0) ;
        }

        $this->data['status_code'] = 0 ;
        $this->data['error_msg'] = '' ;

        /* validation de formulaire */
        // Le nom
        $this->form_validation->set_rules("name", "nom réel",
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
                    'email'=>$this->input->post("e-mail"),
                    'passwd'=>$this->input->post("passwd"),
                    'type'=>$this->input->post("type")
                ] ;

                $response = post("http://localhost:8181",
                    "/subscription/{$this->session->userdata('token')}",
                    $ids) ;
                $this->data['status_code'] = $response['status'] ;
            }catch (Exception $exception)
            {
                $this->data['error_msg'] = '<div class="alert alert-warning">'.$exception->getMessage().'</div>';
            }
        }

        $this->load->view("signup", $this->data) ;
    }
}