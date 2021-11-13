<?php
if (isset($_SESSION['userEmail'])) {
	header("Location:index.php?page=home");
}
?>
<div class="row justify-content-center">
	<div class="col-4">
		<div class="card p-2 mt-2">
			<div class="row justify-content-center">
				<div class="col-6">
					<!--suppress HtmlUnknownTarget -->
					<img src="uploads/images/base/logo.png" class="img-fluid" alt="">
				</div>
			</div>
			<h4 class="text-center">Se connecter</h4>
			<?php
			if (isset($_POST['formLogin'])) {
				$email = htmlspecialchars(trim($_POST['email']));
				$password = htmlspecialchars(trim($_POST['password']));
				$errors = [];
				if (empty($email) || empty($password)) {
					$errors['empty'] = $messages['empty'];
				} elseif (userExist($email, $password) == 0) {
					$errors['exist'] = $messages['exist'];
				}elseif (hasVerified($email) == 0){
					$errors['verified'] = "Vous devez confirmer votre adresse mail avant de vous connecter";
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
				$_SESSION['userEmail'] = $email;
				?>
					<script>
						window.location.replace('index.php?page=home')
					</script>
					<?php
				}
			}
			?>

			<div class="container-fluid">
				<form method="post">
					<div class="mb-3">
						<label for="email" class="form-label">Adresse email</label>
						<input type="email" class="form-control" id="email" name="email" required>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Mot de passe</label>
						<input type="password" class="form-control" id="password" name="password" required>
					</div>
					<center>
						<button type="submit" class="btn btn-primary" name="formLogin">
							<i class="bi bi-person"></i> Se connecter
						</button>
						<!--suppress HtmlUnknownTarget -->
						<a href="index.php?page=register" class="btn btn-primary">
							<i class="bi bi-person-plus"></i> S'inscrire
						</a>
					</center>
				</form>

			</div>
		</div>
	</div>
</div>