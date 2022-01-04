<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataBase.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataSendler.php');

	$logged_user = R::findOne('users', 'id = ?', array($_SESSION['logged_user']));
	if ($logged_user) R::exec('UPDATE `users` SET `last_online`= NOW() WHERE `id` = ' . $logged_user->id);

	$subjects = R::getCol('SELECT DISTINCT `subject` FROM `articles`');

	echo '<header class="wrapper dark-botton-border">
		<div class="container">
			<div class="logo-wrap">
				<a href="/index.php"><img src="/Logo/name.png" title="WebCode" alt="WebCode"/></a>
			</div>
			<nav class="menu">
				<ol>';
	foreach($subjects as $subject) echo '<a class="title-link opacity-effect" href="/ContentPages/allArticles.php#' . $subject . '">' . $subject . '</li></a>';
				
	echo 	'</ol>
			</nav>
			<div id="auth">';
			if (isset($_SESSION['logged_user']))
			{
				echo '<a class="user-login red-button purple-button-effect" style="float:left" href="/UserPages/profile.php?id=' . $logged_user->id . '">' . htmlspecialchars(Data::get_userName($logged_user)) . '</a>';
				if ($logged_user->is_admin) echo '<a class="red-button purple-button-effect" style="float:left" href="/Admin/articleEditor.php" title="Создать статью"><i class="fa fa-plus" aria-hidden="true"></i></a>';
				echo '<a class="dark-button hide-low-width opacity-effect" style="float:right" href="/ServerUtils/logOut.php">ВЫЙТИ</a>';
			}
			else
			{
				echo '<a class="register white-button hide-low-width dark-button-effect" style="float:left" href="/UserPages/LogIn.php">Войти</a>
				<a class="register red-button hide-low-width purple-button-effect" style="float:right" href="/UserPages/SignUp.php">Регистрация</a>';
				echo '<a class="low-width white-button dark-button-effect" style="float:left;" href="/UserPages/LogIn.php"><i class="fa fa-sign-in"></i></a>
				<a class="low-width red-button purple-button-effect" style="float:right;" href="/UserPages/SignUp.php"><i class="fas fa-user-plus" aria-hidden="true"></i></a>';
			}

			echo'</div>
		</div>
	</header>';
?>