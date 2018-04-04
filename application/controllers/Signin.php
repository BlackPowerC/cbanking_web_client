<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 16/03/18
 * Time: 14:56
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @Class Signin
 * Cette classe est le controlleur de la page de connexion.
 */
class Signin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct() ;
        // autoloading
        $this->load->library(['session', 'form_validation']) ;
        $this->load->helper(['url', 'form', 'cookie', 'util']) ;
        // Variable pour les messages d'erreurs
        $this->error_msg['error_msg'] = "" ;
    }

    public function index()
    {
        if($this->session->has_userdata('token') and $this->session->userdata('token') !== "")
        {
            // redirection vers la page personnelle
            redirect("home", "location", 302) ;
            exit(0) ;
        }
        // règles de validations
        $this->form_validation->set_rules("e-mail", "Addresse électronique",
            ["trim", "strip_tags", "required"],
            ["required"=>"Le {field} est requis !"]) ;

        $this->form_validation->set_rules("passwd", "Mot de passe",
            ["trim", "strip_tags", "required"],
            ["required"=>"Le {field} est requis !"]) ;

        if($this->form_validation->run())
        {
            try
            {
                $ids = ['email' => $this->input->post('e-mail'),
                    "passwd" => $this->input->post('passwd')];
                $response = post("http://localhost:8181", "/authentification", $ids);
                if($response['status']  === 200)
                {
                    // cookies
                    $this->session->set_userdata([
                        'token' => $response['json']['token'],
                        'email' => $this->input->post('e-mail'),
//                        'name' => $response['json']['name'],
                        'last' => date("d-m-Y H:i:s")
                    ]);
                    set_cookie('token', $response['json']['token'], '86400');
//                    set_cookie('name', $response['json']['name'], '86400');
                    set_cookie('email', $this->input->post('e-mail'), '86400');
                    set_cookie('last', date("d-m-Y H:i:s"), '86400');
                    // redirection vers la page personnelles
                    redirect('home', 'location', 302);
                    exit(0);
                }
                else
                {
                    echo $response['json'] ;
                }
            }
            catch (Exception $exception)
            {
                $this->error_msg['error_msg'] = '<div class="alert alert-warning">'.$exception->getMessage().'</div>';
            }
        }
        $this->load->view("signin", $this->error_msg) ;
    }
}