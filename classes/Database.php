<?php

class Database
{
    // info for connecting to database
    private static $username="root";
    private static $password = "";
//    private static $dbname="madevents";
    private static $dsn = "mysql:host=localhost;dbname=madevents";

    private static $dbcon;

    // function to connect
    public static function getDb(){

        // connect to database
        try{
            // if the connection has not been created
            if(!isset(self::$dbcon)){
                // create one
                self::$dbcon = new PDO(self::$dsn, self::$username, self::$password);
            }
        }catch (Exception $err){
            // if there's error, print the error message and exit
            echo $err->getMessage();
            exit();
        }

        return self::$dbcon;
    }
}