package com.example.ictprojects.mobieleappbowling;

import android.app.Activity;
import android.content.DialogInterface;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
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

import java.io.InputStream;

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

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.addscore_main);

        editTotaleScore = (EditText) findViewById(R.id.editTotaleScore);
        editAantalStrikes = (EditText) findViewById(R.id.editAantalStrikes);
        editAantalspares = (EditText) findViewById(R.id.editAantalspares);
        submitScoreButton = (Button) findViewById(R.id.submitScoreButton);
        isConnected = (TextView) findViewById(R.id.isConnected);


        if(isConnected())
        {
            isConnected.setBackgroundColor(0xFF00CC00);
            isConnected.setText("Proficiat , je hebt ebo");
        }
        else
        {
            isConnected.setText("Jammer , jij hebt ebol");
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
    public static String POST(String url,ScoreData score){
        InputStream inputStream = null;
        String result = "";
        try{
            HttpClient httpClient = new DefaultHttpClient();
            HttpPost httpPost = new HttpPost(url);
            String json = "";

            JSONObject jsonObject = new JSONObject();
            jsonObject.accumulate("score", score.getTotaleScore());
        }
        catch(Exception e)
        {

        }


    }

    @Override
    public void onClick(View v) {

    }

}
