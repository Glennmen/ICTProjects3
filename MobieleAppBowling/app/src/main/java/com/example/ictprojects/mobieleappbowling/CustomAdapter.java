package com.example.ictprojects.mobieleappbowling;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.List;

public class CustomAdapter extends BaseAdapter {
    private final List<Item> mItems = new ArrayList<Item>();
    private final LayoutInflater mInflater;

    public CustomAdapter(Context context) {
        mInflater = LayoutInflater.from(context);

        mItems.add(new Item("Blue",    R.drawable.blue));
        mItems.add(new Item("Green",   R.drawable.green));
        mItems.add(new Item("Red",     R.drawable.red));
        mItems.add(new Item("Yellow",  R.drawable.yellow));
    }

    @Override
    public int getCount() {
        return mItems.size();
    }

    @Override
    public Item getItem(int i) {
        return mItems.get(i);
    }

    @Override
    public long getItemId(int i) {
        return mItems.get(i).drawableId;
    }

    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {
        View v = view;
        ImageView picture;
        TextView name;

        if (v == null) {
            v = mInflater.inflate(R.layout.item_view, viewGroup, false);
            v.setTag(R.id.imageViewTile, v.findViewById(R.id.imageViewTile));
            v.setTag(R.id.textviewTileName, v.findViewById(R.id.textviewTileName));
        }

        picture = (ImageView) v.getTag(R.id.imageViewTile);
        name = (TextView) v.getTag(R.id.textviewTileName);

        Item item = getItem(i);

        picture.setImageResource(item.drawableId);
        name.setText(item.name);

        return v;
    }

    private static class Item {
        public final String name;
        public final int drawableId;

        Item(String name, int drawableId) {
            this.name = name;
            this.drawableId = drawableId;
        }
    }
}