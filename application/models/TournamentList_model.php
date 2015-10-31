<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.  
 */

class TournamentList_model extends CI_Model {
    
    public function AllTournaments($googleID)
    {
        $this->load->database();
        
        $aData =$this->db->query("SELECT * FROM tournament
                                    INNER JOIN participants_tournament ON tournament.Tournament_ID = participants_tournament.Tournament_ID WHERE participants_tournament.Google_ID=".$googleID);
        
        
       return $aData;
    }
    public function AllNotAcceptedTournaments($googleID)
    {
        $this->load->database();
        
        $aData =$this->db->query("SELECT * FROM tournament
                                    INNER JOIN participants_tournament ON tournament.Tournament_ID = participants_tournament.Tournament_ID WHERE Status = 0 AND participants_tournament.Google_ID=".$googleID);
        return $aData;
    }
    public function AllAcceptedTournaments($googleID)
    {
        $this->load->database();
        
        $aData =$this->db->query("SELECT * FROM tournament
                                    INNER JOIN participants_tournament ON tournament.Tournament_ID = participants_tournament.Tournament_ID WHERE Status = 1 AND participants_tournament.Google_ID=".$googleID);
        return $aData;
    }
    public function AllDeclinedTournaments($googleID)
    {
        $this->load->database();
        
        $aData =$this->db->query("SELECT * FROM tournament
                                    INNER JOIN participants_tournament ON tournament.Tournament_ID = participants_tournament.Tournament_ID WHERE Status = 2 AND participants_tournament.Google_ID=".$googleID);
        return $aData;
    }
}
?>
