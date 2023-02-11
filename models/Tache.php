<?php

class Tache {
  private $id;
  private $titre;
  private $matiere;
  private $description;
  private $date_d;
  private bool $statut;

  public function __construct(array $data) {
    foreach ($data as $key => $value) {
        if ($key == 'id' || $key == 'statut') {
            $value = intval($value);
        }
        $method = 'set' . ucfirst($key);
        if (method_exists($this, $method)) {
            $this->$method($value);
        }
    }
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getTitre() {
    return $this->titre;
  }

  public function setTitre($titre) {
    $this->titre = $titre;
  }

  public function getMatiere() {
    return $this->matiere;
  }

  public function setMatiere($matiere) {
    $this->matiere = $matiere;
  }

  public function getDescription() {
    return $this->description;
  }

  public function setDescription($description) {
    $this->description = $description;
  }

  public function getDate_d() {
    return $this->date_d;
  }

  public function setDate_d($date_d) {
    $this->date_d = $date_d;
  }

  public function getStatut() {
    return $this->statut;
  }

  public function setStatut($statut) {
    $this->statut = $statut;
  }
}
