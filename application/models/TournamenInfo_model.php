<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class TournamentInfo_model extends CI_Model {
    
    public function AllParticipants($tournamentID)
    {
        $this->load->database();
        
        $aGameData =$this->db->query("SELECT Game_ID FROM game WHERE Toernooi_ID =
                                    ".$tournamentID);
        $aScoreData = array();
        foreach($aGameData->result() as $aRow)
        {
            $aScoreData .= $this->db->query("SELECT Totaal AND Google_ID FROM score WHERE Game_ID = ".$aRow);
        }
    }
}