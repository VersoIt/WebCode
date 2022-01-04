<?php	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataBase.php'); ?>
<?php if (!R::findOne('users', 'id = ?', array($_SESSION['logged_user']))->is_admin): ?>
<?php header('Location: /') ?>
<?php else: ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="WebCode - все статьи."/>
	<meta name="author" content="Ruslan Lyaschenko"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="../Styles/defaultStyle.css"/>
	<link rel="stylesheet" type="text/css" href="../Styles/auth.css"/>
	<link rel="stylesheet" type="text/css" href="../Styles/adaptive.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet"/>
	<link rel="shortcut icon" type="image/x-icon" href="../Logo/icon.ico"/>
	<script src="https://kit.fontawesome.com/28c4ac0753.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="/ClientScripts/imageLoader.js"></script>
	<title>WebCode | Редактор статей</title>
</head>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/header.php'); ?>
	<div id="global-container">
		<div id="inline-global-container">

			<!-- Processing of registration form data -->
			<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/articleGenerator.php'); ?>

			<div id="content-wrapper">
				<div class="auth-container" style="width:100%">
					<?php echo '<h1>Добро пожаловать в редактор статей, <a href="/UserPages/profile.php?id=' . $logged_user->id . '" class="light-red underline-effect">' . Data::get_userName($logged_user) . '</a>!</h1>'?>
					<form class="auth-container" style="width:100%" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
						<label class="light-red" for="title">Название статьи</label>
						<input type="text" class="auth-input" name="title" placeholder="Ваше название..." minlength="2" value="<?php echo @$data['title']; ?>" maxlength="28"/>
						<label for="file-upload" id="bntUpload" class="red-button purple-button-effect pointer"><i class="fa fa-cloud-upload"></i> Загрузить картинку (600x448)</label>
						<input id="input_file" type="file" accept="image/x-png,image/gif,image/jpeg" name="icon"/>
						<span id="selected_filename" class="light-gray unselectable">Файл не выбран</span>
						<label class="light-red" for="content">Текст статьи</label>
						<textarea id="article-content-input" placeholder="Ваш текст..." name="content" minlength="256" maxlength="65536"><?php echo @$data['content']; ?></textarea>
						<label class="light-red" for="description">Описание статьи</label>
						<textarea id="article-description-input" placeholder="Ваше описание..." name="description" minlength="16" maxlength="256"><?php echo @$data['description']; ?></textarea>
						<label class="light-red" for="title">Категория</label>
						<select class="auth-input" style="width:300px;" name="subject">
							<option value="HTML" selected>1. HTML</option>
							<option value="CSS">2. CSS</option>
							<option value="PHP">3. PHP</option>
							<option value="JS">4. JS</option>
						</select>
						<?php
							if (empty($errors) && !empty($data)) Data::sendArticleData($data); 
							else echo '<p class="light-red">' . array_shift($errors) . '</p>';
						?>
						<button type="submit" class="auth-button red-shadow purple-button-effect" name="accept">Опубликовать статью</button>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/footer.php'); ?>
</body>

<?php endif; ?>