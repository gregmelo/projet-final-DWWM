<?php

class Database {
    
    // proprietes
    public static $bdd;
   
    //
    public static function connect(){

        try{
        self::$bdd = new PDO('mysql:host=mysql-vericelgregory.alwaysdata.net;dbname=vericelgregory_gestionecole;charset=utf8',"286914","Form2023");
        }
        catch(Exception $erreur){
            die("ERROR connexion à la base de donnée:" .$erreur->getMessage());
        }

        return self::$bdd;
    }
    
}
