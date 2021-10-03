<?php
	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataBase.php');
	unset($_SESSION['logged_user']);
	header('Location: /');

?>