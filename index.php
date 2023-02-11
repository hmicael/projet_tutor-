<?php
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));   // chemin absolue depuis la racine du serveur
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));  // chemin depuis la racine du site
require(WEBROOT. '/controllers/TacheController.php');
$tacheController = new TacheController();

if (isset($_GET['action']) && $_GET['action'] !== '') {
	if ($_GET['action'] === 'edit') {
    	if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$id = $_GET['id'];
            $tacheController->edit($id);
    	} else {
        	echo 'Erreur : aucun identifiant envoyé';
        	die;
    	}
	} else if ($_GET['action'] === 'toggle-check') {
    	if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$id = $_GET['id'];
            $tacheController->edit($id);
    	} else {
        	echo 'Erreur : aucun identifiant envoyé';
        	die;
    	}
	} else if ($_GET['action'] === 'delete') {
    	if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$id = $_GET['id'];
            $tacheController->edit($id);
    	} else {
        	echo 'Erreur : aucun identifiant envoyé';
        	die;
    	}
	} else {
    	echo "Erreur 404 : la page que vous recherchez n'existe pas.";
	}
} else {
	$tacheController->index();
}
