<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');

//
class InvitesController extends CI_Controller{
    
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
}

