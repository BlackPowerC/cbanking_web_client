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
    }

    /**
     * Cette fonction récupère depuis cbankin_rest_api à une URL, des données.
     * @param array $params Un tableau de paramettre à deux clé, url et token.
     * @return array|bool|float|int|null|string
     */
    public function getDataFromAPI(array $params = ['url'=>'localhost:8181', 'token'=>'23321425024549421161211921618911418213413092729622315176208194194234106118104173101211616736141415951461566075101219662762140166180182112771166623369121591147657224'])
    {
        $request = null ;
        $response = null ;
        try
        {
            $client = new Client() ;
            $request = $client->post($params['url'], [], json_encode(['token'=>$params['token']])) ;
            $response = $request->send() ;
            return $response->json() ;
        }
        catch(RequestException $re)
        {
            echo $re->getMessage().'<br/>' ;
            echo $request->getBody().'<br/>' ;
        }
        return null ;
    }

    public function index()
    {

        $this->load->library(['session', 'form_validation']) ;
        $this->load->helper(['url', 'form']) ;

        $this->data['customers'] = $this->getDataFromAPI([
            'url'=>'http://localhost:8181/customer/get/all',
            'token'=>$this->session->userdata('token')
        ]) ;

        $this->data['subordinates'] = $this->getDataFromAPI([
            'url'=>'http://localhost:8181/employee/subordinate/get/all',
            'token'=>$this->session->userdata('token')
        ]) ;

        // Récupération des infos depuis l'API Rest
        $this->load->view("home", $this->data) ;
    }
}