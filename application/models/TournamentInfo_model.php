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

        $aData = $this->db->query("SELECT Totaal,Google_ID,Strikes,Spare FROM score
                                    INNER JOIN game ON score.GAME_ID = game.GAME_ID WHERE game.Tournooi_ID =".$tournamentID);

        $asData = $this->db->query();

        echo '<pre>';
        print_r($aData);
        echo '</pre>';
        echo "hallo";

        return $aData;

    }
}