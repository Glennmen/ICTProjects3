package com.example.ictprojects.mobieleappbowling;

import android.content.Intent;
import android.content.res.ColorStateList;
import android.graphics.Color;
import android.os.AsyncTask;
import android.support.design.widget.FloatingActionButton;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

public class tournamentView extends AppCompatActivity implements View.OnClickListener {

    private String tournamentID;
    private String GoogleID;
    private String StartDate;
    private String EndDate;
    private String Name;
    private String state = null;

    private TextView Title;
    private TextView Date;

    private  ApiHandler api;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tournament_view);

        Intent intent = getIntent();

        tournamentID = intent.getStringExtra("TournamentID");
        GoogleID = intent.getStringExtra("GoogleID");
        StartDate = intent.getStringExtra("StartDate");
        EndDate = intent.getStringExtra("EndDate");
        Name = intent.getStringExtra("TournamentName");

        Title = (TextView) findViewById(R.id.TournamentName);
        Date = (TextView) findViewById(R.id.Date);


        FloatingActionButton accept = (FloatingActionButton) findViewById(R.id.btnaccept);
        FloatingActionButton decline = (FloatingActionButton) findViewById(R.id.btndecline);
        accept.setBackgroundTintList(getColorState());
        decline.setBackgroundTintList(getColorState());

        accept.setOnClickListener(this);
        decline.setOnClickListener(this);

        api = new ApiHandler();

        Title.setText(Name);
        Date.setText(StartDate + " - " + EndDate);
    }

    private class HttpAsyncTask extends AsyncTask<String, Void, String>{


        @Override
        protected String doInBackground(String... url) {
            JSONObject jsonObject = new JSONObject();

            try {
                jsonObject.accumulate("Google_ID",GoogleID);
                jsonObject.accumulate("tournamentID" , tournamentID);
                jsonObject.accumulate("state",state);
            } catch (JSONException e) {
                Log.d("tournamentView",e.toString());
            }

            return api.GET(url[0] ,jsonObject );
        }
        @Override
        protected void onPostExecute(String result) {
            String stat = "no anwser form server";                                                  //default no anwser yet

            try{
                JSONObject obj = new JSONObject(result);                                             //parsing the anwser to json obj
                stat = obj.getString("status");                                                      //looking for the status field
            }catch(Exception ex){
                Log.d("status parse",ex.toString());
            }

            Toast.makeText(getBaseContext(), stat, Toast.LENGTH_LONG).show();
        }
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()){
            case R.id.btnaccept:
                state = "accept";
                new HttpAsyncTask().execute("http://www.bowlingcomp.tk/InvitesController/mobileApp");
                break;
            case R.id.btndecline:
                state = "decline";
                new HttpAsyncTask().execute("http://www.bowlingcomp.tk/InvitesController/mobileApp");
                break;
        }
    }


    private ColorStateList getColorState(){
        int[][] states =  new int[][]{
                new int[] { android.R.attr.state_enabled}, // enabled
                new int[] {-android.R.attr.state_enabled}, // disabled
                new int[] {-android.R.attr.state_checked}, // unchecked
                new int[] { android.R.attr.state_pressed}  // pressed
        };

        int[] colors = new int[] {
                Color.DKGRAY,
                Color.DKGRAY,
                Color.DKGRAY,
                Color.DKGRAY
        };

        ColorStateList myList = new ColorStateList(states, colors);

        return myList;
    }
}
