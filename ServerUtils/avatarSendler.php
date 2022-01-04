<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataBase.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataSendler.php');

	$user = R::findOne('users', 'id = ?', array($_SESSION['logged_user']));
	Data::sendIcon($user, '/Images/Users/');
	R::store($user);

	header('Location: /UserPages/profile.php?id=' . $_SESSION['logged_user']);

	exit();
?>