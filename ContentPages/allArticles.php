<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataSendler.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="WebCode - все статьи."/>
	<meta name="author" content="Ruslan Lyaschenko"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="../Styles/defaultStyle.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/x-icon" href="../Logo/icon.ico"/>
	<script src="https://kit.fontawesome.com/28c4ac0753.js" crossorigin="anonymous"></script>
	<title>WebCode | Все статьи</title>
</head>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/header.php'); ?>
	<div id="caption">
		<span>Все статьи</span>
	</div>
	<div id="global-container">
		<div id="inline-global-container">
			<div id="content-wrapper">
				<?php 
					$articles = R::findAll('articles');
					if ($articles == null) echo '<h1 class="light-gray main-heading">Здесь пока ничего нет...</h1>';
					else
					{
						foreach($articles as $article)
						{
							$owner_name = R::findOne('users', 'id = ?', array($article['owner_id']))->login;
							$owner_name = $owner_name == null ? 'UNKNOWN' : $owner_name;

							echo '<article class="single-announcement shadow">
								<a class="image-announcement scale-effect" href="/ContentPages/article.php?id=' . $article['id'] . '">
									<img src="' . $article['icon'] . '" title="Название статьи" alt="Название статьи"/>
								</a>
								<section class="content-announcement">
									<a class="title-announcement" href="/ContentPages/article.php?id=' . $article['id'] . '"><h2>' . $article['subject'] . ': ' . $article['title'] . '</h2></a><p>' . $article['description'] . '</p>
									<div class="author-date-wrap">
										<span class = "statistics-element"><a href="#"><i class="fa fa-user" aria-hidden="true"></i> ' . $owner_name . '</a></span>
										<span class = "statistics-element"><i class="fa fa-pen-nib" aria-hidden="true"></i> ' . $article['date'] . '</span>
									</div>
									<div class="views-comments-wrap">
										<span class = "statistics-element"><i class="fa fa-eye" aria-hidden="true"></i> ' . $article['views'] . '</span>
										<span class = "statistics-element"><i class="fa fa-comments" aria-hidden="true"></i> ' . $article['comments'] . '</span>
									</div>
								</section>
								<span class="frame-text">NEW</span>
							</article>';
						}
					}
				 ?>
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