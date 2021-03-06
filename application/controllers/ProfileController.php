<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');

class ProfileController extends CI_Controller{
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
        $googleID = $_SESSION['Google_ID'];
        $this->load->library('navbar');
        
        $data['nav'] = $this->navbar->get_navbar();   
         
    $this->form_validation->set_rules('Last_Name','Achternaam','required');    
    $this->form_validation->set_rules('First_Name','Voornaam','required');    
    $this->form_validation->set_rules('Email', 'Email', 'valid_email');
    
    $this->load->model('Profile_model');
    $data['aProfiledata'] = $this->Profile_model->GetProfile($googleID);
    
    if (isset($_POST['UpdateProfile'])) {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('ProfileView', $data);
            } else {
                
                $aProfileData = [
                    'Google_ID' => $googleID,
                    'Last_Name' => $this->input->post('Last_Name'),
                    'First_Name' => $this->input->post('First_Name'),
                    'Email' => $this->input->post('Email'),
                    'Nickname' => $this->input->post('Nickname'),
                    'GSM' => $this->input->post('GSM'),
                ];


                $this->load->model('Profile_model');
                $this->Profile_model->UpdateProfile($aProfileData, $googleID);
               

                $this->load->view('ProfileView', $data);
            }
        } else {
            
            $this->load->view('ProfileView', $data);
        }
    
    }
}