<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');

class ScoreController extends CI_Controller {
    public function index(){
        
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        
        
        $this->form_validation->set_rules('scoreTotaal','Totaal','required|max_length[3]|less_than[301]|is_natural_no_zero');
        $this->form_validation->set_rules('scoreSpares','spares','required|max_length[2]|less_than[13]|is_natural');
        $this->form_validation->set_rules('scoreStrikes','strikes','required|max_length[2]|less_than[13]|is_natural');
    
        if(isset($_POST['UploadScore'])){
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('ScoreView', $data);
            }
            else {
                $aScoreData =[
                    //'Game_ID' => $this->input->post('gameID'),
                    //'Google_ID' => $this->input->post('googleID'),
                    'Game_ID' =>2,
                    'Google_ID' =>2,
                    'Totaal' => $this->input->post('scoreTotaal'),
                    'Strikes' => $this->input->post('scoreSpares'),
                    'Spare' => $this->input->post('scoreStrikes')
                ];
            

            $this->load->model('Score_model');
            $this->Score_model->ScoreToevoegen($aScoreData);

            $this->load->view('ScoreView', $data);
        }}
        else{
            $this->load->view('ScoreView', $data);
        }

        $aMobileScoreData = json_decode(file_get_contents('php://input'),true);

        if($aMobileScoreData) {

                $this->load->model('Score_model');
                $this->Score_model->ScoreToevoegen($aMobileScoreData);
            }
        }


}

