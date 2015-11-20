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
    
    public function GameOphalen($googleID, $tournooiID){
        $this->load->database();
        $aGameData = $this->db->query("SELECT * FROM participants INNER JOIN game ON participants.Game_ID=game.Game_ID WHERE participants.Google_ID=" .$googleID. " AND Tournament_ID=".$tournooiID." AND NOT EXISTS (select null FROM score WHERE score.Game_ID=participants.Game_ID AND score.Google_ID=participants.Google_ID)");

        return $aGameData->result();
    }
    
    public function TourneyOphalen($googleID){
        $this->load->database();
        $aGameData = $this->db->query("SELECT Tournament_Name, tournament.Tournament_ID FROM participants_tournament INNER JOIN tournament ON participants_tournament.Tournament_ID=tournament.Tournament_ID WHERE participants_tournament.Google_ID=" .$googleID. " AND Status=1");

        return $aGameData->result();
    }
}
