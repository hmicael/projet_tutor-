<?php

class Tache {
  private int $id;
  private string $titre;
  private string $matiere;
  private string $description;
  private string $date_d;
  private int $statut;

  public function __construct(array $data) {
    $this->hydrate($data);
  }

  public function getId() {
    return $this->id;
  }

  public function setId(int $id = -1) {
    $this->id = $id;
  }

  public function getTitre() {
    return $this->titre;
  }

  public function setTitre(string $titre) {
    $this->titre = $titre;
  }

  public function getMatiere() {
    return $this->matiere;
  }

  public function setMatiere(string $matiere) {
    $this->matiere = $matiere;
  }

  public function getDescription() {
    return $this->description;
  }

  public function setDescription(string $description) {
    $this->description = $description;
  }

  public function getDate_d() {
    return $this->date_d;
  }

  public function setDate_d(string $date_d) {
    $this->date_d = $date_d;
  }

  public function getStatut() {
    return $this->statut;
  }

  public function setStatut(int $statut = 0) {
    $this->statut = $statut;
  }

  public function hydrate(array $data) {
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
}
