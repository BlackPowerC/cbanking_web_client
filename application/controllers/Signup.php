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
     * Cette fonction affiche le formulaire de inscription.
     */
    public function index()
    {
        /* validation de formulaire */
        // Le nom
        $this->form_validation->set_rules("name", "nom réel",
            ['required', 'strip_tags', 'trim', 'callback_check_name'],
            ['required'=>'Le {field} est obligatoire',
             'check_name'=>'Le {field} ne peut contenir que des caractères alphabétiques']) ;
        // L'email
        $this->form_validation->set_rules("e-mail", "addresse électronique",
            ['required', 'strip_tags', 'trim'],
            ['required'=>'L\' {field} est obligatoire']) ;
        // Le mot de passe
        $this->form_validation->set_rules("passwd", "mot de passe",
            ['required', 'strip_tags', 'trim', 'callback_check_passwd'],
            ['required'=>'L\' {field} est obligatoire',
                'check_passwd'=>'Le {field} doit contenir au moins 6 caractères avec des chiffres et des lettres']) ;

        if($this->form_validation->run())
        {
            $ids = [
               'name'=>$this->input->post("name"),
               'e-mail'=>$this->input->post("e-mail"),
               'passwd'=>$this->input->post("passwd"),
               'type'=>$this->input->post("type")
            ] ;
            var_dump(json_encode($ids)) ;
        }
        $this->load->view("signup") ;
    }

    /**
     * Cette fonction vérifie si un nom contient des caractères illégaux.
     * @param string $name
     * @return bool
     */
    public function check_name(string $name): bool
    {
        return preg_match("/^[a-zA-Z]$/", $name) ;
    }

    /**
     * Cette fonction vérifie la robustesse des mot de passe.
     * @param string $password
     * @return bool.²
     */
    public function check_password(string $password): bool
    {
        $num = 0;
        $char = 0;
        if(strlen($password) < 6)
        {
            return FALSE;
        }
        foreach ($password as $char)
        {
            if(is_int($char))
            {
                $num += 1 ;
            }
            else
            {
                $char += 1 ;
            }
        }
        return ($num > 0 && $char > 0) ;
    }
}