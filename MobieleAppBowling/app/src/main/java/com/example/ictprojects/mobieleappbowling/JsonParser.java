package com.example.ictprojects.mobieleappbowling;

import android.util.Log;

import org.json.JSONArray;
import org.json.JSONObject;

import java.util.ArrayList;

/**
 * Created by vincent on 31/10/2015.
 */
public class JsonParser {

    public ArrayList<TournamentObj> parseTournamentList(String stringObj){

        ArrayList<TournamentObj> list = new ArrayList<TournamentObj>();

        try{
            JSONArray jsonArray = new JSONArray(stringObj);

            for(int i = 0; i < jsonArray.length(); i++){
                JSONObject obj = jsonArray.getJSONObject(i);

                TournamentObj tourObj = new TournamentObj();

                tourObj.setGoogle_ID(obj.getString("Nickname"));
                tourObj.setTournament_ID(obj.getString("Tournament_ID"));
                tourObj.setStart_Date(obj.getString("Start_Date"));
                tourObj.setEnd_Date(obj.getString("End_Date"));
                tourObj.setTournament_Name(obj.getString("Tournament_Name"));

                list.add(tourObj);
            }

        }catch (Exception e){
            Log.d("parser", e.toString());
        }
        return list;
    }

    public ArrayList<GameObj> parseGameList(String stringObj){
        ArrayList<GameObj> list = new ArrayList<GameObj>();
        try{
            JSONArray jsonArray = new JSONArray(stringObj);

            for(int i = 0; i < jsonArray.length(); i++){
                JSONObject obj = jsonArray.getJSONObject(i);

                GameObj gameObj = new GameObj();

                gameObj.setGoogle_ID(obj.getString("Google_ID"));
                gameObj.setDate(obj.getString("Date"));
                gameObj.setGame_ID(obj.getString("Game_ID"));
                gameObj.setGame_Name(obj.getString("Game_Name"));
                gameObj.setLocation(obj.getString("Location"));
                gameObj.setTime(obj.getString("Time"));

                list.add(gameObj);
            }

        }catch (Exception e){
            Log.d("parser", e.toString());
        }

        return  list;
    }

    public ArrayList<GameObj> parseTournyGameList(String stringObj){
        ArrayList<GameObj> list = new ArrayList<GameObj>();
        try{
            JSONArray jsonArray = new JSONArray(stringObj);

            for(int i = 0; i < jsonArray.length(); i++){
                JSONObject obj = jsonArray.getJSONObject(i);

                GameObj gameObj = new GameObj();


                gameObj.setDate(obj.getString("Date"));
                gameObj.setGame_ID(obj.getString("Game_ID"));
                gameObj.setGame_Name(obj.getString("Game_Name"));
                gameObj.setLocation(obj.getString("Location"));
                gameObj.setTime(obj.getString("Time"));
                gameObj.setGoogle_ID(obj.getString("Google_ID"));



                list.add(gameObj);
            }

        }catch (Exception e){
            Log.d("parser", e.toString());
        }

        return  list;
    }
    public Boolean parseExistUser(String stringObj){
        String stat = "";

        try{
            JSONArray jsonArray = new JSONArray(stringObj);

            for(int i = 0; i < jsonArray.length(); i++){
                JSONObject obj = jsonArray.getJSONObject(i);

                stat = obj.getString("status");
            }

        }catch (Exception e){
            Log.d("parser", e.toString());
        }

        if(stat.equals("succes")){
            return true;
        }else{
            return false;
        }
    }


}
