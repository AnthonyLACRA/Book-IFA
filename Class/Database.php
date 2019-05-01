<?php


class Database
{
    private static $_instance;

    public static function getInstance() {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "library";
        $charset = "utf8";
        if(is_null(self::$_instance)) {
            try {
                $dsn = "mysql:host=".$servername.";dbname=".$dbname.";charset=".$charset;
                self::$_instance = new PDO($dsn, $username, $password);
                self::$_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return self::$_instance;
    }

}