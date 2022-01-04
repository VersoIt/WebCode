<?php

	function validate_email($email) {
    	return (preg_match("/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/", $email) || !preg_match("/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $email)) ? false : true;
	}

	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataBase.php');
	
	$data = $_POST;
	$errors = array();

	if (isset($data['logInUser']))
	{
		if(trim($data['login']) == '') $errors[] = 'Введите логин!';

		if($data['password'] == '') $errors[] = 'Введите пароль!';

		$user = null;

		$user = R::findOne('users', '`email` = ? OR `login` = ?', array(mb_strtolower($data['login']), mb_strtolower($data['login'])));

		
		if($user)
		{
			if(password_verify($data['password'], $user->password))
			{
				$_SESSION['logged_user'] = $user->id;
				header('Location: /');
			}
			else $errors[] = 'Неверно введён пароль!';
		}
		else $errors[] = 'Пользователь не найден!';
	}
?>