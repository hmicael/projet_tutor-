<?php
require(WEBROOT. '/models/TacheManager.php');

class TacheController {
    private $tacheManager;
    public function __construct() {
        $this->tacheManager = new TacheManager();
    }

    public function index() {
        $taches = $this->tacheManager->getTaches();
        require(WEBROOT. '/views/liste_tache.php');
    }

    public function edit(int $id) {
        $tache = $this->tacheManager->getTacheById($id);
        var_dump($tache);
    }

    public function delete() {

    }

    public function toggleCheck() {

    }
}
