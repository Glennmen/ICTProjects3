<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');



class GameController extends CI_Controller{
    
    public function index(){
        
        $this->load->library('navbar');
        
        $data['nav'] = $this->navbar->get_navbar();
        $data['alert'] = "";
        
        
        $this->form_validation->set_rules('gameName', 'Name','required');
        $this->form_validation->set_rules('gameDate', 'Date','required|callback_dateCheck');
        $this->form_validation->set_rules('gameTime', 'Time','required|callback_timeCheck');
        $this->form_validation->set_rules('location', 'location','required');
       
        
        
        if(isset($_POST['CreateGame'])){
            if($this->form_validation->run()==FALSE){
                $this->load->view('gameView1', $data);
            }else{
                
            $Date = DateTime::createFromFormat('d/m/Y', $this->input->post('gameDate'));               
            if ($this->input->post('type') == 'free') {
                    $ID = 0;
                }
                else if ($this->input->post('type') == 'tourney') {
                    $ID = $this->input->post('Tourney');
                }
            $personen = $this->input->post('Personen[]');
            
              $aGameData = [
                  'Game_Name' => $this->input->post('gameName'),
                  'Date' => $Date->format("Y-m-d"),
                  'Time' => $this->input->post('gameTime'),
                  'Location' => $this->input->post('location'),
                  'Tournament_ID' => $ID 
              ];
              
              $this->load->model('Game_model');
              $this->Game_model->GameToevoegen($aGameData, $personen);
              
              $data['alert'] = "<div class='alert alert-success' role='alert'>Game succesvol aangemaakt!</div>";
              $this->load->view('gameView1', $data);
            }
        }else{
            
            $this->load->view('gameView1', $data);
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
    
    public function timeCheck($strTime){
        $values = explode(":", $strTime);
        
        if($values[0] > 23 || $values[1] > 59){
            $this->form_validation->set_message('timeCheck', 'Enter a valid time ');
            return FALSE;
        }else{
            return true;   
        }
    }
    
    public function json(){
        $this->load->model('Score_model');
        $result = $this->Score_model->TourneyOphalen($this->input->post('GoogleID'));
        
        echo json_encode($result);
    }
    
    public function jsonPersonen() {
        $this->load->model('Game_model');
        
        if ($this->input->post('Type') == 'tourney') {
            $result = $this->Game_model->PersonenTourneyOphalen($this->input->post('TournooiID'));
        }
        else {
            $result = $this->Game_model->PersonenOphalen();
        }
        
        echo json_encode($result);
    }
    
    public function MobileApp(){
         $this->load->model('Game_model');
         
        $aMobileData = json_decode(file_get_contents('php://input'),true);
        
        $result = $this->Game_model->allGames($aMobileData['Google_ID']);
        
        echo json_encode($result);
    }
}

