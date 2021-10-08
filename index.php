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
				<?php 
					$articles = R::findAll('articles');
					$not_exists = true;

					if ($articles == null) echo '<h1 class="light-gray main-heading unselectable">Здесь пока ничего нет...</h1>';
					else
					{
						foreach($articles as $article)
						{
							$owner = R::findOne('users', 'id = ?', array($article['owner_id']));
							if ((time() - strtotime($article['date'])) / 86400 < 7)
							{
								$not_exists = false;
								echo '<article class="single-announcement shadow">
								<a class="image-announcement scale-effect" href="/ContentPages/article.php?id=' . $article['id'] . '">
									<img src="' . $article['icon'] . '" title="' . $article['subject'] . ': ' . $article['title'] . '" alt="' . $article['subject'] . ': ' . $article['title'] . '"/>
								</a>
								<section class="content-announcement">
									<a class="title-announcement" href="/ContentPages/article.php?id=' . $article['id'] . '"><h2 class="dark-gray">' . $article['subject'] . ': ' . $article['title'] . '</h2></a><p class="dark-gray">' . $article['description'] . '</p>
									<div class="author-date-wrap">
										<span class = "statistics-element"><a href="/UserPages/profile.php?id=' . $article['owner_id'] . '"><i class="fa fa-user" aria-hidden="true"></i> ' . Data::get_userName($owner) . '</a></span>
										<span class = "statistics-element"><i class="fa fa-pen-nib" aria-hidden="true"></i> ' . $article['date'] . '</span>
									</div>
									<div class="views-comments-wrap">
										<span class = "statistics-element"><i class="fa fa-eye" aria-hidden="true"></i> ' . number_format(intval($article['views']), 0, ' ', ' ') . '</span>
										<span class = "statistics-element"><i class="fa fa-comments" aria-hidden="true"></i> ' . $article['comments_count'] . '</span>
									</div>
								</section>
							</article>';
							}
						}
					}
					if ($not_exists && $articles) echo '<h1 class="light-gray main-heading unselectable">Новых статей пока нет...</h1>';
				 ?>
			</div>
			<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/topArticles.php'); ?>
		</div>
	</div>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/footer.php'); ?>
</body>
</html>