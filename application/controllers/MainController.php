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
        $googleID = $_SESSION['Google_ID'];
        $this->load->model('Main_model');
        $this->load->library('navbar');
        $this->load->library('popup');
        
        $this->form_validation->set_rules('nicknameText', 'Name','required|callback_nicknameCheck');
        
        if(isset($_POST['nicknameText'])){
        $newNickname = $_POST['nicknameText'];
        if($this->form_validation->run()==FALSE){
        
        }else{
            $this->Main_model->setNickname($googleID,$newNickname);
         }
        }
        
        
       
        $data['nav'] = $this->navbar->get_navbar();
        
        $result = $this->Main_model->getNickname($googleID);
       
        if($result == NULL){
            $data['popup'] = $this->popup->get_Popup();
            
        }  else {
            $data['popup'] = '';    
        }
        //$data['popup'] = '';
        $data['First_Name'] = $this->session->userdata("First_Name");
        $data['Last_Name'] = $this->session->userdata("Last_Name");

        $data['uitnodigingen'] = $this->Main_model->getAantalUitnodigingen($googleID);
        $data['chart'] = $this->Main_model->makeChart($googleID);

        $this->load->view('MainView', $data);
        
       
    }
    
    public function nicknameCheck($newNickname){
        
        $this->load->model('Main_model');
        $aNicknames = $this->Main_model->getAllNicknames();
        foreach($aNicknames as $sNickname){
            if ($sNickname->Nickname == $newNickname){
                $this->form_validation->set_message('nicknameCheck', 'Nickname is niet uniek');
                return false;
            }
        }
        return true;
        
    }

}

