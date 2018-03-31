<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 26/03/18
 * Time: 13:10
 */

defined('BASEPATH') OR exit('No direct script access allowed');

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
        $this->load->library(['session', 'form_validation']) ;
        $this->load->helper(['url', 'form', 'util']) ;
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
            $this->data['customers'] = get("http://localhost:8181",
                "/customer/get/all") ;

            $this->data['subordinates'] = post("http://localhost:8181",
                "/employee/subordinate/get/all", ['token'=>$this->session->userdata('token')]) ;
        }
        catch(Exception $exception)
        {
            $this->data['error_msg'] = '<div class="alert alert-warning">'.$exception->getMessage().'</div>';
        }

        // Récupération des infos depuis l'API Rest
        $this->load->view("home", $this->data) ;
    }
}