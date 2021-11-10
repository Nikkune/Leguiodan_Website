<h2>Home</h2>
<div class="row row-cols-2">
	<?php
	$news_posts = get_news_post();
	foreach ($news_posts as $news_post) {
		?>
		<div class="col">
			<div class="card" style="height: 750px">
				<img src="../uploads/images/news_images/<?=$news_post->image?>" class="card-img-top" alt="">
				<div class="card-body">
					<h5 class="card-title"><?=$news_post->title?></h5>
					<h6 class="card-subtitle mb-2 text-muted">Le <?=date_fr(strtotime($news_post->date)) . " à " . date("H:i",strtotime($news_post->date));?> par <?=$news_post->name?></h6>
					<p class="card-text"><?=substr(nl2br($news_post->content),0,300) . " ..."?></p>
				</div>
				<div class="card-footer">
					<a href="#" class="btn btn-primary">Voir l'article complet</a>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>

