package com.example.ictprojects.mobieleappbowling;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.AdapterView;
import android.widget.GridView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity{

    GridView gv;
    public static String [] nameList={"Tournament score","Game Score","uitnodigingen","profiel"};
    public static int [] imageList ={R.drawable.red , R.drawable.purpel , R.drawable.redish ,R.drawable.brownish};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_main);

        gv = (GridView) findViewById(R.id.gridview);

        gv.setAdapter(new CustomAdapter(this, nameList, imageList));


        gv.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            public void onItemClick(AdapterView<?> parent, View v,int position, long id) {

                Intent intent = new Intent(MainActivity.this,itemListView.class);

                switch (position) {
                    case 0:
                        intent.putExtra("Caller" , "tournament");
                        startActivity(intent);
                        break;
                    case 1:
                        intent.putExtra("Caller" , "game");
                        startActivity(intent);
                        break;
                    case 2:
                        intent.putExtra("Caller" , "inbox");
                        startActivity(intent);
                        break;
                }
            }
        });

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
}




