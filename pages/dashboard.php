<?php
if (is_writer($_SESSION['connectedUser'])){
	header("Location:index.php?page=newsList");
}
?>
<h2>Dashboard</h2>
<div class="row row-cols-3">
	<?php
	$tables = [
		"Administrateurs" => "members",
		"Modérateurs" => "members",
		"Rédacteurs" => "members",
		"News" => "news_post",
		"Commentaires" => "news_comments"
	];
	
	$colors = [
		"news_post" => "primary",
		"news_comments" => "success",
		"members" => "info"
	];
	
	foreach ($tables as $table_name => $table) {
		?>
		<div class="col">
			<div class="card text-white bg-<?= getColor($table, $colors) ?> mb-3">
				<div class="card-header"><h5><?= $table_name ?></h5></div>
				<div class="card-body">
					<?php $nbrInTable = inTable($table_name, $table) ?>
					<h4 class="card-title"><?= $nbrInTable[0] ?></h4>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>

<h2>Commentaires non lus</h2>
<?php
$comments = get_comments();
?>
<table class="table">
	<thead>
	<tr>
		<th scope="col">Article</th>
		<th scope="col">Commentaire</th>
		<th scope="col">Actions</th>
	</tr>
	</thead>
	<tbody>
	<?php
	if (!empty($comments)) {
		foreach ($comments as $comment) {
			?>
			<tr id="commentaire_<?= $comment->id ?>">
				<td><?= $comment->title ?></td>
				<td><?= substr(nl2br($comment->comment), 0, 100) ?>...</td>
				<td>
					<a href="#" id="<?= $comment->id ?>" class="btn btn-success shadow rounded rounded-circle see_comment"><i class="bi bi-check-lg text-light"></i></a>
					<a href="#" id="<?= $comment->id ?>" class="btn btn-danger shadow rounded rounded-circle delete_comment"><i class="bi bi-trash-fill text-light"></i></a>
					<button type="button" class="btn btn-primary shadow rounded rounded-circle" data-bs-toggle="modal" data-bs-target="#comment_<?= $comment->id ?>">
						<i class="bi bi-three-dots-vertical"></i></button>
					<div class="modal fade" id="comment_<?= $comment->id ?>" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="modalTitle"><?= $comment->title ?></h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<p>Commentaire posté par
										<strong><?= $comment->name ?></strong>(<?= $comment->email ?>)<br />Le <?= date("d/m/Y à H:i", strtotime($comment->date)) ?>
									</p>
									<hr />
									<p><?= nl2br($comment->comment) ?></p>
								</div>
								<div class="modal-footer">
									<a href="#" id="<?= $comment->id ?>" class="btn btn-success shadow rounded rounded-circle see_comment" data-bs-dismiss="modal"><i class="bi bi-check-lg text-light"></i></a>
									<a href="#" id="<?= $comment->id ?>" class="btn btn-danger shadow rounded rounded-circle delete_comment" data-bs-dismiss="modal"><i class="bi bi-trash-fill text-light"></i></a>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>
			<?php
		}
	}else{
		?>
		<tr>
			<td></td>
			<td><center>Auccun commentaire à valider</center></td>
			<td></td>
		</tr>
	<?php
	}
	?>
	</tbody>
</table>