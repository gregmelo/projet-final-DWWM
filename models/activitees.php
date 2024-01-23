<?php
class Activitees
{
  private $id;
  private $titreActivitees;
  private $description;
  private $jours;
  private $duree;
  private $id_classe;
public function __construct($id,$titreActivitees,$description,$jours,$duree,$id_classe)
{
  $this->id = $id;
  $this->titreActivitees = $titreActivitees;
  $this->description = $description;
  $this->jours = $jours;
  $this->duree = $duree;
  $this->id_classe = $id_classe;
}
  public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
  public function getTitreActivitees()
    {
        return $this->titreActivitees;
    }

    public function setTitreActivitees($titreActivitees)
    {
        $this->titreActivitees = $titreActivitees;
    }
  public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
  public function getJours()
    {
        return $this->jours;
    }

    public function setJours($jours)
    {
        $this->jours = $jours;
    }
  public function getDuree()
    {
        return $this->duree;
    }

    public function setDuree($duree)
    {
        $this->duree = $duree;
    }
  public function getId_classe()
    {
        return $this->id_classe;
    }

    public function setId_classe($id_classe)
    {
        $this->id_classe = $id_classe;
    }
}
