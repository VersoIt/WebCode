<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataBase.php');

	class Data
	{
		public static function sendUserData($data)
		{
			$user = R::dispense('users');

			$user->login = mb_strtolower($data['login']);
			$user->email = mb_strtolower($data['email']);
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			$user->ip = $_SERVER['REMOTE_ADDR'];
			$user->is_admin = false;
		
			R::store($user);

			$_SESSION['logged_user'] = $user;
			header('Location: /');
		}

		public static function sendArticleData($data)
		{
			$article = R::dispense('articles');

			$article->title = $data['title'];
			$article->content = $data['content'];
			$article->subject = strtoupper($data['subject']);
			$article->description = $data['description'];
			$article->date = date('d M Y H:i:s');
			$article->owner_id = $_SESSION['logged_user']->id;
			Data::sendIcon($article);

			R::store($article);
		}

		public static function sendIcon(&$bean)
		{
			$path = $_SERVER['DOCUMENT_ROOT'] . '/Images/Articles/' . $_FILES['icon']['name'];
			if (move_uploaded_file($_FILES['icon']['tmp_name'], $path)) $bean->icon = '/Images/Articles/' . $_FILES['icon']['name'];
			else $bean->icon = '/Images/Articles/unknown.jpg';
		}
	}
?>