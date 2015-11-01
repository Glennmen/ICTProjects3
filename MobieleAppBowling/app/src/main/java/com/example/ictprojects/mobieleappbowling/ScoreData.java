package com.example.ictprojects.mobieleappbowling;

/**
 * Created by Tom on 9/10/2015.
 */
public class ScoreData {

    private String totaleScore;
    private String aantalStrikes;
    private String aantalSpares;
    //private int Score_ID;
    private String Game_ID;
    private String Google_ID;
    private String gameName;

    public String getTotaleScore() {
        return totaleScore;
    }

    public void setTotaleScore(String totaleScore) {
        this.totaleScore = totaleScore;
    }

    public String getAantalStrikes() {
        return aantalStrikes;
    }

    public void setAantalStrikes(String aantalStrikes) {
        this.aantalStrikes = aantalStrikes;
    }

    public String getAantalSpares() {
        return aantalSpares;
    }

    public void setAantalSpares(String aantalSpares) {
        this.aantalSpares = aantalSpares;
    }

    public String getGame_ID() {return Game_ID;}

    public void setGame_ID(String game_ID) {Game_ID = game_ID;}

    public String getGoogle_ID() {return Google_ID;}

    public void setGoogle_ID(String google_ID) {Google_ID = google_ID;}

    public String getGameName() {return gameName;}

    public void setGameName(String gameName) {this.gameName = gameName;}
}
