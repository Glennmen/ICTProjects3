<?php

//
if(!defined('BASEPATH'))exit('No direct acces allowed');

class ProgressController extends CI_Controller {

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
        
        $data['aProgressData'] = $this->view_table();
        $this->load->view('ProgressView', $data);
    }
    
    public function view_table(){
        $this->load->model('Progress_model');
        $result = $this->Progress_model->StatistiekenOphalen(3); //komt googleID
        if ($result != false) {
            return $result;
        }else{
            return null;
        }
    }
}