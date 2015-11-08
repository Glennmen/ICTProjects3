package com.example.ictprojects.mobieleappbowling;

import android.content.Context;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.GridView;
import android.widget.ImageView;

import static android.graphics.Color.rgb;

/**
 * Created by vincenttrekels on 8/11/15.
 */
public class ButtonAdapter extends BaseAdapter {
    private Context mContext;

    public ButtonAdapter(Context c) {
        mContext = c;
    }

    public int getCount() {
        return mButtonTexts.length;
    }

    public Object getItem(int position) {
        return null;
    }

    public long getItemId(int position) {
        return 0;
    }

    // create a new ImageView for each item referenced by the Adapter
    public View getView(int position, View convertView, ViewGroup parent) {
        Button button;

        if (convertView == null) {
            // if it's not recycled, initialize some attributes
            button = new Button(mContext);

            button.setLayoutParams(new GridView.LayoutParams(400,400));
            button.setPadding(4,4,4,4);
        } else {
            button = (Button) convertView;
        }

        
        button.setText(mButtonTexts[position]);
        button.setBackgroundColor(rgb(color[position][0] , color[position][1],color[position][2]));

        return button;
    }

    // references to our images
    private String[] mButtonTexts = {
            "game score","tournament score","profiel","uitnodigingen"
    };

    private int[][] color = {
            {68,36,86},{91,35,54},{43,80,66},{35,69,90}

    };


}



