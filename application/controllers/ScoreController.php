<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');

class ScoreController extends CI_Controller {
    public function index(){
        
        //$this->load->library('form_validation');
        
        $this->form_validation->set_rules('scoreTotaal','Totaal','required');
        $this->form_validation->set_rules('scoreSpares','spares');
        $this->form_validation->set_rules('scoreStrikes','strikes');
    
        if(isset($_POST['UploadScore'])){
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('ScoreView');
            }
            else {
                $aScoreData =[
                    'Game_ID' => 5, //moet nog gekoppeld worden
                    //'Google_ID' => $this->input->post('googleID'),
                    'Totaal' => $this->input->post('scoreTotaal'),
                    'Strikes' => $this->input->post('scoreSpares'),
                    'Spare' => $this->input->post('scoreStrikes')
                ];

            $this->load->model('Score_model');
            $this->Score_model->ScoreToevoegen($aScoreData);

            $this->load->view('ScoreView');
            }
        }
        else{
            $this->load->view('ScoreView');
        }
        
    }
}

