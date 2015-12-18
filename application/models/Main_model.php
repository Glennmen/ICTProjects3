<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.  
 */
class Main_model extends CI_Model {
    
    public function getAantalUitnodigingen($googleID)
    {
        $this->load->database();
        $result = $this->db->query("SELECT * FROM tournament
                                    INNER JOIN participants_tournament ON tournament.Tournament_ID = participants_tournament.Tournament_ID WHERE Status = 0 AND participants_tournament.Google_ID=".$googleID);
        
        return $result->num_rows();
    }

    public function makeChart($googleID)
    {
        $this->load->database();
        $result = $this->db->query('SELECT Total FROM score WHERE Google_ID = '.$googleID);
        
        $url = 'http://chart.apis.google.com/chart?cht=lc&chs=450x300&chd=t:';
        foreach ($result->result() as $row)
        {
            $url .= $row->Total.',';
        }
        $urlTrim = rtrim($url, ",");
        
        $result2 = $this->db->query('SELECT ROUND(AVG(Total),1) AS TotalAverage FROM score WHERE Google_ID = '.$googleID);
        $AvgTotal = $result2->row();
        $urlTrim .= "|".$AvgTotal->TotalAverage.",".$AvgTotal->TotalAverage;
        
        $urlTrim .= '&chco=FFFFFF,B81321&chls=2|2&chds=0,300&chf=bg,s,FFFFFF00&chxt=y,x&chxr=0,0,300,50&amp;chxs=0,FFFFFF,12,1,lt,FFFFFF,FFFFFF|1,FFFFFF00,12,1,lt,FFFFFF00,FFFFFF';
        
        return $urlTrim;
    }
    
    public function getNickname($googleID)
    {
        try{
        $this->load->database();
        $result = $this->db->query('SELECT Nickname FROM person WHERE Google_ID = '.$googleID);
        if ($result){
            $nickname = $result->row()->Nickname;  
            return $nickname;             
        } else {
            return false;
        }
          
        
        
        } catch (Exception $e)
            {
                return false;
            }
    }
    public function setNickname($googleID,$nickname)
    {
        try{
        $this->load->database();
        $this->db->query("UPDATE person SET Nickname = '".$nickname."' WHERE Google_ID = ".$googleID);
        return true;
    } catch(Exception $e)
    {
        return false;
    }
        
    }
    
    public function getAllNicknames(){
        $this->load->database();
        $anicknames = $this->db->query("Select Nickname FROM person");
        return $anicknames->result();
    }
            
}
