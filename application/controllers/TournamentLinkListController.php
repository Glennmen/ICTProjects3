<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');

class TournamentLinkListController extends CI_Controller {
    public function index(){
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        if(isset($_POST['SelectTournament'])){
            $this->load->view('TournamentInfo');
            
        }
        else
        {
            $data['aTournamentListData'] = $this->view_list();
            $this->load->view('TournamentLinkListView', $data);
        }
    }
    
    public function view_list(){
        $this->load->model('TournamentList_model');
        $result = $this->TournamentList_model->AllTournaments(1); //komt googleID
        if ($result != false) {
            return $result;
        }else{
            return null;
        }
    }
}
?>
