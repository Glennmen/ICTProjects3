<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Game_model extends CI_Model {
    
    public function GameToevoegen($aData)
    {
        $this->load->database();
        $this->db->insert('game', $aData);
    }
    
    public function TourneyOphalen($googleID){
        $this->load->database();
        $aGameData = $this->db->query("SELECT Naam, Toernooi_ID FROM deelnemerstournooi INNER JOIN tournament ON deelnemerstournooi.tournooiID=tournament.Toernooi_ID WHERE googleID=" .$googleID. " AND accepted=1");

        return $aGameData->result();
    }
}