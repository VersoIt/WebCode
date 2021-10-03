<?php
	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataBase.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataSendler.php');

	$data = $_POST;
	$file_icon = $_FILES;
	$errors = array();

	if (isset($data['accept']))
	{
		if (trim($data['title']) == '') $errors[] = 'Введите название статьи!';

		if (trim($data['content']) == '') $errors[] = 'Введите текст статьи!';

		if (trim($data['subject']) == '') $errors[] = 'Введите тематику статьи!';

		if (trim($data['description']) == '') $errors[] = 'Введите описание статьи!';

		if (R::count('articles', 'title = ?', array($data['title'])) > 0) $errors[] = 'Статья с таким названием уже существует!';

		if (empty($errors)) header('Location: /');
	}

?>