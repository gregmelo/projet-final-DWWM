<?php
class Villes
{
  private $cp;
  private $nom_ville;
  private $site;
  private $photo;
  private $id_pays;
public function __construct($cp,$nom_ville,$site,$photo,$id_pays)
{
  $this->cp = $cp;
  $this->nom_ville = $nom_ville;
  $this->site = $site;
  $this->photo = $photo;
  $this->id_pays = $id_pays;
}
  public function getCp()
    {
        return $this->cp;
    }

    public function setCp($cp)
    {
        $this->cp = $cp;
    }
  public function getNom_ville()
    {
        return $this->nom_ville;
    }

    public function setNom_ville($nom_ville)
    {
        $this->nom_ville = $nom_ville;
    }
  public function getSite()
    {
        return $this->site;
    }

    public function setSite($site)
    {
        $this->site = $site;
    }
  public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }
  public function getId_pays()
    {
        return $this->id_pays;
    }

    public function setId_pays($id_pays)
    {
        $this->id_pays = $id_pays;
    }
}
