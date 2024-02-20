<?php
session_start();

class Database
{

    // proprietes
    public static $bdd;

    //
    public static function connect()
    {
        //foo@ssh:~$ mysql -h mysql-foo.alwaysdata.net -u foo -p foo_base
        try {
            self::$bdd = new PDO('mysql:host=******;dbname=******;charset=utf8',"******", "********");
        } catch (Exception $erreur) {
            die("ERROR connexion à la base de donnée:" . $erreur->getMessage());
        }

        return self::$bdd;
    }
}
