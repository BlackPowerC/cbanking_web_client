<?php
/**
 * Created by PhpStorm.
 * User: jordy
 * Date: 27/03/18
 * Time: 21:59
 */

defined('BASEPATH') OR exit('No direct script access allowed');
defined('REST') OR exit('REST API unreachable');

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
        $this->load->library(['session', 'form_validation', 'HTML']) ;
        $this->load->helper(['url', 'form', 'util']) ;
    }

    /**
     * Cette fonction affiche le formualaire de création de compte
     * pour un client.
     * @param $id_customer int L'identifiant du client.
     */
    public function create(int $id_customer)
    {
        // En cas de non connexion
        if(!check_session($this->session))
        {
            redirect("signin", "location", 302) ;
            exit(0) ;
        }
        // Validation de formulaire
        $balance = floatval($this->input->post('balance')) ;
        $extra = floatval($this->input->post('extra')) ;
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
        $this->form_validation->set_rules("balance", "montant initial",
            ['required', 'trim', 'strip_tags', 'greater_than[100]'],
            ['greater_than'=> "Le {field} doit être supérieur à 100",
                'required'=> "Le champ {field} est requis"]) ;
        $this->form_validation->set_rules("extra", "extra",
            ['required', 'trim', 'strip_tags', 'greater_than[2]'],
            ['greater_than'=> "L'{field} doit être supérieur à 2",
                'required'=> "Le champ {field} est requis"]) ;

        // Données à afficher dans la vue.
        $data['name'] = $this->session->userdata('name') ;
        $data['customer'] = NULL ;
        $data['error_msg'] = '' ;
        try
        {
            $data['customer'] = get(REST, "/customer/get/id/{$id_customer}?token={$this->session->userdata('token')}");
        }
        catch (Exception $exception)
        {
            $data['error_msg'] = $exception->getMessage() ;
        }
        if($this->form_validation->run())
        {
            try
            {
                post(REST, "/account/add", $post) ;
                $data['error_msg'] = "Compte créer avec succès !" ;
            }
            catch (Exception $exception)
            {
                $data['error_msg'] = $exception->getMessage() ;
            }
        }
        $this->load->view("ace/banking/create", $data) ;
    }

    /**
     * Cette fonction traite les données venant du
     * formulaire des opérations de banque.
     */
    public function operation(int $id_account)
    {
        // Règle de validation
        $this->form_validation->set_rules("balance", "montant de la transaction",
            ['required', 'trim', 'strip_tags', 'greater_than[1]'],
            ['greater_than'=> "Le {field} doit être supérieur à 1",
                'required'=> "Le champ {field} est requis"]) ;

        $data['error_msg'] = "" ;
        $data['name'] = $this->session->userdata('name') ;
        $data['account'] = NULL ;

        if($this->form_validation->run())
        {
            $balance = floatval($this->input->post('balance')) ;
            $operation_type = ((int) ($this->input->post('type'))) ? 'retrait': 'depot' ;
            $post = [
                'date'=> date("d-m-Y H:i:s"), // date de l'opération
                'balance'=>$balance, // montant initiale
                'type'=>$operation_type, // type d'opération
                'account'=>$id_account, // type d'opération
                'token'=>$this->session->userdata('token') // jetton d'identification
            ] ;
            try
            {
                post(REST, "/operation/add/", $post) ;
                $data['error_msg'] = "Opération éffectuée avec succès !" ;
            }catch (Exception $exception)
            {
                $data['error_msg'] = $exception->getMessage();
            }
        }

        try
        {
            $data['account'] = get(REST, "/account/get/{$id_account}?token={$this->session->userdata('token')}")['json'] ;
        }
        catch (Exception $exception)
        {
            $data['error_msg'] = $exception->getMessage() ;
        }
        $this->load->view("ace/banking/operation", $data) ;
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
            $this->data['customer'] = get(REST, "/customer/get/id/{$this->data['id_customer']}")['json'] ;
        }
        catch(Exception $exception)
        {
            $this->data['error_msg'] = '<div class="alert alert-warning">'.$exception->getMessage().'</div>';
        }

        $this->load->view("banking/banking", $this->data) ;
    }

    /**
     * Affiche la page de la liste de tout les comptes.
     */
    public function accounts()
    {
        // En cas de non connexion
        if(!check_session($this->session))
        {
            redirect("signin", "location", 302) ;
            exit(0) ;
        }
        $data['error_msg'] = "" ;
        $data['name'] = $this->session->userdata('name') ;
        $data['accounts'] = NULL ;
        try
        {
            $data['accounts'] = get(REST, "/account/get/all/{$this->session->userdata("token")}") ;
        }catch (Exception $exception)
        {
            $data['error_msg'] = $exception->getMessage() ;
        }

        $this->load->view("ace/banking/accounts", $data) ;
    }

    /**
     * Affiche la page détaillé d'un compte bancaire.
     * @param $id int L'identifiant du compte.
     */
    public function account(int $id)
    {
        // En cas de non connexion
        if(!check_session($this->session))
        {
            redirect("signin", "location", 302) ;
            exit(0) ;
        }
        $data['error_msg'] = "" ;
        $data['name'] = $this->session->userdata('name') ;
        $data['account'] = NULL ;
        try
        {
            $data['account'] = get(REST, "/account/get/{$id}?token={$this->session->userdata('token')}")['json'] ;
        }
        catch (Exception $exception)
        {
            $data['error_msg'] = $exception->getMessage() ;
        }
        $this->load->view("ace/banking/account", $data) ;
    }

}
