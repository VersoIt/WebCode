<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataBase.php');

	echo '<header class="wrapper dark-botton-border">
		<div class="container">
			<div class="logo-wrap">
				<a href="/index.php"><img src="/Logo/name.png" title="WebCode" alt="WebCode"/></a>
			</div>
			<nav class="menu">
				<ul>
					<a class="title-link opacity-effect" href="#">HTML</li></a>
					<a class="title-link opacity-effect" href="#">PHP</li></a>
					<a class="title-link opacity-effect" href="#">CSS</li></a>
				</ul>
			</nav>
			<div id="auth">';

			if (isset($_SESSION['logged_user']))
			{
				$user = R::findOne('users', 'login = ?', array($_SESSION['logged_user']->login));
				if($user) echo '<a class="red-button purple-button-effect" style="float:left" href="#">' . $user->login . '</a>';
				else echo '<a class="red-button purple-button-effect" style="float:left" href="#" title="Ваш аккаунт удалён из-за нарушений правил сообщества.">DELETED</a>';
				echo ' <a class="dark-button opacity-effect" style="float:right" href="/ServerUtils/logOut.php">ВЫЙТИ</a>';
				if ($user->is_admin) echo '<a class="red-button purple-button-effect" style="float:left" href="/Admin/articleEditor.php">Создать статью</a>';
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