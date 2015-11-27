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
        $this->load->model('Main_model');
        $this->load->library('navbar');
        $this->load->library('popup');
        
        
        if(isset($_POST['nicknameText'])){
        $newNickname = $_POST['nicknameText'];
        $this->Main_model->setNickname($_SESSION['Google_ID'],$newNickname);
        
        }
        
        
       
        $data['nav'] = $this->navbar->get_navbar();
        
        $result = $this->Main_model->getNickname($_SESSION['Google_ID']);
       
        if($result == NULL){
            $data['popup'] = $this->popup->get_Popup();
            $this->form_validation->set_rules('nicknameText', 'Name','required|is_unique');
        }  else {
            $data['popup'] = '';    
        }
        //$data['popup'] = '';
        $data['First_Name'] = $this->session->userdata("First_Name");
        $data['Last_Name'] = $this->session->userdata("Last_Name");

        $googleID = 2;

        $data['uitnodigingen'] = $this->Main_model->getAantalUitnodigingen($googleID);
        $data['chart'] = $this->Main_model->makeChart($googleID);

        $this->load->view('MainView', $data);
        
       
    }

}

