<?php
//
class Progress_model extends CI_Model {
    
    public function StatistiekenOphalen($googleID)
    {
        $this->load->database();  
        $aProgressData =$this->db->query("SELECT * FROM Score WHERE Google_ID =".$googleID );

        return $aProgressData;
    }
    
    public function GameOphalen($googleID, $tournooiID){
        $this->load->database();
        $aGameData = $this->db->query("SELECT Game_Name, Date, game.Game_ID FROM game INNER JOIN participants ON game.Game_ID = participants.Game_ID WHERE participants.Google_ID=".$googleID." AND Tournament_ID=".$tournooiID);

        return $aGameData->result();
    }
    
    public function TourneyOphalen($googleID){
        $this->load->database();
        $aGameData = $this->db->query("SELECT Tournament_Name, tournament.Tournament_ID FROM participants_tournament INNER JOIN tournament ON participants_tournament.Tournament_ID=tournament.Tournament_ID WHERE participants_tournament.Google_ID=" .$googleID. " AND Status=1");

        return $aGameData->result();
    }
}

?>