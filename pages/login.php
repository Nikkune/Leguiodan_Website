<?php
	if (isset($_SESSION['connectedUser'])){
		header("Location:index.php?page=dashboard");
	}
?>
<div class="row justify-content-center">
	<div class="col-4">
		<div class="card p-2 mt-2">
			<div class="row justify-content-center">
				<div class="col-6">
					<!--suppress HtmlUnknownTarget -->
					<img src="<?= $baseWebSite ?>/uploads/images/base/logo.png" class="img-fluid" alt="">
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
				}elseif (has_right($email,$password) == 0){
					$errors['exist'] = $messages['exist'];
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
					$_SESSION['connectedUser'] = $email;
					header("Location:index.php?page=dashboard");
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
						<button type="submit" class="btn btn-warning" name="formLogin">
							<i class="bi bi-person"></i> Se connecter
						</button>
					</center>
				</form>
			</div>
		</div>
	</div>
</div>