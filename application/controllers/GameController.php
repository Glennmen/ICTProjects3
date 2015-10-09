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
                  'naam' => $this->input->post('gameName'),
                  'datum' => $this->input->post('gameDate'),
                  'tijd' => $this->input->post('gameTime'),
                  'locatie' => $this->input->post('location'),
                  'tournooi_id' => $this->input->post('type') 
              ];
              
              $this->load->model('Game_model');
              $this->Game_model->GameToevoegen($aGameData);
              
              $this->load->view('gameView1');
            }
        }else{
            
            $this->load->view('gameView1');
        }
        
    }
    
}

