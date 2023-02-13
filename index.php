<?php
define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));   // chemin absolue depuis la racine du serveur
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));  // chemin depuis la racine du site
require(WEBROOT. '/controllers/TacheController.php');
$tacheController = new TacheController();

try {
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
		} else {
			throw new Exception("Error 404 : Page not found");
		}
	} else {
		$tacheController->index();
	}
} catch (Exception $e) {
	require(WEBROOT. '/views/error.php');
}
