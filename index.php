<?php
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));   // chemin absolue depuis la racine du serveur
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));  // chemin depuis la racine du site
require(WEBROOT. '/controllers/TacheController.php');
$tacheController = new TacheController();

try {
	if(! isset($_COOKIE['numero'])) { // si la personne n'est pas encore connectée
        // si la personne vient de se connecter
        if(isset($_GET['action']) && $_GET['action'] === 'login-check') {
            setcookie('nom', htmlspecialchars($_POST['nom']), time() + (10 * 365 * 24 * 60 * 60), "/");
            setcookie('numero', htmlspecialchars($_POST['numero']), time() + (10 * 365 * 24 * 60 * 60), "/");
            header("Location: " . ROOT);
            exit();
        } else {
            require(WEBROOT. '/views/login.php');
        }
    } else {
		if (isset($_GET['action']) && $_GET['action'] !== '') {
			if ($_GET['action'] === 'add') {
				$tacheController->add();
			} else if ($_GET['action'] === 'edit') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					$id = $_GET['id'];
					$tacheController->edit($id);
				} else {
					throw new Exception("Invalid Request: id is required");
				}
			} else if ($_GET['action'] === 'toggle-check') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					$id = $_GET['id'];
					$tacheController->edit($id);
				} else {
					throw new Exception("Invalid Request: id is required");
				}
			} else if ($_GET['action'] === 'delete') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					$id = $_GET['id'];
					$tacheController->delete($id);
				} else {
					throw new Exception("Invalid Request: id is required");
				}
			} else if ($_GET['action'] === 'toggle') {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					$id = $_GET['id'];
					$tacheController->toggleCheck($id);
				} else {
					throw new Exception("Invalid Request: id is required");
				}
			} else if ($_GET['action'] === 'param') {
				$tacheController->param();
			} else if ($_GET['action'] === 'deconnect') {
				setcookie('nom', null, -1, '/');
				setcookie('numero', null, -1, '/');
				header("Location: " . ROOT);
            	exit();
			} else {
				throw new Exception("Error 404 : Page not found");
			}
		} else {
			$tacheController->index();
		}
	}
} catch (Exception $e) {
	require(WEBROOT. '/views/error.php');
}
