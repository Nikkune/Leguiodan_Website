<?php
if (isset($_POST['formNews'])) {
	$pseudo = htmlspecialchars(trim($_POST['pseudo']));
	$email = htmlspecialchars(trim($_POST['email']));
	$email_again = htmlspecialchars(trim($_POST['email_again']));
	$token = token(30);
	$password = htmlspecialchars(trim($_POST['password']));
	$password_again = htmlspecialchars(trim($_POST['password_again']));
	
	
	$errors = [];
	
	if (empty($pseudo) || empty($email) || empty($email_again) || empty($password) || empty($password_again)) {
		$errors['empty'] = "Veuillez remplier tous les champs";
	}
	
	if ($email != $email_again) {
		$errors['differentEmail'] = "Les adresses email ne correspondent pas";
	}
	if ($password != $password_again) {
		$errors['differentPassword'] = "Les mots de passe sont différents";
	}
	
	if (email_taken($email)) {
		$errors['taken'] = "L'adresse email est déjà assignée !";
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
		register($pseudo, $email, $password, $token);
		if (!empty($_FILES['file']['name'])) {
			post_img($_FILES['file']['tmp_name'], $extension);
		} else {
			header("Location:index.php?page=home&msg=registerOK");
		}
	}
}
?>
<div class="container pt-3">
	<form method="post" enctype="multipart/form-data">
		<div class="mb-3">
			<label class="visually-hidden" for="pseudo">Pseudo</label>
			<div class="input-group">
				<div class="input-group-text">@</div>
				<input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo">
			</div>
		</div>

		<div class="mb-3">
			<label for="email" class="form-label">Adresse e-mail</label>
			<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
			<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
		</div>

		<div class="mb-3">
			<label for="email_again" class="form-label">Confirmer l'adresse e-mail</label>
			<input type="email" class="form-control" id="email_again" name="email_again" aria-describedby="emailHelp">
		</div>

		<div class="mb-3">
			<label for="password" class="form-label">Mot de pass</label>
			<input type="password" class="form-control" name="password" id="password">
		</div>

		<div class="mb-3">
			<label for="password_again" class="form-label">Confirmer le mot de pass</label>
			<input type="password" class="form-control" name="password_again" id="password_again">
		</div>

		<div class="mb-3">
			<label for="file" class="form-label">Avatar</label>
			<input class="form-control" type="file" id="file" name="file">
		</div>

		<div class="d-flex justify-content-end">
			<button type="submit" class="btn btn-primary" name="formNews">S'inscrire</button>
		</div>
	</form>
</div>