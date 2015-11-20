<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');
//
class MainController extends CI_Controller {

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


    public function index()
    {
        $this->load->library('navbar');
        $this->load->library('nicknamePopup');
        $this->load->model('Main_model');
        $data['nav'] = $this->navbar->get_navbar();
        /*if($this->Main_model->getNickname(2) != null){
            $data['popup'] = $this->nicknamePopup->get_Popup();
        }  else {
            $data['popup'] = "";    
        }*/
        $data['First_Name'] = $this->session->userdata("First_Name");
        $data['Last_Name'] = $this->session->userdata("Last_Name");

        $googleID = 2;

        $data['uitnodigingen'] = $this->Main_model->getAantalUitnodigingen($googleID);
        $data['chart'] = $this->Main_model->makeChart($googleID);

        $this->load->view('MainView', $data);
    }

}

