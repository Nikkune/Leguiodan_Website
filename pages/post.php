<?php
$post = get_post();
if ($post == false) {
	header("Location:index.php?page=error");
} else {
	?>
	<div class="row">
		<div id="parallax">
			<img src="../uploads/images/news_images/<?= $post->image ?>" class="visually-hidden" alt="<?= $post->title ?>" />
		</div>
	</div>
	<div class="container">
		<h2><?= $post->title ?></h2>
		<h6>Par <?=$post->name?> Le <?=date_fr(strtotime($post->date)) . " à " . date("H:i",strtotime($post->date));?></h6>
		<p><?=nl2br($post->content)?></p>
	</div>
	<?php
}
?>