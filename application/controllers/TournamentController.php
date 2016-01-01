<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');
//

class TournamentController extends CI_Controller{
    
    public function index(){
        
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        $data['alert'] = "";
        
        $this->form_validation->set_rules('tournamentName', 'Name','required');
        $this->form_validation->set_rules('tournamentStartDate', 'StartDate','required|callback_startDateCheck');
        $this->form_validation->set_rules('tournamentEndDate', 'EndDate','required|callback_endDateCheck');
        
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
    
    public function startDateCheck($strStartDate)
    {
         $values = explode("/", $strStartDate);
         $startDate = DateTime::createFromFormat('d/m/Y', $strStartDate);
         $endDate = DateTime::createFromFormat('d/m/Y', $this->input->post('tournamentEndDate'));
         $currentDate = date("Y-m-d");
         
         if ((checkdate ( $values[1] , $values[0] , $values[2] )) == FALSE)
         {
            $this->form_validation->set_message('startDateCheck', 'Enter a valid start date ');
            return FALSE;
         }
         elseif (strtotime(date_format($startDate,"Y-m-d")) <= strtotime($currentDate))
         {
            $this->form_validation->set_message('startDateCheck', "Tournament start date can't be in the past");
            return FALSE;
         }
         elseif (strtotime(date_format($startDate,"Y-m-d")) > strtotime(date_format($endDate,"Y-m-d")))
         {
            $this->form_validation->set_message('startDateCheck', "Tournament start date must be smaller than tournament end date");
            return FALSE;
         }
         else
         {
            return TRUE;
         }
    }
    
    public function endDateCheck($strEndDate)
    {
         $values = explode("/", $strEndDate);
         $endDate = DateTime::createFromFormat('d/m/Y', $strEndDate);
         $currentDate = date("Y-m-d");
         
         if ((checkdate ( $values[1] , $values[0] , $values[2] )) == FALSE)
         {
             $this->form_validation->set_message('endDateCheck', 'Enter a valid end date ');
             return FALSE;
         }
         elseif (strtotime(date_format($endDate,"Y-m-d")) <= strtotime($currentDate))
         {
            $this->form_validation->set_message('endDateCheck', "Tournament end date can't be in the past");
            return FALSE;
         }
         else
         {
            return TRUE;
         }
    }
    
    public function jsonPersonen() {
        $this->load->model('Tournament_model');
        $result = $this->Tournament_model->PersonenOphalen();
        
        echo json_encode($result);
    }
    
}

