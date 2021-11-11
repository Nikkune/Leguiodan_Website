<?php
if (!has_mini_perm("writer", $_SESSION['connectedUser'])) {
	header("Location:index.php?page=dashboard");
}
?>
<h2>Poster un article</h2>
<?php
if (isset($_POST['formNews'])) {
	$title = htmlspecialchars(trim($_POST['title']));
	$content = htmlspecialchars(trim($_POST['content']));
	$posted = isset($_POST['public']) ? "1" : "0";
	
	$errors = [];
	
	$errors = [];
	if (empty($title) || empty($content)) {
		$errors['empty'] = $messages['empty'];
	}
	
	if (!empty($_FILES['file']['name'])) {
		$file = $_FILES['file']['name'];
		$extensions = ['.png', '.jpg', '.jpeg', '.gif', '.PNG', '.JPG', '.JPEG', '.GIF'];
		$extension = strrchr($file, '.');
		if (!in_array($extension, $extensions)) {
			$errors['image'] = "Cette Image n'est pas valable !!";
		}
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
		post($title, $content, $posted);
		if (!empty($_FILES['file']['name'])) {
			post_img($_FILES['file']['tmp_name'], $extension);
		} else {
			$id = $dbWeb->lastInsertId();
			header("Location:index.php?page=post&id=" . $id);
		}
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
			<label for="content" class="form-label">Contenu de l'article</label>
			<textarea class="form-control" id="content" name="content" rows="3"></textarea>
		</div>

		<div class="mb-3">
			<label for="file" class="form-label">Image de l'article</label>
			<input class="form-control" type="file" id="file" name="file">
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
			<button type="submit" class="btn btn-primary" name="formNews">Publier l'article</button>
		</div>
	</form>
</div>