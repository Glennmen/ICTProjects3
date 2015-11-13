<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');
//
class TournamentInfoController extends CI_Controller {

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

        $data['aParticipants'] = $this->view_participants();
        //$data['aScore'] = $this->view_score();
        $this->load->view('TournamentInfoView',$data);

    }

    public function view_participants() {
        $this->load->model('Tournament_model');
        $result = $this->Tournament_model->AllParticipants(1);
        if ($result != false) {
            return $result;
        } else {
            return null;
        }
    }
}
?>