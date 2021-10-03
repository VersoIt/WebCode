<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="WebCode - Научитесь создавать динамичные сайты с нуля!"/>
	<meta name="keywords" content="Программирование учить, Как создать сайт, Php, html, javascript, css"/>
	<meta name="author" content="Ruslan Lyaschenko"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="Styles/defaultStyle.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="Logo/icon.ico"/>
	<script src="https://kit.fontawesome.com/28c4ac0753.js" crossorigin="anonymous"></script>
	<title>WebCode | Создание сайтов для начинающих</title>
</head>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/header.php'); ?>
	<div id="caption">
		<span>Свежие статьи</span>
	</div>
	<div id="global-container">
		<div id="inline-global-container">
			<div id="content-wrapper">
				<article class="single-announcement shadow">
					<a class="image-announcement scale-effect" href="#">
						<img src="Images/Articles/articleTitleImage.jpg" title="Название статьи" alt="Название статьи"/>
					</a>
					<section class="content-announcement">
						<a class="title-announcement" href=""><h2>Название статьи</h2></a>
						<p>Описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание</p>
						<div class="statistics-announcement">
							<div class="author-date-wrap">
								<span class = "statistics-element"><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Руслан Лященко</a></span>
								<span class = "statistics-element"><i class="fa fa-pen-nib" aria-hidden="true"></i> 9 мая 2021 г.</span>
							</div>
							<div class="views-comments-wrap">
								<span class = "statistics-element"><i class="fa fa-eye" aria-hidden="true"></i> 0</span>
								<span class = "statistics-element"><i class="fa fa-comments" aria-hidden="true"></i> 0</span>
							</div>
						</div>
					</section>
					<span class="frame-text">NEW</span>
				</article>
				<article class="single-announcement shadow">
					<a class="image-announcement scale-effect" href="#">
						<img src="Images/Articles/articleTitleImage.jpg" title="Название статьи" alt="Название статьи"/>
					</a>
					<section class="content-announcement">
						<a class="title-announcement" href=""><h2>Название статьи</h2></a>
						<p>Описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание</p>
						<div class="statistics-announcement">
							<div class="author-date-wrap">
								<span class = "statistics-element"><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Руслан Лященко</a></span>
								<span class = "statistics-element"><i class="fa fa-pen-nib" aria-hidden="true"></i> 9 мая 2021 г.</span>
							</div>
							<div class="views-comments-wrap">
								<span class = "statistics-element"><i class="fa fa-eye" aria-hidden="true"></i> 0</span>
								<span class = "statistics-element"><i class="fa fa-comments" aria-hidden="true"></i> 0</span>
							</div>
						</div>
					</section>
					<span class="frame-text">NEW</span>
				</article>
				<article class="single-announcement shadow">
					<a class="image-announcement scale-effect" href="#">
						<img src="Images/Articles/articleTitleImage.jpg" title="Название статьи" alt="Название статьи"/>
					</a>
					<section class="content-announcement">
						<a class="title-announcement" href=""><h2>Название статьи</h2></a>
						<p>Описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание статьи описание</p>
						<div class="statistics-announcement">
							<div class="author-date-wrap">
								<span class = "statistics-element"><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Руслан Лященко</a></span>
								<span class = "statistics-element"><i class="fa fa-pen-nib" aria-hidden="true"></i> 9 мая 2021 г.</span>
							</div>
							<div class="views-comments-wrap">
								<span class = "statistics-element"><i class="fa fa-eye" aria-hidden="true"></i> 0</span>
								<span class = "statistics-element"><i class="fa fa-comments" aria-hidden="true"></i> 0</span>
							</div>
						</div>
					</section>
					<span class="frame-text">NEW</span>
				</article>
			</div>
			<div id="sidebar-wrapper">
				<a class="out-button shadow purple-button-effect" href="https://vk.com/ruslan.itpro" target="_blank">Паблик <i class="fa fa-vk"></i></a>
				<div class="out-button shadow" href="#">Топ статьи <i class="fa fa-fire-alt"></i></div>
				<ul id="top-list">
					<li><a class="top-page" href="#"><i class="fa fa-fire-alt"></i> Введение в PHP <i class="fa fa-eye" aria-hidden="true"></i> 12</a></li>
					<li><a class="top-page" href="#"><i class="fa fa-fire-alt"></i> Введение в CSS <i class="fa fa-eye" aria-hidden="true"></i> 7</a></li>
					<li><a class="top-page" href="#"><i class="fa fa-fire-alt"></i> Ссылки в HTML <i class="fa fa-eye" aria-hidden="true"></i> 6</a></li>
				</ul>
			</div>
		</div>
	</div>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/footer.php'); ?>
</body>
</html>