<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 17/03/18
 * Time: 17:24
 */
defined('BASEPATH') OR exit('No direct script access allowed');
defined('VENDOR') OR exit('No direct script access allowed');

require_once VENDOR."autoload.php" ;

use Guzzle\Http\Client ;
use Guzzle\Http\Exception\RequestException ;

/**
 * Class Signup.
 * Cette classe est le controlleur de la page d'inscription.
 */
class Signup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct() ;
        $this->load->library(['session', 'form_validation']) ;
        $this->load->helpers(['url', 'form']) ;
    }

    /**
     * Cette fonction affiche le formulaire de connexion.
     */
    public function index()
    {
        $this->load->view("signup") ;
    }

    /**
     * Cette fonction vérifie si un nom contient des caractères illégaux.
     * @param string $name
     */
    public function check_name(string $name)
    {

    }

    /**
     * Cette fonction vérifie la robustesse des mot de passe.
     * @param string $password
     */
    public function check_password(string $password)
    {

    }
}