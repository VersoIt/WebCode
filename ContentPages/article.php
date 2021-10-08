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
	<script src="../ClientScripts/contentHeading.js"></script>
</head>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/header.php'); ?>

	<?php
		if(isset($_POST['send_comment']))
		{

			require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataSendler.php');

			$data = $_POST;
			$data['owner_id'] = $_SESSION['logged_user']->id;
			$data['article_id'] = $article['id'];

			R::exec('UPDATE `articles` SET `comments_count` = `comments_count` + 1 WHERE `id` = ' . $article['id']);

			Data::sendCommentData($data);
			header('Location: ' . $_SERVER['PHP_SELF'] . '?id=' . $article['id']);
		}
	?>

	<div id="global-container">
		<?php if($article != null): ?>
		<div id="inline-global-container">
			<div id="content-wrapper">
				<?php
					echo '<h1>' . $article['title'] . '</h1>';
					$owner = R::findOne('users', 'id = ?', array($article->owner_id));
					echo '<div><span class = "statistics-element"><a href="http://localhost/UserPages/profile.php?id=' . $article->owner_id . '" class="light-gray" title="Автор статьи"><i class="fa fa-user" aria-hidden="true"></i> ' . Data::get_userName($owner) . '</a> |</span><span class = "statistics-element"><i class="fa fa-pen-nib" aria-hidden="true"></i> ' . $article['date'] . ' |</span><span class = "statistics-element"><i class="fa fa-eye" aria-hidden="true"></i> ' . number_format(intval($article['views'] + 1), 0, ' ', ' ') . ' |</span><span class = "statistics-element"><i class="fa fa-comments" aria-hidden="true"></i> ' . $article['comments_count'] . '</span>
						</div>';
				?>
				<div id="table-contents">
					<span id="title">Оглавление: </span>
					<ol id="content-list">

					</ol>
				</div>
				<?php echo '<div id="content">' . $article['content'] . '</div>'; ?>
				<form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $article['id'];?>" class="comment-input-container" method="POST">
					<div class="avatar main-image">
						<img src="/Images/Articles/unknown.jpg" title="" alt=""/>
					</div>
					<div id="comment-input-wrapper">
						<div style="position: relative; display: inline-block; width:80%;" >
							<input type="text" id="comment-input" placeholder="Оставьте комментарий" name="content" autocomplete="off" />
							<span class="focus-border"></span>
						</div>
						<div id="input-field">
							<input type="submit" id="send-comment-button" class="red-button purple-button-effect" value="ОТПРАВИТЬ" name="send_comment" style="background-color: #8e8e8e;" disabled/>
						</div>
					</div>
				</form>
				<div id="comments">

					<?php 
						$comments = R::find('comments', 'article_id = ?', array($article->id));
						$comments = array_reverse($comments);
						$count = 1;

						if(empty($comments)) echo '<p class="light-gray main-heading unselectable">Будьте первым, кто оставит здесь комментарий.</p>';
						else
						{		
							foreach($comments as $comment)
							{
								$owner = R::findOne('users', 'id = ?', array($comment['owner_id']));
								echo '<div class="comment">
										<div class="avatar comment-image">
											<img src="/Images/Articles/unknown.jpg" alt="' . $owner->login . '" title="' . $owner->login . '"/>
										</div>
										<span class="trigger"><i class="fas fa-angle-double-down"></i></span>
										<a href="/UserPages/profile.php?id=' . $article['owner_id'] . '" class="owner underline-effect">' . $owner->login . '</a>
										<span class="light-gray">' . $comment['date'] . '</span>
										<p class="comment-content">' . $comment['content'] . '</p>
										<span class="comment-count light-gray">#' . $count . '</span>
						    			</div>';
						    	++$count;
							}
						}
					?>

				</div>
			</div>
			<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/topArticles.php'); ?>
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
<script src="../ClientScripts/commentSendler.js"></script>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/footer.php'); ?>
</body>