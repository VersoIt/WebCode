<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Регистрация на сайте WebCode"/>
	<meta name="author" content="Ruslan Lyaschenko"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="../Styles/defaultStyle.css"/>
	<link rel="stylesheet" type="text/css" href="../Styles/auth.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com"/>
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
	<link rel="shortcut icon" type="image/x-icon" href="../Logo/icon.ico"/>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet"/>
	<script src="https://kit.fontawesome.com/28c4ac0753.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../Styles/adaptive.css"/>
	<title>WebCode | Кабинет пользователя</title>
</head>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/header.php'); ?>
	<div id="caption">
		<span>Авторизация на сайте</span>
	</div>
	<div id="global-container">
		<div id="middle-wrapper">
			<div class="auth-container">
				<form action="logIn.php" method="POST">

					<!-- Processing of registration form data -->
					<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/logInHandler.php'); ?>
					<?php if (isset($_SESSION['logged_user'])) header('Location: /'); ?>
					<?php if (isset($_SESSION['verify_code'])) header('Location: /UserPages/codeConfirmation.php'); ?>

					<h1>Авторизоваться</h1>
					<p>Чтобы войти на сайт, используйте ваш email и пароль, которые были указаны при регистрации на сайтe.</p>
					<input type="text" class="auth-input" autocomplete="username" name="login" placeholder="Логин или E-mail" value="<?php echo htmlspecialchars(@$data['login']);?>"  minlength="2" maxlength="16"/>
					<input type="password" class="auth-input" autocomplete="current-password" name="password" placeholder="Пароль" value="<?php echo @$data['password'];?>" minlength="8" required/>
					<?php
						if(empty($errors) && !empty($data)) echo '<p style="color:green">Вы успешно вошли в свой аккаунт!</p>';
						else echo '<p class="light-red">'.array_shift($errors).'</p>';
					?>
					<input type="submit" class="auth-button red-shadow purple-button-effect" name="logInUser" value="Войти"/>
					<a class="flying-button dark-gray underline-effect" href="/UserPages/passwordRecovery.php">Забыли пароль?</a>
				</form>
			</div>
		</div>
	</div>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/footer.php'); ?>
</body>
</html>