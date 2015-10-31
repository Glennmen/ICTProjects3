<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');

class ProfileController extends CI_Controller{
    public function index(){
        
        $this->load->library('navbar');
      //  $this->load->model('Profile_model');
      //  $data = $this->Profile_model->GetProfile(2);
        
        $data['nav'] = $this->navbar->get_navbar();   
         
    $this->form_validation->set_rules('Last_Name','Achternaam','required');    
    $this->form_validation->set_rules('First_Name','Voornaam','required');    
    $this->form_validation->set_rules('Email', 'Email', 'valid_email');
    
    if (isset($_POST['UpdateProfile'])) {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('ProfileView', $data);
            } else {
                
                $aProfileData = [
                    'Google_ID' => 2,
                    'Last_Name' => $this->input->post('Last_Name'),
                    'First_Name' => $this->input->post('First_Name'),
                    'Email' => $this->input->post('Email'),
                    'Nickname' => $this->input->post('Nickname'),
                    'GSM' => $this->input->post('GSM'),
                ];


                $this->load->model('Profile_model');
                $this->Profile_model->UpdateProfile($aProfileData,2);

                $this->load->view('ProfileView', $data);
            }
        } else {
            $this->load->view('ProfileView', $data);
        }
    
    }
}