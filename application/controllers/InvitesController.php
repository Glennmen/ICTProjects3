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
        $googleID = $_SESSION['Google_ID'];
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        $data['removeUrl'] = "";

        $data['aInvitesListData'] = $this->view_invites($googleID);
        $data['aTournamentListData'] = $this->view_tournaments($googleID);
        
        $this->load->view('InvitesView', $data);
        
    }
    public function view_invites($googleID){
        $this->load->model('Tournament_model');
        $result = $this->Tournament_model->AllNotAcceptedTournaments($googleID);
        if ($result != false) {
            return $result;
        }else{
            return null;
        }
    }
    
    public function view_tournaments($googleID){
        $this->load->model('Tournament_model');
        $result = $this->Tournament_model->AllAcceptedTournaments($googleID);
        if ($result != false) {
            return $result;
        }else{
            return null;
        }
    }
    
    public function changeInvites(){
        $googleID = $_SESSION['Google_ID'];
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        $this->load->model('Invites_model');
        
        $data['removeUrl'] = "if (typeof window.history.replaceState == 'function') {
        history.replaceState({}, '', window.location.href.slice(0, -14));
            }";
        
        if(isset($_POST['Accept'])){
            $toernooiID = $_POST['Accept'];
            $this->Invites_model->Accepted($googleID,$toernooiID);
        }else if(isset($_POST['Decline'])){
            $toernooiID = $_POST['Decline'];
            $this->Invites_model->Declined($googleID,$toernooiID);
        }
        
        $data['aInvitesListData'] = $this->view_invites($googleID);
        $data['aTournamentListData'] = $this->view_tournaments($googleID);
        $this->load->view('InvitesView', $data);
    }
    
    public function viewInfo() {
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        
        $toernooiID = $_POST['SelectedTournament'];

        $data['aParticipants'] = $this->view_participants($toernooiID);
        $this->load->view('TournamentInfoView',$data);
    }
    
    public function view_participants($toernooiID) {
        $this->load->model('Tournament_model');
        $result = $this->Tournament_model->AllParticipants($toernooiID);
        if ($result != false) {
            return $result;
        } else {
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

