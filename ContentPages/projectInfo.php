<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="WebCode - информация о проекте."/>
	<meta name="author" content="Ruslan Lyaschenko"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="../Styles/defaultStyle.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/x-icon" href="../Logo/icon.ico"/>
	<script src="https://kit.fontawesome.com/28c4ac0753.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../Styles/adaptive.css"/>
	<title>WebCode | О проекте/Контакты</title>
</head>
<body>

	<?php
		require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataBase.php');
		require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/header.php');
	?>

	<div id="caption">
		<span>Информация</span>
	</div>

	<div id="global-container">
		<div id="inline-global-container">
			<div id="content-wrapper">
				<h1>О проекте/Контакты</h1>
				<p class="logo" style="text-align: center; max-width:450px;"><img src="/Logo/icon.png" title="WebCode" alt="WebCode" style="width:100%"/></p>
				<p><strong><a class="light-red underline-effect" href="../index.php">WebCode.com</a></strong> — это онлайн-ресурс о web-программировании для начинающих и более продвинутых пользователей.</p>
				<p class="info-text"><i class="fas fa-rocket fa-lg light-red"></i> Запущен в 2021 году.</p>
				<p class="info-text"><i class="fab fa-earlybirds fa-lg light-red"></i> Цель: Сделать ресурс, на котором человек, изучая уроки, с нуля сможет создать web-сайт.</p>
				<p class="info-text"><i class="fas fa-laptop-code fa-lg light-red"></i> Тематика: Программирование/ИТ.</p>
				<h2>Социальные сети</h2>
				<p class="info-text"><i class="fab fa-vk fa-lg light-red"></i> <a class="light-red underline-effect" href="mailto:ruslan.itpro@gmail.com" target="_blank">Vk</p>
				<p class="info-text"><i class="fab fa-facebook fa-lg light-red"></i> <a class="light-red underline-effect" href="mailto:ruslan.itpro@gmail.com" target="_blank">Facebook</a></p>
				<p class="info-text"><i class="fab fa-youtube fa-lg light-red"></i> <a class="light-red underline-effect" href="mailto:ruslan.itpro@gmail.com" target="_blank">YouTube</a></p>
				<p class="info-text"><i class="fab fa-twitter fa-lg light-red"></i> <a class="light-red underline-effect" href="mailto:ruslan.itpro@gmail.com" target="_blank">Twitter</a></p>
				<p class="info-text"><i class="fab fa-instagram fa-lg light-red"></i> <a class="light-red underline-effect" href="mailto:ruslan.itpro@gmail.com" target="_blank">Instagram</a></p>
				<h2>Администрация</h2>
				<p class="info-text"><i class="far fa-envelope fa-lg light-red"></i> <a class="light-red underline-effect" href="mailto:ruslan.itpro@gmail.com" target="_blank">ruslan.itpro@gmail.com</a></p>
				<p class="info-text"><i class="fab fa-vk fa-lg fa-lg light-red"></i> <a class="light-red underline-effect" href="https://vk.com/ruslan.itpro" target="_blank">Руслан Лященко</a></p>
			</div>
			<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/topArticles.php'); ?>
		</div>
	</div>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/footer.php'); ?>
</body>
</html>