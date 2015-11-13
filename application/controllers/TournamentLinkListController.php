<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');
//
class TournamentLinkListController extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->require_login();
    }

    protected function require_login() {
        if(empty($_SESSION['Google_ID'])) {
            redirect('../OAuthController', 'refresh');
        }
    }


    public function index(){
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        $data['aTournamentListData'] = $this->view_list();
        $this->load->view('TournamentLinkListView', $data);
    }
    
    public function view_list(){
        $this->load->model('Tournament_model');
        $result = $this->Tournament_model->AllAcceptedTournaments(1); //komt googleID
        if ($result != false) {
            return $result;
        }else{
            return null;
        }
    }
}
?>
