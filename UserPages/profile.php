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
	<title>WebCode | <?php echo Data::get_userName($user); ?> </title>
</head>
<body>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/header.php'); ?>
	<div id="caption">
		<span>Профиль -> <span style="color:#E06149; "><?php echo Data::get_userName($user); ?></span></span>
	</div>
	<div id="global-container">
		<div id="middle-wrapper">
			<div id="user-info">
				<div id="user-name">
					<span class="heading-title user-name"><span class="dark-gray">
						<?php 
							if($user['id'] == $_SESSION['logged_user']->id) echo 'Ваш логин: ';
							else echo 'Логин: '; ?>
							</span><span class="light-red">
						<?php echo Data::get_userName($user); ?>
						</span></span>
				</div>
				<div class="user-components">
					<div id="avatar">
						<img src="/Logo/icon.png" title="<?php echo Data::get_userName($user); ?>" alt="<?php echo Data::get_userName($user) ?>"/>
					</div>
					<?php if($user): ?>
					<div id="statistics">
						<p>Рейтинг: (В разработке)</p>
						<p>Всего комментариев: <?php echo sizeof($comments) ?> </p>
						<p>Был(а) в сети <?php echo gmdate("d M Y г. в h:i", strtotime($user->last_online)); ?></p>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php if (!$user) echo '<p class="light-red">Такой профиль больше не существует.</p>'; ?>
		</div>
	</div>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/footer.php'); ?>
</body>
</html>