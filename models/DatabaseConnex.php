<?php

class Database {
    
    // proprietes
    public static $bdd;
   
    //
    public static function connect(){

        try{
        self::$bdd = new PDO('mysql:host=********;dbname=********;charset=utf8',"******","********");
        }
        catch(Exception $erreur){
            die("ERROR connexion à la base de donnée:" .$erreur->getMessage());
        }

        return self::$bdd;
    }
    
}
