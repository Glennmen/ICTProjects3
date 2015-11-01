package com.example.ictprojects.mobieleappbowling;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;

public class MainActivity extends AppCompatActivity
        implements View.OnClickListener {


    Button tournamentButton , gameButton , inboxButton;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        gameButton = (Button) findViewById(R.id.gameButton);
        tournamentButton =(Button) findViewById(R.id.tournamentButton);
        inboxButton = (Button)findViewById(R.id.inboxButton);


        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        tournamentButton.setOnClickListener(this);
        inboxButton.setOnClickListener(this);
        gameButton.setOnClickListener(this);

    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }


    @Override
    public void onClick(View view) {
        Intent intent = new Intent(MainActivity.this,itemListView.class);

        switch (view.getId()) {
            case R.id.tournamentButton:
                intent.putExtra("Caller" , "tournament");
                startActivity(intent);
                break;
            case R.id.gameButton:
                intent.putExtra("Caller" , "game");
                startActivity(intent);
                break;
            case R.id.inboxButton:
                intent.putExtra("Caller" , "inbox");
                startActivity(intent);
                break;
        }
    }
}




