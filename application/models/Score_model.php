<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Score_model extends CI_Model {
    
    public function ScoreToevoegen($aData)
    {
        $this->load->database();
        $this->db->insert('score', $aData);
    }
}
