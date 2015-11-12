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

        $this->load->view('MainView', $data);
    }

}

