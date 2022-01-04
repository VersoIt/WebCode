<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataBase.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataSendler.php');
	
	$user = R::findOne('users', 'id = ?', array($_GET['id']));
	$comments = R::findAll('comments', 'owner_id = ?', array($user->id));
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="Профиль: <?php echo Data::get_userName($user); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="../Styles/defaultStyle.css"/>
	<link rel="stylesheet" type="text/css" href="../Styles/auth.css"/>
	<link rel="stylesheet" type="text/css" href="../Styles/profile.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com"/>
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
	<link rel="shortcut icon" type="image/x-icon" href="../Logo/icon.ico"/>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet"/>
	<script src="https://kit.fontawesome.com/28c4ac0753.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="/ClientScripts/imageLoader.js"></script>
	<link rel="stylesheet" type="text/css" href="../Styles/adaptive.css"/>
	<title>WebCode | <?php echo Data::get_userName($user); ?> </title>
</head>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/header.php'); ?>
	<div id="caption">
		<span>Профиль -> <span style="color:#E06149; "><?php echo Data::get_userName($user); ?></span></span>
	</div>
	<div id="global-container">
		<div id="middle-wrapper">
			<div id="profile">
				<div class="floating-head dark-gray unselectable">Профиль</div>
				<div id="user-name">
					<span>
						<span class="dark-gray">
							<?php 
								if(($user['id'] == $_SESSION['logged_user']) && ($user != null)) echo 'Ваш логин: ';
								else echo 'Логин: '; ?>
								</span><span class="light-red text-overflow" style="max-width: 800px;width:100%;">
							<?php echo Data::get_userName($user); ?>
						</span>
					</span>
				</div>
				<div class="user-components">
					<div id="avatar">
						<img src="<?php echo Data::get_userIcon($user); ?>" title="<?php echo Data::get_userName($user); ?>" alt="<?php echo Data::get_userName($user) ?>"/>
					</div>
					<?php if(($user['id'] == $_SESSION['logged_user']) && ($user['id'] != null)): ?>
						<form class="auth-container" style="width:100%" action="<?php echo '/ServerUtils/avatarSendler.php'; ?>" method="POST" enctype="multipart/form-data">
							<label for="file-upload" id="bntUpload" class="red-button purple-button-effect pointer"><i class="fa fa-cloud-upload"></i> Загрузить аватар</label>
							<input id="input_file" type="file" accept="image/x-png,image/gif,image/jpeg" name="icon" onchange="this.form.submit();"/>
							<span id="selected_filename" class="light-gray unselectable">Выберите файл</span>
						</form>
					<?php endif; ?>
					<?php if($user): ?>
					<?php if ($user->is_admin) echo '<span class="moderator">Модератор</span>'; ?>
					<div id="statistics">
						<p>Рейтинг: (В разработке)</p>
						<p>Всего комментариев: <?php echo sizeof($comments) ?> </p>
						<p>Был(а) в сети <?php echo gmdate("d M Y г. в H:i", strtotime($user->last_online) + 10800); ?></p>
					</div>
					<?php endif; ?>
				</div>
				<div class="circle" style="bottom: -260px;left: -140px;"></div>
				<div class="circle" style="top: -260px;right: -140px;"></div>
			</div>
			<?php if (!$user) echo '<p class="light-red">Такой профиль не существует.</p>'; ?>
		</div>
	</div>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/footer.php'); ?>
</body>
</html>