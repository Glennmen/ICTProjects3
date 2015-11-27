<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');


class InvitesController extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->require_login();
        
        // Allow some methods?
            $allowed = array(
                'MobileApp'
            );
            if ( ! in_array($this->router->fetch_method(), $allowed))
            {
                
            }
        
    }

    protected function require_login() {
        if(empty($_SESSION['Google_ID'])) {
            redirect('../OAuthController', 'refresh');
        }
    }

    
    public function index(){
        $googleID = 1;
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        
        if(isset($_POST['Accept'])){
            $this->load->model('Invites_model');
            $toernooiID = $_POST['Accept'];
            $this->Invites_model->Accepted($googleID,$toernooiID);
            
            $data['aTournamentListData'] = $this->view_list();
            $this->load->view('InvitesView', $data);
        }else if(isset($_POST['Decline'])){
            $this->load->model('Invites_model');
            $toernooiID = $_POST['Decline'];
            $this->Invites_model->Declined($googleID,$toernooiID);
            
            $data['aTournamentListData'] = $this->view_list();
            $this->load->view('InvitesView', $data);
        }else{
            $data['aTournamentListData'] = $this->view_list();
            $this->load->view('InvitesView', $data);
        }
        
    }
    public function view_list(){
        $this->load->model('TournamentList_model');
        $result = $this->TournamentList_model->AllNotAcceptedTournaments(1); //komt googleID
        if ($result != false) {
            return $result;
        }else{
            return null;
        }
    }
    
    public function mobileApp(){
        $this->load->model('Invites_model');
        
        $aMobileData = json_decode(file_get_contents('php://input'),true);
        
        if($aMobileData['state'] == "accept"){
            $result = $this->Invites_model->AllAcceptedTournaments($aMobileData['Google_ID'],$aMobileData['tournamentID']); 
            $status = array("status"=>"geaccepteerd");
        }else if($aMobileData['state'] == "decline"){
            $result = $this->Invites_model->AllNotAcceptedTournaments($aMobileData['Google_ID'],$aMobileData['tournamentID']); 
            $status = array("status"=>"geweigerd");
        }
        
        echo json_encode($status);
    }
}

