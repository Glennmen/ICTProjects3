<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');

class TournamentListController extends CI_Controller {
    public function index(){
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        
        $data['aTournamentListData'] = $this->view_list();
        $this->load->view('TournamentListView', $data);
    }
    
    public function view_list(){
        $this->load->model('TournamentList_model');
        $result = $this->TournamentList_model->AllTournaments(3); //komt googleID
        if ($result != false) {
            return $result;
        }else{
            return null;
        }
    }
}
?>
