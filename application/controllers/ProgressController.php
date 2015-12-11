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
        $googleID = $_SESSION['Google_ID'];
        $this->load->model('Progress_model');
        $data['chart1'] = $this->Progress_model->makeTotalChart($googleID);
        $data['chart2'] = $this->Progress_model->makeStrikesChart($googleID);
        $data['chart3'] = $this->Progress_model->makeSparesChart($googleID);
        
        $this->load->view('ProgressView', $data);
    }
    
    public function json(){
        $googleID = $_SESSION['Google_ID'];
        $this->load->model('Progress_model');
        
        if ($this->input->post('Type') == 'tourney') {
            $result = $this->Progress_model->TourneyOphalen($googleID);
        }
        else if ($this->input->post('Type') == 'free') {
            $result = $this->Progress_model->GameOphalen($googleID, 0);
        }
        else if($this->input->post('Type') == 'freeProgress'){
            $result = $this->Progress_model->StatistiekenOphalen($this->input->post('GameID'));
        }
        else if($this->input->post('Type') == 'tourneyProgress'){
            $result = $this->Progress_model->TournooiStatsOphalen($this->input->post('TournamentID'));
        }
        
        echo json_encode($result);
    }
}