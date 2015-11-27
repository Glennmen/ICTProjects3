package com.example.robin.mobileappopdracht2;

/**
 * Created by Robin on 23/11/2015.
 */
import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

public class DBHelper  extends SQLiteOpenHelper {
    //version number to upgrade database version
    //each time if you Add, Edit table, you need to change the
    //version number.
    private static final int DATABASE_VERSION = 4;

    // Database Name
    private static final String DATABASE_NAME = "MApps.db";

    public DBHelper(Context context ) {
        super(context, DATABASE_NAME, null, DATABASE_VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        //All necessary tables you like to create will create here

        String CREATE_TABLE_STUDENT = "CREATE TABLE " + DBWerknemer.TABLE  + "("
                + DBWerknemer.KEY_ID  + " INTEGER PRIMARY KEY AUTOINCREMENT ,"
                + DBWerknemer.KEY_startTime + " TEXT, "
                + DBWerknemer.KEY_endTime + " TEXT, "
                + DBWerknemer.KEY_ClientName + " TEXT, "
                + DBWerknemer.KEY_Lat + " DOUBLE, "
                + DBWerknemer.KEY_Long + " DOUBLE )";

        db.execSQL(CREATE_TABLE_STUDENT);

    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        // Drop older table if existed, all data will be gone!!!
        db.execSQL("DROP TABLE IF EXISTS " + DBWerknemer.TABLE);

        // Create tables again
        onCreate(db);

    }

}