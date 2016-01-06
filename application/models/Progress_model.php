<?php
//
class Progress_model extends CI_Model {
    
    public function StatistiekenOphalen($gameID)
    {
        $this->load->database();  

        $aProgressData = $this->db->query("SELECT score.Google_ID, Nickname, Total, Strikes, Spares FROM score INNER JOIN person ON score.Google_ID = person.Google_ID WHERE Game_ID =".$gameID." ORDER BY Total DESC, Strikes DESC, Spares DESC");

        return $aProgressData->result();
    }
    
    public function TournooiStatsOphalen($tourneyID){
        
        $this->load->database();
        $endDate = $this->db->query("SELECT End_Date FROM tournament WHERE Tournament_ID = ".$tourneyID);
        if($endDate){ $endDate2 = $endDate->row()->End_Date; }
        $currentDate = date('Y-m-d');
        if($endDate2 < $currentDate)
        {
        $aProgressData = $this->db->query("SELECT p.Nickname, s.Total, s.Strikes, s.Spares 
                                            FROM (SELECT Google_ID, ROUND(AVG(Total),1) AS Total, ROUND(AVG(Strikes),1) AS Strikes, ROUND(AVG(Spares),1) AS Spares FROM score 
                                                  INNER JOIN game ON score.Game_ID=game.Game_ID WHERE Tournament_ID=".$tourneyID." GROUP BY Google_ID HAVING COUNT(score.Score_ID) > 9) s,
                                                 (SELECT Nickname, Google_ID FROM person) p 
                                            WHERE s.Google_ID=p.Google_ID 
                                            ORDER BY Total DESC, Strikes DESC, Spares DESC ");
        }
        else{
        $aProgressData = $this->db->query("SELECT p.Nickname, s.Total, s.Strikes, s.Spares 
                                            FROM (SELECT Google_ID, ROUND(AVG(Total),1) AS Total, ROUND(AVG(Strikes),1) AS Strikes, ROUND(AVG(Spares),1) AS Spares FROM score 
                                                  INNER JOIN game ON score.Game_ID=game.Game_ID WHERE Tournament_ID=".$tourneyID." GROUP BY Google_ID ) s,
                                                 (SELECT Nickname, Google_ID FROM person) p 
                                            WHERE s.Google_ID=p.Google_ID 
                                            ORDER BY Total DESC, Strikes DESC, Spares DESC ");
        }
        
        return $aProgressData->result();
    }
    
    public function GameOphalen($googleID, $tournooiID){
        $this->load->database();
        $aGameData = $this->db->query("SELECT Game_Name, Date, game.Game_ID FROM game INNER JOIN participants ON game.Game_ID = participants.Game_ID WHERE participants.Google_ID=".$googleID." AND Tournament_ID=".$tournooiID);

        return $aGameData->result();
    }
    
    public function TourneyOphalen($googleID){
        $this->load->database();
        $todayData = date("Y-m-d");
        $aGameData = $this->db->query("SELECT Tournament_Name, tournament.Tournament_ID
                                       FROM participants_tournament INNER JOIN tournament ON participants_tournament.Tournament_ID=tournament.Tournament_ID 
                                       WHERE participants_tournament.Google_ID=" .$googleID. " AND Status=1 ");

        return $aGameData->result();
    }
    
    public function makeTotalChart($googleID)
    {
        $this->load->database();
        $result = $this->db->query('SELECT Total FROM score WHERE Google_ID = '.$googleID);
        
        $url = 'http://chart.apis.google.com/chart?cht=lc&chs=300x300&chtt=Score&chts=FFFFFF,15&chd=t:';
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
    
    public function makeStrikesChart($googleID)
    {
        $this->load->database();
        $result = $this->db->query('SELECT Strikes FROM score WHERE Google_ID = '.$googleID);
        
        $url = 'http://chart.apis.google.com/chart?cht=lc&chs=300x300&chtt=Strikes&chts=FFFFFF,15&chd=t:';
        foreach ($result->result() as $row)
        {
            $url .= $row->Strikes.',';
        }
        $urlTrim = rtrim($url, ",");
        
        $result2 = $this->db->query('SELECT ROUND(AVG(Strikes),1) AS StrikesAverage FROM score WHERE Google_ID = '.$googleID);
        $AvgStrikes = $result2->row();
        $urlTrim .= "|".$AvgStrikes->StrikesAverage.",".$AvgStrikes->StrikesAverage;
        
        $urlTrim .= '&chco=FFFFFF,B81321&chls=2|2&chds=0,12&chf=bg,s,FFFFFF00&chxt=y,x&chxr=0,0,12,2&amp;chxs=0,FFFFFF,12,1,lt,FFFFFF,FFFFFF|1,FFFFFF00,12,1,lt,FFFFFF00,FFFFFF';
        
        return $urlTrim;
    }
    
    public function makeSparesChart($googleID)
    {
        $this->load->database();
        $result = $this->db->query('SELECT Spares FROM score WHERE Google_ID = '.$googleID);
        
        $url = 'http://chart.apis.google.com/chart?cht=lc&chs=300x300&chtt=Spares&chts=FFFFFF,15&chd=t:';
        foreach ($result->result() as $row)
        {
            $url .= $row->Spares.',';
        }
        $urlTrim = rtrim($url, ",");
        
        $result2 = $this->db->query('SELECT ROUND(AVG(Spares),1) AS SparesAverage FROM score WHERE Google_ID = '.$googleID);
        $AvgSpares = $result2->row();
        $urlTrim .= "|".$AvgSpares->SparesAverage.",".$AvgSpares->SparesAverage;
        
        $urlTrim .= '&chco=FFFFFF,B81321&chls=2|2&chds=0,12&chf=bg,s,FFFFFF00&chxt=y,x&chxr=0,0,12,2&amp;chxs=0,FFFFFF,12,1,lt,FFFFFF,FFFFFF|1,FFFFFF00,12,1,lt,FFFFFF00,FFFFFF';
        
        return $urlTrim;
    }
}

?>