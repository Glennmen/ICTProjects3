<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');
//
class ScoreController extends CI_Controller {


    public function index()
    {

        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        $data['alert'] = "";


        $this->form_validation->set_rules('scoreTotaal', 'Totaal', 'required|max_length[3]|less_than[301]|is_natural_no_zero');
        $this->form_validation->set_rules('scoreSpares', 'spares', 'required|max_length[2]|less_than[13]|is_natural');
        $this->form_validation->set_rules('scoreStrikes', 'strikes', 'required|max_length[2]|less_than[13]|is_natural');

        if (isset($_POST['UploadScore'])) {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('ScoreView', $data);
            } else {
                if ($this->input->post('type') == 'free') {
                    $ID = $this->input->post('Tourney');
                }
                else if ($this->input->post('type') == 'tourney') {
                    $ID = $this->input->post('Game');
                }
                $aScoreData = [
                    'Game_ID' => $ID,
                    'Google_ID' => 2,
                    'Total' => $this->input->post('scoreTotaal'),
                    'Strikes' => $this->input->post('scoreStrikes'),
                    'Spares' => $this->input->post('scoreSpares'),
                ];


                $this->load->model('Score_model');
                $this->Score_model->ScoreToevoegen($aScoreData);

                $data['alert'] = "<div class='alert alert-success' role='alert'>Score succesvol toegevoegd!</div>";
                $this->load->view('ScoreView', $data);
            }
        } else {
            $this->load->view('ScoreView', $data);
        }

    }

    public function MobileApp(){

        $aMobileScoreData = json_decode(file_get_contents('php://input'),true);

        if($aMobileScoreData) {

                $this->load->model('Score_model');
                $this->Score_model->ScoreToevoegen($aMobileScoreData);
            }
        $status = array("status"=>"succes");
        echo json_encode($status);
    }

    public function json(){
        $this->load->model('Score_model');
        
        if ($this->input->post('Type') == 'tourney') {
            $result = $this->Score_model->TourneyOphalen($this->input->post('GoogleID'));
        }
        else if ($this->input->post('Type') == 'free') {
            $result = $this->Score_model->GameOphalen($this->input->post('GoogleID'), 0);
        }
        else {
            $result = $this->Score_model->GameOphalen($this->input->post('GoogleID'), $this->input->post('TournooiID'));
        }
        
        echo json_encode($result);
    }
}

