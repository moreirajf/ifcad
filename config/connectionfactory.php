<?php
    class ConnectionFactory{
            
        public static function getConnection(): PDO{
            $host="localhost";
            $user="root";
            $pass="";
            $db="SINAU";


            $connection = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
            return $connection;
        }
    }
?>