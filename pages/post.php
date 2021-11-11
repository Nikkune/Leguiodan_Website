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
	<h6>Par <?= $post->name ?> Le <?= date_fr(strtotime($post->date)) . " à " . date("H:i", strtotime($post->date)); ?></h6>
	<p><?= nl2br($post->content) ?></p>
	<?php
	}
	?>

	<hr />
	<h4>Commentaires:</h4>
	<?php
	$responses = get_comments();
	if ($responses != false) {
		foreach ($responses as $response) {
			?>
			<figure>
				<blockquote class="blockquote">
					<p><?= nl2br($response->comment) ?></p>
				</blockquote>
				<figcaption class="blockquote-footer">
					<?= date("H:i", strtotime($response->date)) ?> par
					<cite title="<?= $response->name ?>"><?= $response->name ?></cite>
				</figcaption>
			</figure>
			<?php
		}
	} else echo "Aucun commentaire n'a été publié... Soyez le premier !"
	?>
	<h4>Commenter:</h4>
	<?php
	if (isset($_POST['formComments'])) {
		$comment = htmlspecialchars(trim($_POST['comments']));
		$errors = [];
		if (empty($comment)) {
			$errors['empty'] = $messages['empty'];
		}
		
		if (!empty($errors)) {
		foreach ($errors as $error) {
			?>
			<div class="alert alert-danger" role="alert">
				<?= $error ?>
			</div>
		<?php
		}
		}else{
		comment("Nikkune", $comment);
		?>
			<script>
				window.location.replace("index.php?page=post&id=<?= htmlspecialchars($_GET['id'])?>")
			</script>
			<?php
		}
	}
	?>

	<form method="post">
		<div class="mb-3">
			<label for="comments" class="form-label">Commentaire</label>
			<textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
		</div>
		<button type="submit" name="formComments" class="btn btn-primary">Poster le commentaire</button>
	</form>

</div>