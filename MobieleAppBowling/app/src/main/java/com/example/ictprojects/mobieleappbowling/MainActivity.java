package com.example.ictprojects.mobieleappbowling;

import android.content.Context;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.AdapterView;
import android.widget.GridView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity{

    GridView gv;
    Context context;
    public static String [] nameList={"blue","red","green","yello"};
    public static int [] imageList ={R.drawable.red , R.drawable.purpel , R.drawable.redish ,R.drawable.brownish};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_main);

        gv = (GridView) findViewById(R.id.gridview);
        gv.setAdapter(new CustomAdapter(this, nameList, imageList));


        gv.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            public void onItemClick(AdapterView<?> parent, View v,int position, long id) {

                Toast.makeText(MainActivity.this, "" + position,
                        Toast.LENGTH_SHORT).show();
            }
        });

    }

    /*
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
    }*/

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
}




