<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.  
 */
class Game_model extends CI_Model {
    
    public function GameToevoegen($aData, $personen )
    {
        $this->load->database();
        $this->db->insert('game', $aData);
        $gameID = $this->db->insert_id();

        foreach ($personen as $persoonID){
            $this->db->query('INSERT INTO participants VALUES ('.$gameID.','.$persoonID.')');
        }
    }
    
   
    
    public function allGames($googleID){
        $this->load->database();
        
        $aData =$this->db->query("SELECT * FROM game
                                    INNER JOIN participants ON game.Game_ID = participants.Game_ID WHERE participants.Google_ID=".$googleID);
        return $aData->result();
    
    }
    
    public function PersonenOphalen(){
        $this->load->database();
        $aGameData = $this->db->query("SELECT Last_Name, First_Name, Google_ID FROM person");

        return $aGameData->result();
    }
    
    public function PersonenTourneyOphalen($tournooiID){
        $this->load->database();
        $aGameData = $this->db->query("SELECT Last_Name, First_Name, person.Google_ID FROM participants_tournament INNER JOIN person ON participants_tournament.Google_ID=person.Google_ID WHERE participants_tournament.Tournament_ID=" .$tournooiID. " AND Status=1");

        return $aGameData->result();
    }
}