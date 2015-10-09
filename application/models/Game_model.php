<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Game_model extends CI_Model {
    
    public function GameToevoegen($aData)
    {
        $this->load->database();
        $this->db->insert('game', $aData);
    }
}