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
        $result = $this->db->query('SELECT * FROM participants_tournament WHERE Google_ID = '.$googleID.' AND Status = 0');
        
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
        $urlTrim .= '&chco=FFFFFF&chls=2&chds=0,300&chf=bg,s,FFFFFF00&chxt=y,x&chxr=0,0,300,50&amp;chxs=0,FFFFFF,12,1,lt,FFFFFF,FFFFFF|1,FFFFFF00,12,1,lt,FFFFFF00,FFFFFF';
        
        return $urlTrim;
    }
}
