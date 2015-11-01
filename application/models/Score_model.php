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
    
    public function GameOphalen($googleID){
        $this->load->database();
        $aGameData = $this->db->query("SELECT Game_Name, Date, game.Game_ID FROM participants INNER JOIN game ON participants.Game_ID=game.Game_ID WHERE Google_ID=" .$googleID. " AND Tournament_ID=0");

        return $aGameData->result();
    }
    
    public function TourneyOphalen($googleID){
        $this->load->database();
        $aGameData = $this->db->query("SELECT Tournament_Name, tournament.Tournament_ID FROM participants_tournament INNER JOIN tournament ON participants_tournament.Tournament_ID=tournament.Tournament_ID WHERE participants_tournament.Google_ID=" .$googleID. " AND Status=1");

        return $aGameData->result();
    }
    
    public function GameTourneyOphalen($googleID, $tournooiID){
        $this->load->database();
        $aGameData = $this->db->query("SELECT Game_Name, Date, game.Game_ID FROM participants INNER JOIN game ON participants.Game_ID=game.Game_ID WHERE Google_ID=" .$googleID. " AND Tournament_ID=".$tournooiID);

        return $aGameData->result();
    }
}
