<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class GameController extends CI_Controller {
    function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        $this->load->model('GameModel');
        
        $data['htmlContent'] = $this->GameModel->getGameForm();
        
        $this->load->view('welcome_message', $data);
    }
}