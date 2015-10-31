package com.example.ictprojects.mobieleappbowling;

import android.app.Activity;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONArray;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.URI;
import java.util.ArrayList;
import java.util.HashMap;

public class itemListView extends AppCompatActivity
        implements AdapterView.OnItemClickListener {

    //global keys
    private String caller;

    //view variables
    private ListView itemList;
    private TextView titleTextView;
    ArrayList<TournamentObj> tournamentList;
    ArrayList<GameObj> gameList;

    //handlers
    private  ApiHandler api;
    private  JsonParser parser;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_view);

        Intent intent = getIntent();

        caller = intent.getStringExtra("Caller");                                                   //collecting variables that where passed on by the previous class

        api = new ApiHandler();                                                                     //creating extern handlers
        parser = new JsonParser();

        titleTextView = (TextView) findViewById(R.id.titleTextView);                                //binding view items
        itemList = (ListView)findViewById(R.id.itemlist);

        itemList.setOnItemClickListener(this);                                                      //binding actions

        if(isConnected()){                                                                          //contacting server if the device is connected to a network

                new HttpAsyncTask().execute("http://localhost/ICTProjects3/TournamentListController/MobileApp",
                                            "http://localhost/ICTProjects3/GameController/MobileApp");
        }
    }


    private class HttpAsyncTask extends AsyncTask<String, Void, String> {
        @Override
        protected String doInBackground(String... urls) {
            JSONObject jsonObject = new JSONObject();                                               //object containing the json post request
            int url = 0;
            try{
                jsonObject.accumulate("Google_ID",1);                                               // ADD GOOGLE ID to the json object

                if(caller.contentEquals("tournament")){
                    url = 0;
                    jsonObject.accumulate("req","accepted");
                }else if(caller.contentEquals("game")){
                    url = 1;
                }else if(caller.contentEquals("inbox")){
                    url = 0 ;
                    jsonObject.accumulate("req","inbox");
                }

            }
            catch(Exception ex){

            }
            return api.GET(urls[url] , jsonObject);                                                   //function to handle the api post
        }

        @Override
        protected void onPostExecute(String result) {
            ArrayList<HashMap<String,String>> data = new ArrayList<HashMap<String,String>>();
            String title = null;

            if(caller.contentEquals("tournament")|| caller.contentEquals("inbox")){
                tournamentList = parser.parseTournamentList(result);
                title = "Tournaments";
                for(TournamentObj obj: tournamentList){                                                        //looping trought the list of tournaments
                    HashMap<String,String> map =new HashMap<String,String>();                           //new hashmap for each tournament
                    String combinedDate = obj.getStart_Date() + " - " + obj.getEnd_Date();              //containing the dates and name
                    map.put("name",obj.getTournament_Name());
                    map.put("date", combinedDate);

                    data.add(map);
                }


            }else if(caller.contentEquals("game")){
                gameList = parser.parseGameList(result);
                title="Games";
                for(GameObj obj: gameList){                                                        //looping trought the list of tournaments
                    HashMap<String,String> map =new HashMap<String,String>();                           //new hashmap for each tournament
                    String combinedDate = obj.getDate() + "  " + obj.getTime();              //containing the dates and name
                    map.put("name",obj.getGame_Name());
                    map.put("date", combinedDate);

                    data.add(map);
                }
            }

            itemListView.this.updateDisplay(data, title);
        }
    }

    public  void updateDisplay( ArrayList<HashMap<String,String>> data , String title){
        if(data.isEmpty()){
                titleTextView.setText("could not reach the server :(");
            return;
        }

        titleTextView.setText(title);                                                          //setting the Title

        //recources for the list adapter
        int resource = R.layout.listview_item;
        String[] from = {"name" , "date"};
        int[] to = {R.id.TournamentName,R.id.tournamentDates};

        //creating adapter
        SimpleAdapter adapter = new SimpleAdapter(this,data,resource,from,to);
        itemList.setAdapter(adapter);
    }

    @Override
    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

    }

    /*
    * function to check if the device is connected to a network
    * */
    public boolean isConnected(){
        ConnectivityManager connMgr = (ConnectivityManager) getSystemService(Activity.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
        if (networkInfo != null && networkInfo.isConnected())
            return true;
        else
            return false;
    }
}
