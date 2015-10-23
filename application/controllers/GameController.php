<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');


class GameController extends CI_Controller{
    
    public function index(){
        
        $this->load->library('navbar');
        
        $data['nav'] = $this->navbar->get_navbar();
        
        
        
        $this->form_validation->set_rules('gameName', 'Name','required');
        $this->form_validation->set_rules('gameDate', 'Date','required|callback_dateCheck');
        $this->form_validation->set_rules('gameTime', 'Time','required|callback_timeCheck');
        $this->form_validation->set_rules('location', 'location','required');
       
        
        
        if(isset($_POST['CreateGame'])){
            if($this->form_validation->run()==FALSE){
                $this->load->view('gameView1', $data);
            }else{
                
            $Date = DateTime::createFromFormat('d/m/Y', $this->input->post('gameDate'));               
            
              $aGameData = [
                  'naam' => $this->input->post('gameName'),
                  'datum' => $Date->format("Y-m-d"),
                  'tijd' => $this->input->post('gameTime'),
                  'locatie' => $this->input->post('location'),
                  'tournooi_id' => $this->input->post('type') 
              ];
              
              $this->load->model('Game_model');
              $this->Game_model->GameToevoegen($aGameData);
              
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
        $this->load->model('Game_model');
        $result = $this->Game_model->GameOphalen($this->input->post('GoogleID'));
        
        echo json_encode($result);
    }
}

