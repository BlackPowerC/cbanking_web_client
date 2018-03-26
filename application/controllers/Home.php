<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 26/03/18
 * Time: 13:10
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct() ;
        $this->load->library(['session', 'form_validation']) ;
        $this->load->helper(['url', 'form']) ;
    }

    public function index()
    {
        $this->load->view("home") ;
    }
}