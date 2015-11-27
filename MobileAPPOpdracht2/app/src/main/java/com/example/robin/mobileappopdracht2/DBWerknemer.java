package com.example.robin.mobileappopdracht2;

import org.w3c.dom.Text;

/**
 * Created by Robin on 23/11/2015.
 */
public class DBWerknemer {
    // Labels table name
    public static final String TABLE = "werknemer";

    // Labels Table Columns names
    public static final String KEY_ID = "id";
    public static final String KEY_startTime= "startTime";
    public static final String KEY_endTime = "endTime";
    public static final String KEY_ClientName = "ClientName";
    public static final String KEY_Lat = "Lat";
    public static final String KEY_Long = "Long";

    // property help us to keep data
    public int Client_ID;
    public Text StartTime;
    public Text EndTime;
    public Text ClientName;
    public Double Lat;
    public Double Long;
}
