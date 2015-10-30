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
       
        $aData = $this->db->query("SELECT COUNT(person.Google_ID) AS aantalGames, person.Last_Name, person.First_Name, AVG(score.Total) AS gemTotaal, AVG(score.Strikes) AS gemStrikes, AVG(score.Spares) AS gemSpare
                FROM person INNER JOIN score ON score.Google_ID = person.Google_ID
                INNER JOIN game ON game.Game_ID = score.Game_ID
                INNER JOIN tournament ON tournament.Tournament_ID = game.Tournament_ID WHERE tournament.Tournament_ID = ".$tournamentID.
                " GROUP BY person.First_Name");
        
       return $aData;
    }
}