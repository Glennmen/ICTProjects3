<?php

if(!defined('BASEPATH'))exit('No direct acces allowed');

class AddScore extends CI_Controller {
    public function index(){

        $aJson = $_POST['json'];
        $aScoreData = json_decode($aJson, true);

        $this->load->model('Score_model');
        $this->Score_model->ScoreToevoegen($aScoreData);

    }