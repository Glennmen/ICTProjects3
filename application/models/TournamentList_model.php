<?php
class TournamentList_model extends CI_Model {
    
    public function AllTournaments($googleID)
    {
        $this->load->database();
        
        $aData =$this->db->query("SELECT * FROM tournament WHERE Toernooi_ID =
                                    (SELECT tournooiID FROM deelnemerstournooi WHERE accepted=1 and googleID=".$googleID.")");
        return $aData;
    }
}

?>
