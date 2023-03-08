<?php
require(WEBROOT. '/models/TacheManager.php');

class TacheController {
    private $tacheManager;
    public function __construct() {
        $this->tacheManager = new TacheManager();
    }

    public function index() {
        $title = 'Taches';
        $taches = $this->tacheManager->getTaches();
        $undoneTasks = array_filter($taches, function($t){
            return $t->getStatut() == 0;
        });
        require(WEBROOT. '/views/liste_tache.php');
    }

    public function add() {
        $title = 'Ajout';
        $actualLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
            . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            
        if(isset($_POST['submit']) && $_POST['submit'] === $title) {
            $tache = new Tache($this->sanitize($_POST));
            $this->tacheManager->add($tache);
            unset($_POST);
            
            header("Location: " . ROOT);
            exit();
        } else {
            require(WEBROOT. '/views/form_tache.php');
        }
    }

    public function edit(int $id) {
        $title = 'Modifier';
        $actualLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
            . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $tache = $this->tacheManager->getTacheById($id);
        if(! $tache)
            throw new Exception('Tache not found');
            
        if(isset($_POST['submit']) && $_POST['submit'] === $title) {
            $tache->hydrate($this->sanitize($_POST));
            $this->tacheManager->update($tache);
            unset($_POST);

            header("Location: " . ROOT);
            exit();
        } else {
            require(WEBROOT. '/views/form_tache.php');
        }
    }

    public function delete(int $id) {
        $this->tacheManager->delete($id);

        header("Location: " . ROOT);
        exit();
    }

    public function toggleCheck(int $id) {
        $tache = $this->tacheManager->getTacheById($id);
        if(! $tache)
            throw new Exception('Tache not found');

        $tache->setStatut(($tache->getStatut() + 1) % 2);
        $this->tacheManager->update($tache, true);

        header("Location: " . ROOT);
        exit();
    }

    private function sanitize($post)
    {
        $data = [];
        foreach ($post as $key => $value) {
            $data[$key] = htmlspecialchars($value);
        }
        return $data;
    }

    public function param() {
        $title = 'Paramètre';
        $actualLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
            . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if(isset($_POST['submit']) && $_POST['submit'] === $title) {
            setcookie('notif_time', $_POST['notif_time'], time() + (10 * 365 * 24 * 60 * 60), "/");
            
            header("Location: " . ROOT);
            exit();
        }
        require(WEBROOT. '/views/param.php');
    }
}
