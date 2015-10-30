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
    
    public function TourneyOphalen($googleID){
        $this->load->database();
        $aGameData = $this->db->query("SELECT Tournament_Name, Tournament_ID FROM participants_tournament INNER JOIN tournament ON participants_tournament.Tournament_ID=tournament.Tournament_ID WHERE Google_ID=" .$googleID. " AND Status=1");

        return $aGameData->result();
    }
}