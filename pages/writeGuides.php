<?php /** @noinspection DuplicatedCode */
if (!has_mini_perm("writer", $_SESSION['connectedUser'])) {
	header("Location:index.php?page=dashboard");
}
?>
<h2>Poster un guide</h2>
<?php
if (isset($_POST['formGuides'])) {
	$title = htmlspecialchars(trim($_POST['title']));
	$content = $_POST['content'];
	$posted = isset($_POST['public']) ? "1" : "0";
	
	$errors = [];
	
	$errors = [];
	if (empty($title) || empty($content)) {
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
	} else {
		postGuides($title, $content, $posted);
		$id = $dbWeb->lastInsertId();
		header("Location:index.php?page=guide&id=" . $id);
	}
}
?>
<div class="container">
	<form method="post" enctype="multipart/form-data">
		<div class="mb-3">
			<label for="title" class="form-label">Titre de l'article</label>
			<input type="text" class="form-control" id="title" name="title">
		</div>

		<div class="mb-3">
			<label for="wysibb" class="form-label">Contenu de l'article</label>
			<textarea class="form-control" id="wysibb" name="content" rows="3"></textarea>
		</div>

		<label class="form-label" for="public">Public</label>
		<div class="d-flex">
			<div class="me-2"><p>Non</p></div>
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" role="switch" id="public" name="public">
			</div>
			<div><p>Oui</p></div>
		</div>
		<div class="d-flex justify-content-end">
			<button type="submit" class="btn btn-primary" name="formGuides">Publier le guide</button>
		</div>
	</form>
</div>