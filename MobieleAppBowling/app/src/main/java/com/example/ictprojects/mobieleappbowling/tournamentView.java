package com.example.ictprojects.mobieleappbowling;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;

public class tournamentView extends AppCompatActivity {

    private String tournamentID;
    private String GoogleID;
    private String StartDate;
    private String EndDate;
    private String Name;

    private TextView Title;
    private TextView Date;


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

        Title.setText(Name);
        Date.setText(StartDate + " - " + EndDate);




    }
}
