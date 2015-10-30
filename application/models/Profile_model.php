<?php

class Profile_model extends CI_Model {
    
    public function UpdateProfile($aData,$googleID){
        $this->load->database();
        $this->db->where('Google_ID', $googleID);
        $this->db->update('persoon', $aData); 
    }
    
    public function GetProfile($googleID){
        $this->load->database();
        $aProfileData = $this->db->query("SELECT Last_Name, First_Name, Email,Nickname,GSM FROM Person WHERE Google_ID=" .$googleID );

        return $aProfileData->result();
    }
}
    