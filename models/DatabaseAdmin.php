<?php
session_start();

class Database
{
    // propriétés
    public static $bdd;

    // méthode de connexion à la base de données
    public static function connect()
    {
        try {
            self::$bdd = new PDO('mysql:host=***;dbname=***;charset=utf8', "*****", "******");
        } catch (Exception $erreur) {
            die("ERROR connexion à la base de donnée:" . $erreur->getMessage());
        }

        return self::$bdd;
    }
}
