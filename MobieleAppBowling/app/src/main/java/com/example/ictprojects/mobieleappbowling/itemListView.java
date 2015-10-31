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

public class itemListView extends AppCompatActivity
        implements AdapterView.OnItemClickListener {


    private String caller;
    private ListView itemList;
    private TextView titleTextView;
    private  ApiHandler api;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_view);

        Intent intent = getIntent();

        caller = intent.getStringExtra("Caller");

        api = new ApiHandler();
        titleTextView = (TextView) findViewById(R.id.titleTextView);
        itemList = (ListView)findViewById(R.id.itemlist);
        itemList.setOnItemClickListener(this);

        if(isConnected()){
            new HttpAsyncTask().execute("http://localhost/ICTProjects3/TournamentListController/MobileApp");
        }
    }


    private class HttpAsyncTask extends AsyncTask<String, Void, String> {
        @Override
        protected String doInBackground(String... urls) {
            JSONObject jsonObject = new JSONObject();                                               //object containing the json post request
            try{
                jsonObject.accumulate("Google_ID",1);                                               // ADD GOOGLE ID
            }
            catch(Exception ex){

            }

            return api.GET(urls[0] , jsonObject);                                                   //function to handle the api post
        }

        @Override
        protected void onPostExecute(String result) {
            String stat = "no answer form server";
            ArrayList<JSONObject> objects = new ArrayList<JSONObject>();

            try{
                JSONArray dataArray = new JSONArray(result);                                        //converting the anwser

                for(int i = 0; i<dataArray.length();i++){                                           //looping trough the list of objects
                    JSONObject obj = dataArray.getJSONObject(i);                                    //extracting the i^th json obj
                    objects.add(obj);                                                               //adding that to the list
                }

            }catch(Exception ex){
                Log.d("status parse", ex.toString());
            }
            itemListView.this.updateDisplay(objects);                                                      //after download update the display
        }
    }

    public  void updateDisplay(ArrayList<JSONObject> objList){
        if(objList.isEmpty()){
                titleTextView.setText("could not reach the server :(");
            return;
        }

        if(caller.contentEquals("tournament")){
            titleTextView.setText("tournament list");

        }else if(caller.contentEquals("game")){
            titleTextView.setText("game list");
            
        }

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
