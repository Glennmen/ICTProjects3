<?php

class Progress_model extends CI_Model {
    
    public function StatistiekenOphalen($googleID)
    {
        $this->load->database();  
        $aProgressData =$this->db->query("SELECT * FROM Score WHERE Google_ID =".$googleID );
        return $aProgressData;
    }
}

?>