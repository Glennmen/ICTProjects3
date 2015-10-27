<?php

class Invites_model extends CI_Model {
    
    public function Accepted($googleID,$toernooiID)
    {
        try{
            $this->load->database();  
            $this->db->query("UPDATE deelnemerstournooi SET accepted = 1 WHERE Google_ID =".$googleID." AND tournooiID = ".$toernooiID);
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
            $this->db->query("UPDATE deelnemerstournooi SET accepted = 2 WHERE Google_ID =".$googleID." AND tournooiID = ".$toernooiID);
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
}

?>