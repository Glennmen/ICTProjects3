<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');
//

class TournamentController extends CI_Controller{
    
    public function index(){
        
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        $data['alert'] = "";
        
        $this->form_validation->set_rules('tournamentName', 'Name','required');
        $this->form_validation->set_rules('tournamentStartDate', 'StartDate','required|callback_dateCheck');
        $this->form_validation->set_rules('tournamentEndDate', 'EndDate','required|callback_dateCheck');
        
        if(isset($_POST['CreateTournament'])){
            if($this->form_validation->run()==FALSE){
                $this->load->view('TournamentView', $data);
            }else{
              
              $startDate = DateTime::createFromFormat('d/m/Y', $this->input->post('tournamentStartDate'));               
              $endDate = DateTime::createFromFormat('d/m/Y', $this->input->post('tournamentEndDate'));               
                
              $personen = $this->input->post('Personen[]');
                
              $aTournamentData = [
                  'Tournament_Name' => $this->input->post('tournamentName'),
                  'Start_Date' => $startDate->format("Y-m-d"),
                  'End_Date' => $endDate->format("Y-m-d"),
                  'Google_ID' => $_SESSION['Google_ID'],
              ];
              
              $this->load->model('Tournament_model');
              $this->Tournament_model->TournamentToevoegen($aTournamentData, $personen);
              
              $data['alert'] = "<div class='alert alert-success' role='alert'>Toernooi succesvol aangemaakt!</div>";
              $this->load->view('TournamentView', $data);
            }
        }else{
            
            $this->load->view('TournamentView', $data);
        }
        
    }
    public function dateCheck($strDate){
        
        $values = explode("/", $strDate);
       
        if(checkdate ( $values[1] , $values[0] , $values[2] )){
             return true;
        }else{
            $this->form_validation->set_message('dateCheck', 'Enter a valid date ');
            return FALSE;
        }   
    }
    
    public function jsonPersonen() {
        $this->load->model('Tournament_model');
        $result = $this->Tournament_model->PersonenOphalen();
        
        echo json_encode($result);
    }
    
}

