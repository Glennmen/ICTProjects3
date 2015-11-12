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
        $data['nav'] = $this->navbar->get_navbar();
        $data['First_Name'] = $this->session->userdata("First_Name");
        $data['Last_Name'] = $this->session->userdata("Last_Name");

        $this->load->view('MainView', $data);
    }

}

