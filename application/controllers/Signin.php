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

use Guzzle\Http\Client ;
use Guzzle\Http\Exception\RequestException ;

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
        $this->load->helper(['url', 'form', 'cookie']) ;
    }

    public function index()
    {
        if($this->session->has_userdata('token') and $this->session->userdata('token') !== "")
        {
            // redirection vers la page personnelle
            redirect("home", "location", 302) ;
            exit() ;
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
                /* envoie des données au serveur REST */
                try
                {
                    $ids = json_encode(['email'=>$this->input->post('e-mail'),
                        "passwd"=>$this->input->post('passwd')]);
                    $client = new Client() ;
                    $request = $client->post("http://localhost:8181/authentification", [], $ids);
                    $response = $request->send() ;
                    // cookies
                    $this->session->set_userdata([
                            'token'=>$response->json()['token'],
                            'email'=>$this->input->post('e-mail')
                    ]) ;
                    set_cookie('token', $response->json()['token'],'86400') ;
                    set_cookie('email', $this->input->post('e-mail'),'86400') ;
                    // redirection vers la page personnelles
                    redirect('home', 'location', 302) ;
                    exit(0) ;
                }
                catch(RequestException $exception)
                {
                    echo $exception->getMessage().'</br>';
                    ?>
                    <a href="signin">Réessayer</a>
                    <?php
                    die(-1) ;
                }
            }
        $this->load->view("signin") ;
    }
}