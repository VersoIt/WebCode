<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataBase.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataSendler.php');

	echo '<footer class="wrapper dark-top-border">
		<div class="container">
			<div class="logo-wrap">
				<a href="/index.php">
					<img src="/Logo/name.png" title="WebCode" alt="WebCode"/>
				</a>
				© Copyright <script>document.write(new Date().getFullYear())</script>
			</div>
			<div class="footer-content-container">
				<p class="heading-footer">Информация</p>
				<a class="light-gray underline-effect" href="/ContentPages/projectInfo.php"><p>О проекте/Контакты</p></a>
				<a class="light-gray underline-effect" href="/ContentPages/allArticles.php"><p>Все статьи</p></a>
				<a class="light-gray underline-effect" href="mailto:ruslan.itpro@gmail.com"><p>ruslan.itpro@gmail.com</p></a>
			</div>
			<div class="footer-content-container">
				<p class="heading-footer">Аккаунт</p>';
	if (isset($_SESSION['logged_user']))
	{
		$user = R::findOne('users', 'id = ?', array($_SESSION['logged_user']));
		echo '<a class="light-gray underline-effect" href="/UserPages/profile.php?id=' . $logged_user->id . '"><p>' . htmlspecialchars(Data::get_userName($user)) . '</p></a>';
		echo '<a class="light-gray underline-effect" href="/ServerUtils/logOut.php"><p>Выйти</p></a>';
	}
	else
	{
		echo '<a class="light-gray underline-effect" href="/UserPages/logIn.php"><p>Войти</p></a>
		<a class="light-gray underline-effect" href="/UserPages/signUp.php"><p>Регистрация</p></a>';
	}

	echo '</div>
		</div>
		<div class="social-links">
			<a href="https://vk.com/ruslan.itpro" target="_blank" title="VK"><i class="fab fa-vk social-button"></i></a>
			<a href="#" target="_blank" title="Facebook"><i class="fab fa-facebook social-button"></i></a>
			<a href="#" target="_blank" title="YouTube"><i class="fab fa-youtube social-button"></i></a>
			<a href="#" target="_blank" title="Twitter"><i class="fab fa-twitter social-button"></i></a>
			<a href="#" target="_blank" title="Instagram"><i class="fab fa-instagram social-button"></i></a>
		</div>
	</footer>';
?>