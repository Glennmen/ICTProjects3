<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');

class ScoreController extends CI_Controller {
    public function index(){
        
        //$this->load->library('form_validation');
        
        $this->form_validation->set_rules('scoreID','scoreId', 'required');
        $this->form_validation->set_rules('googleID','googleId', 'required');
        $this->form_validation->set_rules('gameID','gameId', 'required');
        $this->form_validation->set_rules('scoreTotaal','Totaal','required');
        $this->form_validation->set_rules('scoreSpares','spares','numeric');
        $this->form_validation->set_rules('scoreStrikes','strikes','numeric');
    
        if(isset($_POST['UploadScore'])){
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('ScoreView');
            }
            else {
                $aScoreData =[
                    'Score_ID' => $this->input->post('scoreID'),
                    'Game_ID' => $this->input->post('gameID'),
                    'Google_ID' => $this->input->post('googleID'),
                    'Totaal' => $this->input->post('scoreTotaal'),
                    'Strikes' => $this->input->post('scoreSpares'),
                    'Spare' => $this->input->post('scoreStrikes')
                ];
            

            $this->load->model('Score_model');
            $this->Score_model->ScoreToevoegen($aScoreData);

            $this->load->view('ScoreView');
        }}
        else{
            $this->load->view('ScoreView');
        }
        
    }
}

