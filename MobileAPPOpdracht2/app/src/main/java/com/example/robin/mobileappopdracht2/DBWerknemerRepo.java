package com.example.robin.mobileappopdracht2;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.Locale;

/**
 * Created by Robin on 23/11/2015.
 */
public class DBWerknemerRepo {
    private DBHelper dbHelper;

    public DBWerknemerRepo(Context context) {
        dbHelper = new DBHelper(context);
    }

    public int insert(DBWerknemer ToDo) {
        //Open connection to write data
        SQLiteDatabase db = dbHelper.getWritableDatabase();
        ContentValues values = new ContentValues();
        values.put(DBWerknemer.KEY_startTime, ToDo.StartTime.toString());
        values.put(DBWerknemer.KEY_endTime, ToDo.EndTime.toString());
        values.put(DBWerknemer.KEY_ClientName, ToDo.ClientName.toString());
        values.put(DBWerknemer.KEY_Lat, ToDo.Lat);
        values.put(DBWerknemer.KEY_Long, ToDo.Long);
        // Inserting Row
        long klant_Id = db.insert(DBWerknemer.TABLE, null, values);
        db.close(); // Closing database connection
        return (int) klant_Id;
    }
    public void delete(int klant_Id) {

        SQLiteDatabase db = dbHelper.getWritableDatabase();
        // It's a good practice to use parameter ?, instead of concatenate string
        db.delete(DBWerknemer.TABLE, DBWerknemer.KEY_ID + "= ?", new String[]{String.valueOf(klant_Id)});
        db.close(); // Closing database connection
    }
    public void update(DBWerknemer klant) {

        SQLiteDatabase db = dbHelper.getWritableDatabase();
        ContentValues values = new ContentValues();

        values.put(DBWerknemer.KEY_startTime, klant.StartTime.toString());
        values.put(DBWerknemer.KEY_endTime, klant.EndTime.toString());
        values.put(DBWerknemer.KEY_ClientName, klant.ClientName.toString());
        values.put(DBWerknemer.KEY_Lat, klant.Lat);
        values.put(DBWerknemer.KEY_Long, klant.Long);

        // It's a good practice to use parameter ?, instead of concatenate string
        db.update(DBWerknemer.TABLE, values, DBWerknemer.KEY_ID + "= ?", new String[]{String.valueOf(klant.Client_ID)});
        db.close(); // Closing database connection
    }

    public ArrayList<HashMap<String, String>>  getClientList() {
        //Open connection to read only
        SQLiteDatabase db = dbHelper.getReadableDatabase();
        String selectQuery =  "SELECT * FROM " + DBWerknemer.TABLE;

        //DBWerknemer Client = new DBWerknemer();
        ArrayList<HashMap<String, String>> ClientList = new ArrayList<HashMap<String, String>>();

        Cursor cursor = db.rawQuery(selectQuery, null);
        // looping through all rows and adding to list

        if (cursor.moveToFirst()) {
            do {
                HashMap<String, String> client = new HashMap<String, String>();
                client.put("id", cursor.getString(cursor.getColumnIndex(DBWerknemer.KEY_ID)));
                client.put("startTime", cursor.getString(cursor.getColumnIndex(DBWerknemer.KEY_startTime)));
                client.put("endTime", cursor.getString(cursor.getColumnIndex(DBWerknemer.KEY_endTime)));
                client.put("ClientName", cursor.getString(cursor.getColumnIndex(DBWerknemer.KEY_ClientName)));
                client.put("Lat", cursor.getString(cursor.getColumnIndex(DBWerknemer.KEY_Lat)));
                client.put("Long", cursor.getString(cursor.getColumnIndex(DBWerknemer.KEY_Long)));
                ClientList.add(client);

            } while (cursor.moveToNext());
        }
        cursor.close();
        db.close();
        return ClientList;
    }
    public Boolean  IsDubbleBookt(Date startDate, Date endDate) {
        //Open connection to read only
        SQLiteDatabase db = dbHelper.getReadableDatabase();
        String selectQuery =  "SELECT * FROM " + DBWerknemer.TABLE;

        //DBWerknemer Client = new DBWerknemer();
        ArrayList<HashMap<String, String>> ClientList = new ArrayList<HashMap<String, String>>();

        Cursor cursor = db.rawQuery(selectQuery, null);
        // looping through all rows and adding to list

        if (cursor.moveToFirst()) {
            do {
                Date _startDate= convertDate(cursor.getString(cursor.getColumnIndex(DBWerknemer.KEY_startTime)));
                Date _endDate = convertDate(cursor.getString(cursor.getColumnIndex(DBWerknemer.KEY_endTime)));

                if((startDate.after(_startDate)||startDate.equals(_startDate))  && startDate.before(_endDate))//double planned
                    return false;
                if(endDate.after(_startDate) && (endDate.before(_endDate)||endDate.equals(_endDate)))
                    return false;

            } while (cursor.moveToNext());
        }
        cursor.close();
        db.close();
        return true;
    }
    public static Date convertDate(String date) {
        // here date = gpsD+" "+gpsT;
        SimpleDateFormat format = new SimpleDateFormat("ddMMyy HHmmss", Locale.getDefault());

        Date destDate;
        try {
            destDate = format.parse(date);
            return destDate;
        } catch (ParseException e) {
            e.printStackTrace();
        }
        return null;
    }

}