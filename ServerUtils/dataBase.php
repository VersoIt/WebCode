<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Libs/rb.php');
	R::setup( 'mysql:host=localhost;dbname=webcode',
        'root', '' ); //for both mysql or mariaDB

	session_start();
?>