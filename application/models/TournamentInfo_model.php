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
       
        $aData = $this->db->query("SELECT COUNT(persoon.Google_ID) AS aantalGames, persoon.Vnaam, persoon.Fnaam, AVG(score.Totaal) AS gemTotaal, AVG(score.Strikes) AS gemStrikes, AVG(score.Spare) AS gemSpare
                FROM persoon INNER JOIN score ON score.Google_ID = persoon.Google_ID
                INNER JOIN game ON game.Game_ID = score.Game_ID
                INNER JOIN tournament ON tournament.Toernooi_ID = game.Tournooi_ID WHERE tournament.Toernooi_ID = ".$tournamentID.
                " GROUP BY persoon.Fnaam");
        
       return $aData;
    }
}