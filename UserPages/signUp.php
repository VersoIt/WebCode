<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Войти в свой кабинет пользователя"/>
	<meta name="author" content="Ruslan Lyaschenko"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="../Styles/defaultStyle.css"/>
	<link rel="stylesheet" type="text/css" href="../Styles/auth.css"/>
	<link rel="stylesheet" type="text/css" href="../Styles/adaptive.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com"/>
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
	<link rel="shortcut icon" type="image/x-icon" href="../Logo/icon.ico"/>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet"/>
	<script src="https://kit.fontawesome.com/28c4ac0753.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../Styles/adaptive.css"/>
	<title>WebCode | Регистрация на сайте</title>
</head>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/header.php'); ?>
	<div id="caption">
		<span>Регистрация на сайте</span>
	</div>
	<div id="global-container">
		<div id="middle-wrapper">
			<?php if (!isset($_SESSION['logged_user'])): ?>
			<div class="auth-container">

				<!-- Processing of registration form data -->
				<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/signUpHandler.php'); ?>

				<h1>Зарегистрироваться</h1>
				<p>Чтобы зарегистрироваться на сайте, используйте ваш E-mail, логин и пароль.</p>
				<form action="signUp.php" method="POST">
					<input type="text" class="auth-input" name="login" placeholder="Логин" value="<?php echo htmlspecialchars(@$data['login']); ?>" minlength="2" maxlength="16"/>
					<input type="email" class="auth-input" name="email" placeholder="E-mail" value="<?php echo htmlspecialchars(@$data['email']); ?>" minlength="4" maxlength="64"/>
					<input type="password" class="auth-input" name="password" placeholder="Пароль" value="<?php echo htmlspecialchars(@$data['password']); ?>" minlength="8"/>
					<input type="password" class="auth-input" name="repeat_password" placeholder="Повторите пароль" value="<?php echo htmlspecialchars(@$data['repeat_password']);?>" minlength="8" />
					<?php
						if(empty($errors) && !empty($data))
						{
							Data::sendUserData($data);
							echo '<p style="color:green">Вы успешно зарегистрировались!</p>';
						}
						else echo '<p class="light-red">' . array_shift($errors) . '</p>';
					?>
					<input type="submit" class="auth-button red-shadow purple-button-effect" name="signUp" value="Зарегистрироваться" />
				</form>
			</div>
		</div>
	<?php else: ?>
	<?php header('Location: /'); ?>
	<?php endif; ?>
	</div>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/footer.php'); ?>
</body>
</html>