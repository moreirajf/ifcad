<?php
    class ConnectionFactory{
        private const host="localhost";
        private const user="admin";
        private const pass="admin";
        private const db="SINAU";
        public static function getConnection(): PDO{
            $connection = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
            return $connection;
        }
    }
?>