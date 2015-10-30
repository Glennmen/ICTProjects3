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
       
        $aData = $this->db->query("SELECT persoon.Google_ID, persoon.Vnaam, persoon.Fnaam, score.Totaal, score.Strikes, score.Spare
                FROM persoon INNER JOIN score ON score.Google_ID = persoon.Google_ID
                INNER JOIN game ON game.Game_ID = score.Game_ID
                INNER JOIN tournament ON tournament.Toernooi_ID = game.Tournooi_ID WHERE tournament.Toernooi_ID = ".$tournamentID);
        
       return $aData;
    }
}