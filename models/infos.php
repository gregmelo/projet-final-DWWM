<?php
class Infos
{
  private $id;
  private $titreInfos;
  private $details;
  private $id_classe;
public function __construct($id,$titreInfos,$details,$id_classe)
{
  $this->id = $id;
  $this->titreInfos = $titreInfos;
  $this->details = $details;
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
  public function getTitreInfos()
    {
        return $this->titreInfos;
    }

    public function setTitreInfos($titreInfos)
    {
        $this->titreInfos = $titreInfos;
    }
  public function getDetails()
    {
        return $this->details;
    }

    public function setDetails($details)
    {
        $this->details = $details;
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
