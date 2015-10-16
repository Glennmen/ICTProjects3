<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');


class TournamentController extends CI_Controller{
    
    public function index(){
        
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        
        $this->form_validation->set_rules('tournamentName', 'Name','required');
        $this->form_validation->set_rules('tournamentStartDate', 'StartDate','required');
        $this->form_validation->set_rules('tournamentEndDate', 'EndDate','required');
        
        if(isset($_POST['CreateTournament'])){
            if($this->form_validation->run()==FALSE){
                $this->load->view('TournamentView', $data);
            }else{
              $aTournamentData = [
                  'Naam' => $this->input->post('tournamentName'),
                  'Begin_Datum' => $this->input->post('tournamentStartDate'),
                  'Eind_Datum' => $this->input->post('tournamentEndDate'),
                  'Eigenaar_ID' => 1,
              ];
              
              $this->load->model('Tournament_model');
              $this->Tournament_model->TournamentToevoegen($aTournamentData);
              
              $this->load->view('TournamentView', $data);
            }
        }else{
            
            $this->load->view('TournamentView', $data);
        }
        
    }
    
}

