<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 27/03/18
 * Time: 21:59
 */

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Banking.
 * Cette classe est le contructeur de la page permettant de faire
 * les opérations bancaires.
 */
class Banking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct() ;
    }

    public function index()
    {
        $clientID = $this->input->post('customer_id') ;
        // chargement des bibliotheques et des helpers
        $this->load->library('session') ;
        $this->load->helper(['url', 'form', 'util']) ;
        // Le vrai job
        // $params['token'] = $this->session->userdata('token') ;
        $params['url'] = "http://localhost:8181/customer/get/id/{$clientID}" ;
        // Toutes les infos utiles du client en json to array
        $data['customer'] = getDataFromAPI('GET', $params) ;
        $this->load->view("banking/banking", $data) ;
        var_dump($data) ;
    }

}