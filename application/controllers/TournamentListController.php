<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');
//
class TournamentListController extends CI_Controller {
    public function index(){
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        
        if(isset($_POST['SelectTournament'])){
            $this->load->view('Gameview1');
        }
        else
        {
            $data['aTournamentListData'] = $this->view_list();
            $this->load->view('TournamentListView', $data);
        }
    }
    
    public function view_list(){
        $this->load->model('TournamentList_model');
        $result = $this->TournamentList_model->AllAcceptedTournaments(1); //komt googleID
        if ($result != false) {
            return $result;
        }else{
            return null;
        }
    }
    
    public function MobileApp(){
        $this->load->model('TournamentList_model');
        
        $aMobileData = json_decode(file_get_contents('php://input'),true);
        
        $result = $this->TournamentList_model->AllAcceptedTournaments($aMobileData['Google_ID']); //komt googleID
        
        echo json_encode($result);
    }
}
?>
