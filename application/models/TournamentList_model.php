<?php
class TournamentList_model extends CI_Model {
    
    public function AllTournaments($googleID)
    {
        $this->load->database();
        
        $aData =$this->db->query("SELECT Toernooi_ID, Eigenaar_ID, Begin_Datum, Eind_Datum, Naam FROM tournament
                                    INNER JOIN deelnemerstournooi ON tournament.Toernooi_ID = deelnemerstournooi.tournooiID WHERE accepted = 1 and googleID=".$googleID);
        
        
       return $aData;
    }
}
?>
