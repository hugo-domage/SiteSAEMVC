<?php

abstract class Model{
    private static $_bdd;
    private static function setBdd(){
        $host = "trumpet.db.elephantsql.com";
        $user = "itkrikdc";
        $pass = "4KdTrccy3LgH8IGDpq9P2qeZAdJo4l-n";
        $db = "itkrikdc";

        // Connexion à la base de données
        self::$_bdd = new PDO("pgsql:host=$host; port=5432; dbname=$db; user=$user; password=$pass");
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd(){
        if(self::$_bdd == null )
            self::setBdd();
        return self::$_bdd;
    }

    protected function getAll($table, $obj){
        $var = [];
        $req = $this->getBdd() -> prepare('SELECT * FROM ' .$table. ' ORDER BY id desc');
        $req -> execute();
        while ($data = $req -> fetch(PDO::FETCH_ASSOC)){
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
}