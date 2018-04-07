<?php

defined('BASEPATH') OR exit('No direct script access allowed') ;
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
        $this->load->library(['HTML', 'session']) ;
        $this->load->helper(['util', 'url']) ;
    }

    /**
     * Affiche la page de listing des subordonnés.
     */
    public function subordinates()
    {

    }

    /**
     * Affiche la page de profil d'un employé.
     * @param $id L'identifiant de l'employé.
     */
    public function subordinate($id)
    {

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
        try
        {
            $data['customers'] = get("http://localhost:8181", '/customer/get/all') ;
        }catch (Exception $exception)
        {
            $data['error_msg'] = '<div class="alert alert-warning">'.$exception->getMessage().'</div>';
        }
        $this->load->view('ace/management/customers', $data) ;
    }

    /**
     * Affiche la page d'inscription d'un employé ou d'un client.
     */
    public function subscription()
    {

    }
}