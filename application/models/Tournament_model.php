<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.  
 */

class Tournament_model extends CI_Model {
    
    public function TournamentToevoegen($aData, $personen)
    {
        $this->load->database();
        $this->db->insert('tournament', $aData);
        $tournamentID = $this->db->insert_id();

        foreach ($personen as $persoonID){
            $this->db->query('INSERT INTO participants_tournament VALUES ('.$persoonID.','.$tournamentID.',0)');
        }
    }
    
    public function PersonenOphalen(){
        $this->load->database();
        $aGameData = $this->db->query("SELECT Last_Name, First_Name, Nickname, Google_ID FROM person");

        return $aGameData->result();
    }
    
    public function AllTournaments($googleID)
    {
        $this->load->database();
        
        $aData =$this->db->query("SELECT * FROM tournament
                                    INNER JOIN participants_tournament ON tournament.Tournament_ID = participants_tournament.Tournament_ID WHERE participants_tournament.Google_ID=".$googleID);
        
        
       return $aData->result();
    }
    
    public function AllParticipants($tournamentID)
    {
        $this->load->database();
       
        $aData = $this->db->query("SELECT COUNT(person.Google_ID) AS aantalGames, person.Last_Name, person.First_Name, person.Nickname, AVG(score.Total) AS gemTotaal, AVG(score.Strikes) AS gemStrikes, AVG(score.Spares) AS gemSpare
                FROM person INNER JOIN score ON score.Google_ID = person.Google_ID
                INNER JOIN game ON game.Game_ID = score.Game_ID
                INNER JOIN tournament ON tournament.Tournament_ID = game.Tournament_ID WHERE tournament.Tournament_ID = ".$tournamentID.
                " GROUP BY person.First_Name");
        
       return $aData->result();
    }
    
    
    
    public function AllNotAcceptedTournaments($googleID)
    {
        $this->load->database();
        
        $aData =$this->db->query("SELECT Nickname FROM person 
                                    INNER JOIN tournament ON tournament.Google_ID = person.Google_ID
                                    INNER JOIN participants_tournament ON tournament.Tournament_ID = participants_tournament.Tournament_ID WHERE Status = 0 AND participants_tournament.Google_ID=".$googleID);
        
        return $aData->result();
    }
    
    public function AllAcceptedTournaments($googleID)
    {
        $this->load->database();      
        
        $aData =$this->db->query("SELECT Nickname FROM person 
                                    INNER JOIN tournament ON tournament.Google_ID = person.Google_ID
                                    INNER JOIN participants_tournament ON tournament.Tournament_ID = participants_tournament.Tournament_ID WHERE Status = 1 AND participants_tournament.Google_ID=".$googleID);
        
        return $aData->result();
    }
    
    public function AllDeclinedTournaments($googleID)
    {
        $this->load->database();
        
        $aData =$this->db->query("SELECT Nickname FROM person 
                                    INNER JOIN tournament ON tournament.Google_ID = person.Google_ID
                                    INNER JOIN participants_tournament ON tournament.Tournament_ID = participants_tournament.Tournament_ID WHERE Status = 2 AND participants_tournament.Google_ID=".$googleID);
        return $aData-result();
    }
    
    
}