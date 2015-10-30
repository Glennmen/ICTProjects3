<?php

class Invites_model extends CI_Model {
    
    public function Accepted($googleID,$toernooiID)
    {
        try{
            $this->load->database();  
            $this->db->query("UPDATE deelnemerstournooi SET accepted = 1 WHERE googleID =".$googleID." AND tournooiID = ".$toernooiID);
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
            $this->db->query("UPDATE deelnemerstournooi SET accepted = 2 WHERE googleID =".$googleID." AND tournooiID = ".$toernooiID);
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
}

?>