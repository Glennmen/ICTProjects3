<?php
//
class Invites_model extends CI_Model {
    
    public function Accepted($googleID,$toernooiID)
    {
        try{
            $this->load->database();  
            $this->db->query("UPDATE participants_tournament SET Status = 1 WHERE Google_ID =".$googleID." AND Tournament_ID = ".$toernooiID);
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
    public function Declined($googleID,$toernooiID)
    {
        try{
            $this->load->database();  
            $this->db->query("UPDATE participants_tournament SET Status = 2 WHERE Google_ID =".$googleID." AND Tournament_ID = ".$toernooiID);
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
}

?>