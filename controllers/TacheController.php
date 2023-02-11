<?php
require(WEBROOT. '/models/TacheManager.php');

class TacheController {
    public function __construct() {}

    public function index() {
        $tache = new Tache(1, 'Titre', 'Matière', 'Desc', '2023-02-11');
        $taches = [$tache, $tache];
        require(WEBROOT. '/views/liste_tache.php');
    }
}
