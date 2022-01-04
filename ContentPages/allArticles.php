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
	<link rel="stylesheet" type="text/css" href="../Styles/adaptive.css"/>
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
					if ($subjects == null) echo '<h1 class="light-gray main-heading unselectable">Здесь пока ничего нет...</h1>';
					else
					{
						foreach ($subjects as $subject)
						{
							$articles = R::find('articles', 'subject = ?', array($subject));
							echo '<a name="' . htmlspecialchars($subject) . '"><span class="dark-gray article-subject" style="width:100%;float:left"><i class="fas fa-check-circle"></i> ' . $subject . '</span></a>';
							foreach($articles as $article)
							{
								$owner = R::findOne('users', 'id = ?', array($article['owner_id']));

								echo '<article class="single-announcement shadow" style="width:91%;float:right">
									<a class="image-announcement scale-effect" href="/ContentPages/article.php?id=' . $article['id'] . '">
										<img src="' . $article['icon'] . '" title="' . htmlspecialchars($article['subject']) . ': ' . htmlspecialchars($article['title']) . '" alt="' . htmlspecialchars($article['subject']) . ': ' . htmlspecialchars($article['title']) . '"/>
									</a>
									<section class="content-announcement">
										<a class="title-announcement" href="/ContentPages/article.php?id=' . $article['id'] . '"><h2 class="dark-gray">' . htmlspecialchars($article['subject']) . ': ' . htmlspecialchars($article['title']) . '</h2></a><p class="dark-gray">' . htmlspecialchars($article['description']) . '</p>
										<div>
											<div class="author-date-wrap">
												<span class = "statistics-element"><a href="/UserPages/profile.php?id=' . $article->owner_id . '" title="Создатель статьи"><i class="fa fa-user" aria-hidden="true"></i> ' . htmlspecialchars(Data::get_userName($owner)) . '</a></span>
												<span class = "statistics-element"><i class="fa fa-pen-nib" aria-hidden="true"></i> ' . $article['date'] . '</span>
											</div>
											<div class="views-comments-wrap">
												<span class = "statistics-element"><i class="fa fa-eye" aria-hidden="true"></i> ' . number_format(intval($article['views']), 0, ' ', ' ') . '</span>
												<span class = "statistics-element"><i class="fa fa-comments" aria-hidden="true"></i> ' . $article['comments_count'] . '</span>
											</div>
										</div>
									</section>
									' . ((time() - strtotime($article['date'])) / 86400 > 7 ? '' : '<span class="frame-text">NEW</span>' ) . '
								</article>';
							}
						}
					}
				 ?>
			</div>
			<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/topArticles.php'); ?>
		</div>
	</div>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/footer.php'); ?>
</body>
</html>