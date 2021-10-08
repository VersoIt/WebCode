<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataBase.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataSendler.php');

	$logged_user = R::findOne('users', 'id = ?', array($_SESSION['logged_user']->id));
	if ($logged_user) R::exec('UPDATE `users` SET `last_online`= NOW() WHERE `id` = ' . $logged_user->id);

	$subjects = R::getCol('SELECT DISTINCT `subject` FROM `articles`');

	echo '<header class="wrapper dark-botton-border">
		<div class="container">
			<div class="logo-wrap">
				<a href="/index.php"><img src="/Logo/name.png" title="WebCode" alt="WebCode"/></a>
			</div>
			<nav class="menu">
				<ol>';
	foreach($subjects as $subject)
	{
		echo '<a class="title-link opacity-effect" href="/ContentPages/allArticles.php#' . $subject . '">' . $subject . '</li></a>';
	}
				
	echo 	'</ol>
			</nav>
			<div id="auth">';

			if (isset($_SESSION['logged_user']))
			{
				echo '<a class="red-button purple-button-effect" style="float:left" href="/UserPages/profile.php?id=' . $logged_user->id . '">' . Data::get_userName($logged_user) . '</a>
				<a class="dark-button opacity-effect" style="float:right" href="/ServerUtils/logOut.php">ВЫЙТИ</a>';
				if ($logged_user->is_admin) echo '<a class="red-button purple-button-effect" style="float:left" href="/Admin/articleEditor.php">Создать статью</a>';
			}
			else
			{
				echo '<a class="white-button dark-button-effect" style="float:left" href="/UserPages/LogIn.php">Войти</a>
				<a class="red-button purple-button-effect" style="float:right" href="/UserPages/SignUp.php">Регистрация</a>';
			}

			echo'</div>
		</div>
	</header>';
?>