<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');
//
class TournamentListController extends CI_Controller {
    public function index(){
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        
        if(isset($_POST['SelectTournament'])){
            $data['aParticipants'] = $this->view_participants();
            //$data['aScore'] = $this->view_score();
            $this->load->view('TournamentInfoView',$data);
        }
        else{
            $data['aTournamentListData'] = $this->view_list();
            $this->load->view('TournamentListView', $data);
        }
    }
    
    public function view_participants() {
        $this->load->model('Tournament_model');
        $result = $this->Tournament_model->AllParticipants(1);
        if ($result != false) {
            return $result;
        } else {
            return null;
        }
    }
    
    public function view_list(){
        $this->load->model('Tournament_model');
        $result = $this->Tournament_model->AllAcceptedTournaments(1); //komt googleID
        if ($result != false) {
            return $result;
        }else{
            return null;
        }
    }
    
    public function MobileApp(){
        $this->load->model('Tournament_model');
        
        $aMobileData = json_decode(file_get_contents('php://input'),true);
        
        if($aMobileData['req'] == "accepted"){
            $result = $this->Tournament_model->AllAcceptedTournaments($aMobileData['Google_ID']); //komt googleID
        }else if($aMobileData['req'] == "inbox"){
            $result = $this->Tournament_model->AllNotAcceptedTournaments($aMobileData['Google_ID']); //komt googleID
        }
        
        echo json_encode($result);
    }
}
?>
