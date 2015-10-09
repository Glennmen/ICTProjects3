<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');

class ProgressController extends CI_Controller {
    public function index(){
        $data['aProgressData'] = $this->view_table();
        $this->load->view('ProgressView', $data);
    }
    
    public function view_table(){
        $this->load->model('Progress_model');
        $result = $this->Progress_model->StatistiekenOphalen(4); //komt googleID
        if ($result != false) {
            return $result;
        }else{
            return "error";
        }
    }
}