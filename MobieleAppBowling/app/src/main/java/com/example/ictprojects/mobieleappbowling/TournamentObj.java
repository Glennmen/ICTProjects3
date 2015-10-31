package com.example.ictprojects.mobieleappbowling;

import android.content.Intent;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.SimpleTimeZone;

/**
 * Created by vincent on 31/10/2015.
 */
public class TournamentObj {
    private String End_Date = null;
    private String Start_Date = null;
    private String Google_ID = null;
    private String Tournament_ID =null;
    private String Tournament_Name = null;
    private Integer Status = null;

    private SimpleDateFormat dateFormat = new SimpleDateFormat("dd MMM yyyy");

    public String getEnd_Date() {
        return End_Date;
    }

    public void setEnd_Date(String end_Date) {
        End_Date = end_Date;
    }

    public String getStart_Date() {
        return Start_Date;
    }

    public void setStart_Date(String start_Date) {
        Start_Date = start_Date;
    }

    public String getTournament_ID() {
        return Tournament_ID;
    }

    public void setTournament_ID(String tournament_ID) {
        Tournament_ID = tournament_ID;
    }

    public String getGoogle_ID() {
        return Google_ID;
    }

    public void setGoogle_ID(String google_ID) {
        Google_ID = google_ID;
    }

    public String getTournament_Name() {
        return Tournament_Name;
    }

    public void setTournament_Name(String tournament_Name) {
        Tournament_Name = tournament_Name;
    }

    public String getStatus() {
        if(this.Status == 1){
            return "accepted";
        }else if (this.Status == 0){
            return "pending";
        }else{
            return "declined";
        }
    }

    public void setStatus(Integer status) {
        Status = status;
    }


}
