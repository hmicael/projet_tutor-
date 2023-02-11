<?php
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));   // chemin absolue depuis la racine du serveur
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));  // chemin depuis la racine du site
require(WEBROOT. '/controllers/TacheController.php');
$tacheController = new TacheController();

if($_SERVER['REQUEST_URI'] === ROOT) {
    $tacheController->index();
} else {
    echo "Erreur 404 : la page que vous recherchez n'existe pas.";
}
