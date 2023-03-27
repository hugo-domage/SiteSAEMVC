<?php

final class Connection{
    public static function connect(String $host, String $user, String $password): PDO{
        try{
            $bdd = new PDO("pgsql:host=$host; port=5432; dbname=$user; user=$user password=$password");
            return $bdd;
        }
        catch (PDOException $e){
            die($e->getMessage());
        }
    }

    public static function initConnection(): PDO{
        return Connection::connect("trumpet.db.elephantsql.com", "itkrikdc", "4KdTrccy3LgH8IGDpq9P2qeZAdJo4l-n");
    }
}
