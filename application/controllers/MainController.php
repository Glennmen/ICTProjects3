<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');
//
class MainController extends CI_Controller {
    public function index()
    {


        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();
        $data['First_Name'] = $this->session->userdata("First_Name");
        $data['Last_Name'] = $this->session->userdata("Last_Name");

        $googleID = 2;

        $this->load->model('Main_model');
        $data['uitnodigingen'] = $this->Main_model->getAantalUitnodigingen($googleID);
        $data['chart'] = $this->Main_model->makeChart($googleID);

        $this->load->view('MainView', $data);
    }

}

