<?php

class Database {
    private static $username = 'root';
    private static $password = 'root';
//Data source name
    private static $dsn = 'mysql:host=localhost;dbname=mad_events';
    private static $dbconn;

    private function __construct()
    {

    }


    public static function  getDb(){

        try {
            if(!isset(self::$dbconn)){
                self::$dbconn = new PDO(self::$dsn, self::$username, self::$password);
            }
        } catch (PDOException $e) {
            $msg = $e->getMessage();
            //include 'custom-error.php';
            exit();
        }

        return self::$dbconn;
    }
}
