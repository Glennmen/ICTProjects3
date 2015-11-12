package com.example.ictprojects.mobieleappbowling;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

public class CustomAdapter extends BaseAdapter {

    MainActivity mn;
    String [] names;
    int [] imageIds;
    private static LayoutInflater inflater = null;

    public CustomAdapter(MainActivity mainActivity,String[] nameList,int[] imageList) {
        names = nameList;
        imageIds = imageList;
        mn = mainActivity;
        inflater =(LayoutInflater)mainActivity.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
    }

    @Override
    public int getCount() {
        return names.length;
    }

    @Override
    public Object getItem(int i) {
        return i;
    }

    @Override
    public long getItemId(int i) {
        return i;
    }

    public class Holder{
        TextView tv;
        ImageView img;
    }

    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {
        Holder holder = new Holder();
        View rowView;

        rowView = inflater.inflate(R.layout.item_view,null);
        holder.tv = (TextView) rowView.findViewById(R.id.textviewTileName);
        holder.img = (ImageView) rowView.findViewById(R.id.imageViewTile);

        holder.tv.setText(names[i]);
        holder.img.setImageResource(imageIds[i]);


        return rowView;
    }


}