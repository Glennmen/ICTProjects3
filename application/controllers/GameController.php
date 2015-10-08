<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');


class GameController extends CI_Controller{
    
    public function index(){
        
        $this->form_validation->set_rules('gameName', 'Name','required');
        $this->form_validation->set_rules('gameDate', 'Date','required');
        $this->form_validation->set_rules('gameTime', 'Time','required');
        $this->form_validation->set_rules('location', 'location','required');
        
        if(isset($_POST['CreateGame'])){
            if($this->form_validation->run()==FALSE){
                $this->load->view('gameView1');  
            }else{
              $aGameData = [
                  'name' => $this->input->post('gameName'),
                  'date' => $this->input->post('gameDate'),
                  'time' => $this->input->post('gameTime'),
                  'location' => $this->input->post('location'),
                  'type' => $this->input->post('type') 
              ];
              
              $this->load->view('gameView1');
            }
        }else{
            
            $this->load->view('gameView1');
        }
        
    }
    
}

