<?php
	require_once('config/connect.php');
	require_once('Controllers/DataController.php');

	$action = isset($_GET['action']) ? $_GET['action'] : 'index';

	$dataController = new DataController();

	switch ($action) {
		case 'create':
			$dataController->create();
			break;
		case 'store':
			$dataController->store();
			break;
		case 'show':
			$id = $_GET['id'];
			$dataController->show($id);
			break;
		case 'edit':
			$id = $_GET['id'];
			$dataController->edit($id);
			break;
		case 'update':
			$id = $_GET['id'];
			$dataController->update($id);
			break;
		case 'delete':
			$id = $_GET['id'];
			$dataController->delete($id);
			break;
		default:
			$dataController->index();
	}
?>
