<?php
if (!has_mini_perm("writer", $_SESSION['connectedUser'])) {
	header("Location:index.php?page=dashboard");
}

$post = get_post();
if ($post == false) {
	header("Location:index.php?page=error");
} else {
	?>
	<div class="container">
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
			if ($title != $post->title || $content != $post->content || $posted != $post->public) {
				edit($title, $content, $posted, $_GET['id']);
			} else {
			?>
				<script>
					window.location.replace("index.php?page=guide&id=<?=$_GET['id']?>")
				</script>
			<?php
			}
			?>
				<script>
					window.location.replace("index.php?page=guide&id=<?=$_GET['id']?>")
				</script>
				<?php
			}
		}
		?>
		<form method="post">
			<div class="mb-3">
				<label for="title" class="form-label">Titre du guide</label>
				<input type="text" class="form-control" id="title" name="title" value="<?= $post->title ?>">
			</div>

			<div class="mb-3">
				<label for="wysibb" class="form-label">Contenu du guide</label>
				<textarea class="form-control" id="wysibb" name="content" rows="3"><?= $post->content ?></textarea>
			</div>

			<label class="form-label" for="public">Public</label>
			<div class="d-flex">
				<div class="me-2"><p>Non</p></div>
				<div class="form-check form-switch">
					<input class="form-check-input" type="checkbox" role="switch" id="public" name="public" <?php echo ($post->public == "1") ? "checked" : ""; ?> />
				</div>
				<div><p>Oui</p></div>
			</div>
			<div class="d-flex justify-content-end">
				<button type="submit" class="btn btn-primary" name="formGuides">Modiffier le guide</button>
			</div>
		</form>
	</div>
	<?php
}
?>