<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');


class TournamentController extends CI_Controller{
    
    public function index(){
        
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        
        $this->form_validation->set_rules('tournamentName', 'Name','required');
        $this->form_validation->set_rules('tournamentStartDate', 'StartDate','required|callback_dateCheck');
        $this->form_validation->set_rules('tournamentEndDate', 'EndDate','required|callback_dateCheck');
        
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
    public function dateCheck($strDate){
        
        $format ="d/m/y" ;
        $publishDate = DateTime::createFromFormat('d/m/Y', $strDate);

        $values = explode("/", $strDate);
       
        if(checkdate ( $values[1] , $values[0] , $values[2] )){
             return true;
        }else{
            $this->form_validation->set_message('dateCheck', 'Enter a valid date ');
            return FALSE;
        }   
    }
    
}

