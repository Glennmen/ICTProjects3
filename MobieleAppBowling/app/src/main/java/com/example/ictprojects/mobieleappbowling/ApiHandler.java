package com.example.ictprojects.mobieleappbowling;

import android.util.Log;

import org.apache.http.HttpResponse;
import org.apache.http.client.HttpClient;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.entity.StringEntity;
import org.apache.http.impl.client.DefaultHttpClient;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;

/**
 * Created by vincent on 31/10/2015.
 */
public class ApiHandler {
    public static String GET(String url , JSONObject obj){
        InputStream inputStream = null;
        String result = "";
        try{
            HttpClient httpClient = new DefaultHttpClient();
            HttpPost httpPost = new HttpPost(url);
            String json = "";

            json = obj.toString();
            StringEntity se = new StringEntity(json);
            httpPost.setEntity(se);

            httpPost.setHeader("Accept","application/json");
            httpPost.setHeader("Content-type", "application/json");

            HttpResponse httpResponse = httpClient.execute(httpPost);
            inputStream = httpResponse.getEntity().getContent();

            if(inputStream != null){
                result = convertInputStreamToString(inputStream);
            }
            else{
                result = "Did not work!";
            }
        }
        catch(Exception e)
        {
            Log.d("API Handler", e.getLocalizedMessage());
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

}
