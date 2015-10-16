package com.example.ictprojects.mobieleappbowling;

/**
 * Created by Tom on 9/10/2015.
 */
public class ScoreData {

    private int totaleScore;
    private int aantalStrikes;
    private int aantalSpares;
    private int Score_ID;
    private int Game_ID;
    private int Google_ID;
    //private int gameName;

    public int getTotaleScore() {
        return totaleScore;
    }

    public void setTotaleScore(int totaleScore) {
        this.totaleScore = totaleScore;
    }

    public int getAantalStrikes() {
        return aantalStrikes;
    }

    public void setAantalStrikes(int aantalStrikes) {
        this.aantalStrikes = aantalStrikes;
    }

    public int getAantalSpares() {
        return aantalSpares;
    }

    public void setAantalSpares(int aantalSpares) {
        this.aantalSpares = aantalSpares;
    }
}
