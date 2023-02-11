<?php
require(WEBROOT. '/models/TacheManager.php');

class TacheController {
    private $tacheManager;
    public function __construct() {
        $this->tacheManager = new TacheManager();
    }

    public function index() {
        $title = "Taches";
        $taches = $this->tacheManager->getTaches();
        require(WEBROOT. '/views/liste_tache.php');
    }

    public function add() {
        $title = "Ajout";
    }

    public function edit(int $id) {
        $title = "Modifier";
        $tache = $this->tacheManager->getTacheById($id);
        require(WEBROOT. '/views/form_tache.php');
    }

    public function delete() {

    }

    public function toggleCheck() {

    }
}
