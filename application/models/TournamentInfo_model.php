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

       $aData = $this->db->query("SELECT Vnaam, Fnaam FROM persoon
               INNER JOIN deelnemerstournooi ON persoon.Google_ID = deelnemerstournooi.googleID WHERE tournooiID = ".$tournamentID);
       
       return $aData;

    }
}