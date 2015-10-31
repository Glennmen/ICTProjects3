package com.example.ictprojects.mobieleappbowling;

import android.app.Activity;
import android.content.DialogInterface;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.text.InputFilter;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import org.apache.http.client.HttpClient;
import org.apache.http.HttpResponse;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONObject;
import android.util.Log;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;

/**
 * Created by Tom on 9/10/2015.
 */
public class AddScoreActivity extends AppCompatActivity
                                implements View.OnClickListener{


    EditText editTotaleScore;
    EditText editAantalStrikes;
    EditText editAantalspares;
    TextView isConnected;
    Button submitScoreButton;
    ScoreData score;
    String TotaleScore;
    String AantalStrikes;
    String AantalSpares;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.addscore_main);

        editTotaleScore = (EditText) findViewById(R.id.editTotaleScore);
        editAantalStrikes = (EditText) findViewById(R.id.editAantalStrikes);
        editAantalspares = (EditText) findViewById(R.id.editAantalspares);
        submitScoreButton = (Button) findViewById(R.id.submitScoreButton);
        isConnected = (TextView) findViewById(R.id.isConnected);

        editTotaleScore.setFilters(new InputFilter[] {new InputFilterMinMax("0", "300")});
        editAantalspares.setFilters(new InputFilter[] {new InputFilterMinMax("0", "10")});
        editAantalStrikes.setFilters(new InputFilter[] {new InputFilterMinMax("0", "12")});


        if(isConnected())
        {
            isConnected.setBackgroundColor(0xFF00CC00);
            isConnected.setText("Connected");
        }
        else
        {
            isConnected.setText("No connection");
        }

        submitScoreButton.setOnClickListener(this);
    }

    public boolean isConnected(){
		   ConnectivityManager connMgr = (ConnectivityManager) getSystemService(Activity.CONNECTIVITY_SERVICE);
            NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
            if (networkInfo != null && networkInfo.isConnected()) 
                return true;
            else
                return false; 
    }

    public static String POST(String url,ScoreData score){ //url veranderd
        InputStream inputStream = null;
        String result = "";
        try{
            HttpClient httpClient = new DefaultHttpClient();
            HttpPost httpPost = new HttpPost(url);
            String json = "";

            JSONObject jsonObject = new JSONObject();
            jsonObject.accumulate("Total", score.getTotaleScore());
            jsonObject.accumulate("Strikes",score.getAantalStrikes());
            jsonObject.accumulate("Spares",score.getAantalSpares());
            jsonObject.accumulate("Game_ID",3);
            jsonObject.accumulate("Google_ID",3);

            json = jsonObject.toString();
            StringEntity se = new StringEntity(json);
            httpPost.setEntity(se);

            httpPost.setHeader("Accept","application/json");
            httpPost.setHeader("Content-type","application/json");

            HttpResponse httpResponse = httpClient.execute(httpPost);
            inputStream = httpResponse.getEntity().getContent();

            if(inputStream != null)
            {
                result = convertInputStreamToString(inputStream);
            }
            else
            {
                result = "Did not work!";
            }
        }
        catch(Exception e)
        {
            Log.d("Inputstream", e.getLocalizedMessage());

        }

        return result;

    }

    @Override
    public void onClick(View view) {

        TotaleScore = editTotaleScore.getText().toString();
        AantalStrikes = editAantalStrikes.getText().toString();
        AantalSpares = editAantalspares.getText().toString();

        switch(view.getId()){
            case R.id.submitScoreButton:
                if(!validate())
                    Toast.makeText(getBaseContext(),"Enter some data!",Toast.LENGTH_LONG).show();
                    new HttpAsyncTask().execute("http://localhost/ICTProjects3/ScoreController/MobileApp");
                break;
        }

    }

    // heb hier iets moeten veranderen. Extra klasse en geen override. Ik weet niet als dit juist is! Team Bilbo

    private class HttpAsyncTask extends AsyncTask<String, Void, String> {
        @Override
        protected String doInBackground(String... urls) {

            score = new ScoreData();

            score.setTotaleScore(TotaleScore);
            score.setAantalStrikes(AantalStrikes);
            score.setAantalSpares(AantalSpares);

            return POST(urls[0],score);
        }

        //@Override
        //protected String doInBackground(String... params) {
          //  return null;
        //}

        /*private class HttpAsyncTask extends AsyncTask<String, Void, String> {
                @Override
                protected int doInBackground(Integer... urls){

                    score = new ScoreData();


                    score.setTotaleScore(Integer.parseInt(editTotaleScore.getText().toString()));
                    score.setAantalStrikes(Integer.parseInt(editAantalStrikes.getText().toString()));
                    score.setAantalSpares(Integer.parseInt(editAantalspares.getText().toString()));

                    return POST(urls[0],score);

                }*/
        @Override
        protected void onPostExecute(String result) {
            String stat = "no anwser form server";                                                  //default no anwser yet

            try{
               JSONObject obj = new JSONObject(result);                                             //parsing the anwser to json obj
               stat = obj.getString("status");                                                      //looking for the status field
            }catch(Exception ex){
                Log.d("status parse",ex.toString());
            }

            Toast.makeText(getBaseContext(),stat,Toast.LENGTH_LONG).show();                         //showing toast with status
        }
    }

    private boolean validate(){
        if(editTotaleScore.getText().toString().trim().equals(""))
            return false;
        else if(editAantalStrikes.getText().toString().trim().equals(""))
            return false;
        else if(editAantalspares.getText().toString().trim().equals(""))
            return false;
        else
            return true;
    }

    private static String convertInputStreamToString(InputStream inputStream) throws IOException{
        BufferedReader bufferedReader = new BufferedReader( new InputStreamReader((inputStream)));
        String line = "";
        String result = "" ;
        while ((line = bufferedReader.readLine()) != null)
            result += line;

        inputStream.close();;
        return result;
    }

}
