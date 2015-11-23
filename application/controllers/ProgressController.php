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

        $this->load->view('ProgressView', $data);
    }
    
    public function json(){
        $this->load->model('Progress_model');
        
        if ($this->input->post('Type') == 'tourney') {
            $result = $this->Progress_model->TourneyOphalen($this->input->post('GoogleID'));
        }
        else if ($this->input->post('Type') == 'free') {
            $result = $this->Progress_model->GameOphalen($this->input->post('GoogleID'), 0);
        }
        else if($this->input->post('Type') == 'freeProgress'){
            $result = $this->Progress_model->StatistiekenOphalen($this->input->post('GameID'), 'Free');
        }
        else if($this->input->post('Type') == 'tourneyProgress'){
            $result[] = $this->Progress_model->TournooiStatsOphalen($this->input->post('TournamentID'));
        }
        
        echo json_encode($result);
    }
}