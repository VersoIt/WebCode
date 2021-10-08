<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Libs/rb.php');
	date_default_timezone_set('Europe/Moscow');
	R::setup( 'mysql:host=localhost;dbname=webcode', 'root', ''); //for both mysql or mariaDB

	session_start();
?>