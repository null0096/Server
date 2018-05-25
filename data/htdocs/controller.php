<?php
	require_once "model.php";

	$myModel	= new Model();
	$action		= isset($_GET['action']) ? $_GET['action'] : 0;

	switch($action) {
		default: $myModel->getAllDiscs();
	}
?>