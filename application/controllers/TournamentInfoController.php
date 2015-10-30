<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');

class TournamentInfoController extends CI_Controller {
    public function index(){
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();

        $data['aParticipants'] = $this->view_participants();
        //$data['aScore'] = $this->view_score();
        $this->load->view('TournamentInfoView',$data);

    }

    public function view_participants() {
        $this->load->model('TournamentInfo_model');
        $result = $this->TournamentInfo_model->AllParticipants(1);
        if ($result != false) {
            return $result;
        } else {
            return null;
        }
    }
}
?>