<?php
	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/ServerUtils/dataBase.php');
	$articles = R::findAll('articles', 'ORDER BY views DESC');
	echo '<div id="sidebar-wrapper">
				<a class="out-button shadow purple-button-effect" href="https://vk.com/ruslan.itpro" target="_blank">Паблик <i class="fa fa-vk"></i></a>
				<div class="out-button shadow" href="#">Топ статьи <i class="fa fa-fire-alt"></i></div>';
	if ($articles)
	{
		echo '<ul id="top-list">';

		$articles = array_slice($articles, 0, 7);

		foreach($articles as $article)
		{
			if ($article['views'] > 0)
				echo '<li><a class="top-page" href="/ContentPages/article.php?id=' . $article['id'] . '"><i class="fa fa-fire-alt"></i> ' . $article['subject'] . ': ' . $article['title'] . ' <i class="fa fa-eye light-gray" aria-hidden="true"></i><span class="light-gray"> ' . number_format(intval($article['views']), 0, ' ', ' ') . '</span></a></li>';
		}
		echo'</ul>
			</div>';
	}
	else echo '<p class="light-gray">Популярных статей пока нет...</p></div>';
?>