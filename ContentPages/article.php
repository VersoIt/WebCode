<?php
	$data = $_GET;
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataBase.php');
	$article = R::findOne('articles', 'id = ?', array($data['id']));
	if ($article != null) R::exec('UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = ' . $data[id]);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="WebCode - <?php echo $article != null ? $article['subject'] . ': ' . $article['title'] : 'Страница не найдена!' ?>"/>
	<meta name="author" content="Ruslan Lyaschenko"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="../Styles/defaultStyle.css"/>
	<link rel="stylesheet" type="text/css" href="../Styles/auth.css"/>
	<link rel="stylesheet" type="text/css" href="../Styles/error.css"/>
	<link rel="stylesheet" type="text/css" href="../Styles/article.css"/>
	<link rel="stylesheet" type="text/css" href="../Styles/comment.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/x-icon" href="../Logo/icon.ico"/>
	<script src="https://kit.fontawesome.com/28c4ac0753.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<title>WebCode | <?php echo $article != null ? $article['subject'] . ': ' . $article['title'] : 'Страница не найдена!'?></title>
	<script src="../clientScripts/contentHeading.js"></script>
</head>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/header.php'); ?>

	<div id="global-container">
		<?php if($article != null): ?>
		<div id="inline-global-container">
			<div id="content-wrapper">
				<?php
					echo '<h1>' . $article['title'] . '</h1>';
					$owner_name = R::findOne('users', 'id = ?', array($article->owner_id))->login;
					echo '<div><span class = "statistics-element"><a href="#" class="light-gray" title="Автор статьи"><i class="fa fa-user" aria-hidden="true"></i> ' . $owner_name . '</a> |</span><span class = "statistics-element"><i class="fa fa-pen-nib" aria-hidden="true"></i> ' . $article['date'] . ' |</span><span class = "statistics-element"><i class="fa fa-eye" aria-hidden="true"></i> ' . $article['views'] . ' |</span><span class = "statistics-element"><i class="fa fa-comments" aria-hidden="true"></i> ' . $article['comments'] . '</span>
						</div>';
				?>
				<div id="table-contents">
					<span id="title">Оглавление: </span>
					<ol id="content-list">

					</ol>
				</div>
				<?php echo '<div id="content">' . $article['content'] . '</div>'; ?>
				<input type="text" id="comment-input" placeholder="Оставьте комментарий" />
				<div></div>
				<div id="comments">
					<div class="comment">
						<img src="/Images/Articles/unknown.jpg" alt="" title=""/>
						<span class="trigger"><i class="fas fa-angle-double-down"></i></span>
						<bdi class="owner underline-effect">Руслан</bdi>
						<span class="light-gray">07 apr 2021 12:21:32</span>
						<p class="comment-content">Мой комментарийМой комментарийМой коммМой комментарийМой комментарийМой комментарийМой комментарийМой комментарийМой комментарийМой комментарийМой комментарийМой комментарийМ</p>
						<span class="comment-count light-gray">#1</span>
					</div>
					<div class="comment">
						<img src="/Images/Articles/unknown.jpg" alt="" title=""/>
						<span class="trigger"><i class="fas fa-angle-double-down"></i></span>
						<bdi class="owner underline-effect">Руслан</bdi>
						<span class="light-gray">07 apr 2021 12:21:32</span>
						<p class="comment-content">Мой комментарийМой комментарийМой коммМой комментарийМой комментарийМой комментарийМой комментарийМой комментарийМой комментарийМой комментарийМой комментарийМой комментарийМ</p>
						<span class="comment-count light-gray">#1</span>
					</div>
					<div class="comment">
						<img src="/Images/Articles/unknown.jpg" alt="" title=""/>
						<span class="trigger"><i class="fas fa-angle-double-down"></i></span>
						<bdi class="owner underline-effect">Руслан</bdi>
						<span class="light-gray">07 apr 2021 12:21:32</span>
						<p class="comment-content">Мой комментарийМой комментарийМой коммМой комментарийМой комментарийМой комментарийМой комментарийМой комментарийМой комментарийМой комментарийМой комментарийМой комментарийМ</p>
						<span class="comment-count light-gray">#1</span>
					</div>
				</div>
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
<?php else: ?>
		<div id="error-container">
			<div id="error-wrapper">
				<div>
					<img src="/Images/notFound.jpg" title="Страница не найдена!" alt="Страница не найдена!"/>
				</div>
				<span id="error-id" class="light-red">Ошибка 404</span>
				<p id="error-description">Кажется, что-то пошло не так! Страница, которую вы запрашиваете, не существует. Возможно она устарела, была удалена, или был введён неверный адрес в адресной строке.</p>
			</div>
		</div>
<?php endif ?>
	</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/footer.php'); ?>
</body>