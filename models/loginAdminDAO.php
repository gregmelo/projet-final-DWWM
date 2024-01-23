<?php

class AdminDAO
{

    public function LoginAdmin($email)
    {
        $query = Database::connect()->prepare("SELECT * FROM `admin` where email=?");
        $query->execute([$email]);
        $admin = $query->fetch();
        return $admin;
	}

    public function AdminListe()
    {
        $query = Database::connect()->prepare("SELECT * FROM `admin`");
        $query->execute();
        $administrateurs = $query->fetchAll();
        return $administrateurs;
    }

    public function DeleteAdmin($id)
    {
        $query = Database::connect()->prepare("DELETE FROM `admin` WHERE id=?");
        $query->execute([$id]);
    }

    public function VerifName($email)
    {
        $query = Database::connect()->prepare("SELECT count(email) FROM `admin` WHERE email=?");
        $query->execute([$email]);
        $emailExiste = $query->fetch();
        return $emailExiste;
    }

    public function AddAdmin($email, $password_h)
    {
        $query = Database::connect()->prepare("INSERT INTO `admin` (email,motDePasse) VALUES (?,?)");
        $query->execute([$email, $password_h]);
    }
}