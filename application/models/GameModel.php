<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
Class GameModel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function getGameForm() 
    {
        $this->load->helper('form');
        
        $gameName = array(
            'name'          => 'Game naam',
            'id'            => 'GameName',
            'value'         => '',
            'placeholder'   => 'Game naam',
            'required'      => 'required'
        );
        
        $gameDate = array(
            'name'          => 'Datum',
            'id'            => 'Gamedate',
            'value'         => '',
            'placeholder'   => 'Datum',
            'required'      => 'required'
        );
        
        $participants = array(
            'name'          => 'Deelnemers',
            'id'            => 'participants',
            'value'         => '',
            'placeholder'   => 'Deelnemers',
            'required'      => 'required'
        );
        
        $submit = array(
            'name'      => 'createGame',
            'class'     => 'btn btn-default',
        );
        
        $htmlContent = form_open('', $form);
        
        $htmlContent .= form_input($gameName);
        $htmlContent .= form_input($gameDate);
        $htmlContent .= form_input($participants);
        $htmlContent .= form_button($submit, "Create");
        
        $htmlContent .= form_close();
        
        return $htmlContent;
    }
}
