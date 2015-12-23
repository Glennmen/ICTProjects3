<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');
//
class ScoreController extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        //if ( ! $this->session->userdata('logged_in'))
        //{
            if(empty($_SESSION['Google_ID'])) {


            // Allow some methods?
            $allowed = array(
                'MobileApp',
            );
            if ( ! in_array($this->router->fetch_method(), $allowed))
            {

                redirect('../OAuthController', 'refresh');
        }
        }
    }
    
    public function index()
    {
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        $data['alert'] = "";


        $this->form_validation->set_rules('scoreTotaal', 'Totaal', 'required|max_length[3]|less_than[301]|is_natural_no_zero');
        $this->form_validation->set_rules('scoreSpares', 'spares', 'required|max_length[2]|less_than[13]|is_natural|callback_maxCheck');
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
                    'Google_ID' => $_SESSION['Google_ID'],
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
    
    public function maxCheck(){
        $strikes = $this->input->post('scoreStrikes');
        $scores = $this->input->post('scoreSpares');
        
        if(($strikes+$scores)<= 12)
        {
            return true;
        }
        else{
            $this->form_validation->set_message('maxCheck', 'Enter valid strike and spare value.');
            return false;
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
        $googleID = $_SESSION['Google_ID'];
        $this->load->model('Score_model');
        
        if ($this->input->post('Type') == 'tourney') {
            $result = $this->Score_model->TourneyOphalen($googleID);
        }
        else if ($this->input->post('Type') == 'free') {
            $result = $this->Score_model->GameOphalen($googleID, 0);
        }
        else {
            $result = $this->Score_model->GameOphalen($googleID, $this->input->post('TournooiID'));
        }
        
        echo json_encode($result);
    }
}

