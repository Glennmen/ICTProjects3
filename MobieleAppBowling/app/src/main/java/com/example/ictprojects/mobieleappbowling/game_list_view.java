package com.example.ictprojects.mobieleappbowling;

import android.app.Activity;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;

import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;

public class game_list_view extends AppCompatActivity implements AdapterView.OnItemClickListener {

    private String tournamentID;
    private ListView itemList;
    private TextView titleTextView;
    private String googleID;
    ArrayList<GameObj> gameList;

    //handlers
    private  ApiHandler api;
    private  JsonParser parser;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_game_list_view);

        Intent intent = getIntent();

        tournamentID = intent.getStringExtra("TournamentID");
        googleID = intent.getStringExtra("googleID");

        titleTextView = (TextView) findViewById(R.id.titleTextView);                                //binding view items
        itemList = (ListView)findViewById(R.id.itemlist);
        itemList.setOnItemClickListener(this);

        api = new ApiHandler();
        parser = new JsonParser();

        if(Connected()){                                                                          //contacting server if the device is connected to a network

            new HttpAsyncTask().execute("http://www.bowlingcomp.tk/GameController/MobileApp");
        }
    }

    private class HttpAsyncTask extends AsyncTask<String, Void, String> {
        @Override
        protected String doInBackground(String... urls) {
            JSONObject jsonObject = new JSONObject();                                               //object containing the json post request

            try {
                jsonObject.accumulate("Google_ID",googleID);
                jsonObject.accumulate("Tournament_ID", tournamentID);                               // ADD GOOGLE ID to the json object
                jsonObject.accumulate("req" ,"tourneyGames");
            } catch (Exception ex) {

            }
             return api.GET(urls[0], jsonObject);                                                   //function to handle the api post
        }

    @Override
    protected void onPostExecute(String result) {
        ArrayList<HashMap<String,String>> data = new ArrayList<HashMap<String,String>>();
        String title;

        gameList = parser.parseTournyGameList(result);
        title="Games";
        for(GameObj obj: gameList){                                                                 //looping trought the list of tournaments
            HashMap<String,String> map =new HashMap<String,String>();                               //new hashmap for each tournament
            String combinedDate = obj.getDate() + "  " + obj.getTime();                             //containing the dates and name
            map.put("name",obj.getGame_Name());
            map.put("date", combinedDate);

            data.add(map);
        }

        game_list_view.this.updateDisplay(data, title);
        }
    }

    public  void updateDisplay( ArrayList<HashMap<String,String>> data , String title){
        if(data.isEmpty()){
            titleTextView.setText("Er zijn geen games voor dit tournooi");
            return;
        }

        titleTextView.setText(title);                                                                 //setting the Title

        //recources for the list adapter
        int resource = R.layout.listview_item;
        String[] from = {"name" , "date"};
        int[] to = {R.id.TournamentName,R.id.tournamentDates};

        //creating adapter
        SimpleAdapter adapter = new SimpleAdapter(this,data,resource,from,to);
        itemList.setAdapter(adapter);
    }


    public boolean Connected() {
            ConnectivityManager connMgr = (ConnectivityManager) getSystemService(Activity.CONNECTIVITY_SERVICE);
            NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
            if (networkInfo != null && networkInfo.isConnected())
                return true;
            else
                return false;
    }


    @Override
    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
        GameObj obj = gameList.get(position);

        Intent intent = new Intent(this , AddScoreActivity.class);

        intent.putExtra("GameID" , obj.getGame_ID());
        intent.putExtra("GoogleID" , obj.getGoogle_ID());
        intent.putExtra("gameName" , obj.getGame_Name());

        this.startActivity(intent);
    }
}
