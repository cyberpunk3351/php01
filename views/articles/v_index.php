<h1>Articles</h1>
<div>
<? foreach($articles as $article): ?>
	<div>
		<strong><?=$article['title']?></strong>
		<em><?=$article['dt_add']?></em>
		<br>

		<a href="<?=BASE_URL?>article/<?=$article['id_articles']?>">Далее</a>
		<hr>
	</div>
<? endforeach; ?>
</div>