<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 26/03/18
 * Time: 13:10
 */

defined('BASEPATH') OR exit('No direct script access allowed');
defined('VENDOR') OR exit('No direct script access allowed');

require_once VENDOR."autoload.php" ;

use Guzzle\Http\Client ;
use Guzzle\Http\Exception\RequestException ;

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
        $data['subordinates'] = null ;
        $request = null ;
        $response = null ;
        // Récupération des infos depuis l'API Rest
        try
        {
            $client = new Client() ;
            $token['token'] = $this->session->userdata('token') ;
            $request = $client->post("http://localhost:8181/employee/subordinate/get/all", [], json_encode($token)) ;
            $response = $request->send() ;
            $data['subordinates'] = $response->getBody(TRUE) ;
            var_dump($_SESSION) ;
        }
        catch(RequestException $re)
        {
            echo $re->getMessage().'<br/>' ;
            echo $request->getBody().'<br/>' ;
            $data['subordinates'] = json_decode('[
	{"id":1, "name":"titianne", "email":"titianne@gmail.com", "passwd":""},
{"id":3, "name":"thierrno", "email":"thierrno@gmail.com", "passwd":""},
{"id":15, "name":"koffi", "email":"tintin@gmail.com", "passwd":""},
{
"id":16,
"name":"ablavi",
"email":"abla@gmail.com",
"passwd":"",
"accounts":
	[
	{"id":1, "creationDate":"26-02-2018", "balance":1998.950000}
	]
},
{"id":17, "name":"dalida", "email":"dalida@gmail.com", "passwd":""},
{"id":18, "name":"nabine", "email":"nabin@gmail.com", "passwd":""}	]', TRUE) ;
        }
        $this->load->view("home", $data) ;
    }
}