package com.example.ictprojects.mobieleappbowling;

import android.app.Activity;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;

import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpGet;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.URI;

public class itemListView extends AppCompatActivity
        implements AdapterView.OnItemClickListener {
    public static String CALLER = "com.example.ictprojects.mobileappbowling.CALLER";                //global var to check wich button called the class

    private ListView itemList;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_view);

        itemList = (ListView)findViewById(R.id.itemlist);
        itemList.setOnItemClickListener(this);

        if(isConnected()){
            new HttpAsyncTask().execute("http://localhost/ICTProjects3/TournamentListController/MobileApp");
        }


    }

    public boolean isConnected(){
        ConnectivityManager connMgr = (ConnectivityManager) getSystemService(Activity.CONNECTIVITY_SERVICE);
        NetworkInfo networkInfo = connMgr.getActiveNetworkInfo();
        if (networkInfo != null && networkInfo.isConnected())
            return true;
        else
            return false;
    }


    private class HttpAsyncTask extends AsyncTask<String, Void, String> {
        @Override
        protected String doInBackground(String... urls) {

            return GET(urls[0]);
        }

        @Override
        protected void onPostExecute(String result) {
            String stat = "no anwser form server";                                                  //default no anwser yet
    /*
            try{
                JSONObject obj = new JSONObject(result);                                             //parsing the anwser to json obj
                stat = obj.getString("status");                                                      //looking for the status field
            }catch(Exception ex){
                Log.d("status parse", ex.toString());
            }*/

            Toast.makeText(getBaseContext(), result, Toast.LENGTH_LONG).show();                         //showing toast with status
        }
    }


    public static String GET(String url){ //url veranderd
        InputStream inputStream = null;
        String result = "";
        try{
            HttpClient httpClient = new DefaultHttpClient();                                        //creating httpClient
            HttpGet request = new HttpGet();                                                        //creating getMethod
            URI website = new URI(url);                                                             //converting url
            request.setURI(website);                                                                //adding url to getMethod

            HttpResponse httpResponse = httpClient.execute(request);                                //excecuting the getMethod and buffering the anwser
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

    private static String convertInputStreamToString(InputStream inputStream) throws IOException {
        BufferedReader bufferedReader = new BufferedReader( new InputStreamReader((inputStream)));
        String line = "";
        String result = "" ;
        while ((line = bufferedReader.readLine()) != null)
            result += line;

        inputStream.close();;
        return result;
    }

    @Override
    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

    }
}
