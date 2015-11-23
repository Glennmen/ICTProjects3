<?php
//
class Progress_model extends CI_Model {
    
    public function StatistiekenOphalen($gameID, $type)
    {
        $this->load->database();  
        
        if ($type == 'Free') {
            $aProgressData = $this->db->query("SELECT score.Google_ID, Nickname, Total, Strikes, Spares FROM Score INNER JOIN person ON score.Google_ID = person.Google_ID WHERE Game_ID =".$gameID." ORDER BY Total DESC, Strikes DESC, Spares DESC");
        }
        else if ($type == 'Tourney') {
            $aTourneyData = $this->db->query("SELECT Game_ID FROM game WHERE Tournament_ID =".$gameID);
            
            foreach ($aTourneyData->result() as $Game){
                $aProgressData = $this->db->query("SELECT score.Google_ID, Nickname, Total, Strikes, Spares FROM Score INNER JOIN person ON score.Google_ID = person.Google_ID WHERE Game_ID =".$Game->Game_ID." ORDER BY Total DESC, Strikes DESC, Spares DESC");   
            }
        }

        return $aProgressData->result();
    }
    
    public function TournooiStatsOphalen($gameID){
        
        $this->load->database(); 
        
        $aTourneyData = $this->db->query("SELECT Game_ID FROM game WHERE Tournament_ID =".$gameID);
            $i = 0;
            foreach ($aTourneyData->result() as $Game){
                $aProgressData = $this->db->query("SELECT score.Google_ID, Nickname, Total, Strikes, Spares FROM Score INNER JOIN person ON score.Google_ID = person.Google_ID WHERE Game_ID =".$Game->Game_ID." ORDER BY Total DESC, Strikes DESC, Spares DESC");   
                $result[$i] = $aProgressData->result();
                $i++;   
            }
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