<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 16/03/18
 * Time: 14:56
 */
defined('BASEPATH') OR exit('No direct script access allowed');
defined('VENDOR') OR exit('No direct script access allowed');

require_once VENDOR."autoload.php" ;
use GuzzleHttp\Client ;

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
        $this->load->library('form_validation') ;
        $this->load->helper(['url', 'form']) ;
    }

    public function index()
    {
        // règles de validations
        $this->form_validation->set_rules("e-mail", "Addresse électronique",
            ["trim", "strip_tags", "required"],
            ["required"=>"Le {field} est requis !"]) ;

        $this->form_validation->set_rules("passwd", "Mot de passe",
            ["trim", "strip_tags", "required"],
            ["required"=>"Le {field} est requis !"]) ;

        if($this->form_validation->run())
        {

        }
        else
        {
            $this->load->view("signin") ;
        }
    }
}