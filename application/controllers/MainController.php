<?php
if(!defined('BASEPATH'))exit('No direct acces allowed');
//
class MainController extends CI_Controller {
    public function index()
    {
        $this->load->library('navbar');
        $data['nav'] = $this->navbar->get_navbar();

        $this->load->view('MainView', $data);
    }

}

