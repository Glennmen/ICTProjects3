<?php
class TournamentList_model extends CI_Model {
    
    public function AllTournaments($googleID)
    {
        $this->load->database();
        
        $aData =$this->db->query("SELECT Toernooi_ID, Eigenaar_ID, Begin_Datum, Eind_Datum, Naam FROM tournament
                                    INNER JOIN deelnemerstournooi ON tournament.Toernooi_ID = deelnemerstournooi.tournooiID WHERE accepted = 1 and googleID=".$googleID);
        
        
       return $aData;
    }
    public function AllNotAcceptedTournaments($googleID)
    {
        $this->load->database();
        
        $aData =$this->db->query("SELECT Toernooi_ID, Eigenaar_ID, Begin_Datum, Eind_Datum, Naam FROM tournament
                                    INNER JOIN deelnemerstournooi ON tournament.Toernooi_ID = deelnemerstournooi.tournooiID WHERE accepted = 0 and googleID=".$googleID);
        return $aData;
    }
    public function AllAcceptedTournaments($googleID)
    {
        $this->load->database();
        
        $aData =$this->db->query("SELECT Toernooi_ID, Eigenaar_ID, Begin_Datum, Eind_Datum, Naam FROM tournament
                                    INNER JOIN deelnemerstournooi ON tournament.Toernooi_ID = deelnemerstournooi.tournooiID WHERE accepted = 1 and googleID=".$googleID);
        return $aData;
    }
    public function AllDeclinedTournaments($googleID)
    {
        $this->load->database();
        
        $aData =$this->db->query("SELECT Toernooi_ID, Eigenaar_ID, Begin_Datum, Eind_Datum, Naam FROM tournament
                                    INNER JOIN deelnemerstournooi ON tournament.Toernooi_ID = deelnemerstournooi.tournooiID WHERE accepted = 2 and googleID=".$googleID);
        return $aData;
    }
    public function AllAnyTournaments($googleID)
    {
        $this->load->database();
        
        $aData =$this->db->query("SELECT Toernooi_ID, Eigenaar_ID, Begin_Datum, Eind_Datum, Naam FROM tournament
                                    INNER JOIN deelnemerstournooi ON tournament.Toernooi_ID = deelnemerstournooi.tournooiID WHERE googleID=".$googleID);
        return $aData;
    }
}
?>
