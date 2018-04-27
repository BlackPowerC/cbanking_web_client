<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 26/03/18
 * Time: 13:10
 */

defined('BASEPATH') OR exit('No direct script access allowed');
defined('REST') OR exit('REST API unreachable');

/**
 * Class Home.
 * Cette classe est le controlleur de la page personnelle de
 * l'employé.
 */
class Home extends CI_Controller
{
    /**
     * Ce tableau contient les données à afficher dans la vue.
     * @array
     */
    private $data ;

    public function __construct()
    {
        parent::__construct() ;
        $this->load->library(['session', 'form_validation', 'HTML']) ;
        $this->load->helper(['url', 'form', 'util']) ;

        // Le différentes variable de la vue
        $this->data['customers'] = null ;
        $this->data['subordinates'] = null ;
    }

    public function index()
    {
        // En cas de non connexion
        if(!$this->session->has_userdata('token') or $this->session->userdata('token') === "")
        {
            // redirection vers la page de connection
            redirect("signin", "location", 302) ;
            exit(0) ;
        }

        $this->data['error_msg'] = '' ;
        try
        {
            $this->data['customers'] = get(REST,
                "/customer/get/all") ;

            $this->data['subordinates'] = post(REST,
                "/employee/subordinate/get/all", ['token'=>$this->session->userdata('token')]) ;
        }
        catch(Exception $exception)
        {
            $this->data['error_msg'] = '<div class="alert alert-warning">'.$exception->getMessage().'</div>';
        }

        // Récupération des infos depuis l'API Rest
        $this->load->view("home", $this->data) ;
    }

    /**
     * Affiche la page personel de l'employé
     */
    public function profile()
    {
        // En cas de non connexion
        if(!$this->session->has_userdata('token') or $this->session->userdata('token') === "")
        {
            // redirection vers la page de connection
            redirect("signin", "location", 302) ;
            exit(0) ;
        }
        $data['name'] = $this->session->userdata('name') ;
        $data['surname'] = $this->session->userdata('surname') ;
        $data['email'] = $this->session->userdata('email') ;
        $this->load->view("ace/employee_profile", $data) ;
    }
}