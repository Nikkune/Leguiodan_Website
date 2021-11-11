<?php
if (!has_mini_perm("writer", $_SESSION['connectedUser'])) {
	header("Location:index.php?page=dashboard");
}
?>
<h2>Listing des guides</h2>
<hr />
<div class="container">
	<?php
	$guides_posts = get_guides_post();
	foreach ($guides_posts as $guide_post) {
		?>
		<div class="card text-center mb-3">
			<div class="card-header">
				<?= $guide_post->title ?><?php if (!$guide_post->public) {
					echo '<i class="bi bi-lock-fill"></i>';
				} ?>
			</div>
			<div class="card-body">
				<!--suppress HtmlUnknownTarget -->
				<a href="index.php?page=guide&id=<?= $guide_post->id ?>" class="btn btn-primary">Lire le guide</a>
			</div>
			<div class="card-footer text-muted">
				<?= 'Le ' . date_fr(strtotime($guide_post->date)) . ' Par ' . get_role_icon($guide_post->role) . $guide_post->name ?>
			</div>
		</div>
		<?php
	}
	?>
</div>