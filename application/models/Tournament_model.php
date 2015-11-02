<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.  
 */

class Tournament_model extends CI_Model {
    
    public function TournamentToevoegen($aData, $personen)
    {
        $this->load->database();
        $this->db->insert('tournament', $aData);
        $tournamentID = $this->db->insert_id();

        foreach ($personen as $persoonID){
            $this->db->query('INSERT INTO participants_tournament VALUES ('.$persoonID.','.$tournamentID.',0)');
        }
    }
    
    public function PersonenOphalen(){
        $this->load->database();
        $aGameData = $this->db->query("SELECT Last_Name, First_Name, Google_ID FROM person");

        return $aGameData->result();
    }
}