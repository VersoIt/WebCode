<?php
	

	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataSendler.php');
	
	$data = $_POST;
	$errors = array();

	if (isset($data['signUp']))
	{
		if(trim($data['email']) == '') $errors[] = 'Введите email!';

		if(trim($data['login']) == '') $errors[] = 'Введите логин!';

		if($data['password'] == '') $errors[] = 'Введите пароль!';

		if($data['password'] != $data['repeat_password']) $errors[] = 'Пароли не совпадают!';

		if(R::count('users', "login = ?", array($data['login'])) > 0) $errors[] = 'Пользователь с таким логином уже существует!';

		if(R::count('users', "email = ?", array($data['email'])) > 0) $errors[] = 'Пользователь с таким email уже существует!';
	}
?>