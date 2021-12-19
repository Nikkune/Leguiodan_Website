<h2>Home</h2>
<div class="row row-cols-2">
	<?php
	$news_posts = get_news_post();
	foreach ($news_posts as $news_post) {
		?>
		<div class="col">
			<div class="card" style="height: 750px">
				<img src="../uploads/images/news_images/<?= $news_post->image ?>" class="card-img-top" alt="">
				<div class="card-body">
					<h5 class="card-title"><?= $news_post->title ?></h5>
					<h6 class="card-subtitle mb-2 text-muted">Le <?= date_fr(strtotime($news_post->date)) . " à " . date("H:i", strtotime($news_post->date)); ?> par <?= $news_post->name ?></h6>
					<p class="card-text"><?= substr(nl2br($news_post->content), 0, 300) . " ..." ?></p>
				</div>
				<div class="card-footer">
					<!--suppress HtmlUnknownTarget -->
					<a href="index.php?page=post&id=<?= $news_post->id ?>" class="btn btn-primary">Voir l'article complet</a>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>
<?php
if (isset($_GET['msg'])) {
	if ($_GET['msg'] == "registerOK"){
		?>
		<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
			<div id="registerToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="d-flex">
					<div class="toast-body">
						Création réussie ! Veuillez confirmer votre adresse mail pour vous connecter.
					</div>
					<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
			</div>
		</div>
		<?php
	}else if ($_GET['msg'] == "confirmOK"){
		?>
		<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
			<div id="confirmToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="d-flex">
					<div class="toast-body">
						Votre adresse mail a bien été confirmée.
					</div>
					<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
			</div>
		</div>
		<?php
	}
}
?>

