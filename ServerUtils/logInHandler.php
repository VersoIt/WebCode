<?php
	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataBase.php');
	
	$data = $_POST;
	$errors = array();

	if (isset($data['logInUser']))
	{
		if(trim($data['login']) == '') $errors[] = 'Введите логин!';

		if($data['password'] == '') $errors[] = 'Введите пароль!';

		$user = R::findOne('users', 'login = ?', array(mb_strtolower($data['login'])));
		
		if($user)
		{
			if(password_verify($data['password'], $user->password))
			{
				$_SESSION['logged_user'] = $user;
				header('Location: /');
			}
			else $errors[] = 'Неверно введён пароль!';
		}
		else $errors[] = 'Пользователь не найден!';
	}
?>