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
        // chargement des bibliotheques et des helpers
        $this->load->library(['session', 'form_validation']) ;
        $this->load->helper(['url', 'form', 'util']) ;
    }

    /**
     * Cette fonction traites les données venant du
     * formulaire de création de compte.
     */
    public function create()
    {
        $balance = floatval($this->input->post('balance')) ;
        $extra = floatval($this->input->post('extra')) ;
        $id_customer = (int) $this->input->post('id_customer') ;
        $account_type = ((int) ($this->input->post('type'))) ? 'savings account': 'current account' ;
        $post = [
            'customer'=>$id_customer, // id du client
            'creationDate'=> date("d-m-Y H:i:s"), // date de création
            'balance'=>$balance, // montant initiale
            'type'=>$account_type, // type de compte
            'extra'=>$extra, // découvert ou taux
            'token'=>$this->session->userdata('token') // jetton d'identification
        ] ;

        // Règle de validation
        $this->form_validation->set_rules("balance", "montant initiale",
            ['required', 'trim', 'strip_tags', 'greater_than[100]'],
            ['greater_than'=> "Le {field} doit être supérieur à 100",
                'required'=> "Le champ {field} est requis"]) ;
        $this->form_validation->set_rules("extra", "extra",
            ['required', 'trim', 'strip_tags', 'greater_than[10]'],
            ['greater_than'=> "L'{field} doit être supérieur à 10",
                'required'=> "Le champ {field} est requis"]) ;

        if($this->form_validation->run() === FALSE)
        {
            $this->load->view("banking/error") ;
        }
        else
        {
            try
            {
                $response = post("http://localhost:8181", "/account/add/", $post) ;
            }catch (Exception $exception)
            {
                echo $exception->getMessage().'<br/>' ;
                echo '<a href="http://[::1]/~jordy/cbanking_web_client.git/index.php/banking?id_customer='.$this->input->post('id_customer').'" title="banking">Réessayer !</a>' ;
                die(-1) ;
            }
            redirect("banking?id_customer={$this->input->post('id_customer')}", "location", 302) ;
            exit(0) ;
        }
    }

    public function index()
    {
        // En cas de non connexion
        if(!$this->session->has_userdata('token') or $this->session->userdata('token') === "")
        {
            // redirection vers la page de connection
            redirect("signin", "location", 302) ;
            exit(0) ;
        }
        $this->data['error_msg'] = '' ;

        $this->data['id_customer'] = $this->input->get('id_customer') ;
        // Le vrai job
        try
        {
            // Toutes les infos utiles du client en json to array
            $this->data['customer'] = get('http://localhost:8181', "/customer/get/id/{$this->data['id_customer']}")['json'] ;
        }
        catch(Exception $exception)
        {
            $this->data['error_msg'] = '<div class="alert alert-warning">'.$exception->getMessage().'</div>';
        }

        $this->load->view("banking/banking", $this->data) ;
    }

}