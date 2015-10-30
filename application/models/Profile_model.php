<?php

class Profile_model extends CI_Model {
    
    public function UpdateProfile($aData,$googleID){
        $this->load->database();
        $this->db->where('Google_ID', $googleID);
        $this->db->update('persoon', $aData); 
    }
    
    public function GetProfile($googleID){
        $this->load->database();
        $aProfileData = $this->db->query("SELECT ANaam, VNaam, Email,Nickname,GSM FROM Persoon WHERE GoogleId=" .$googleID );

        return $aProfileData->result();
    }
}
    