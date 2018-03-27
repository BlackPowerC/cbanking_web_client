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

    public function index(int $clientID)
    {
        $this->load->view("banking/banking") ;
    }

}