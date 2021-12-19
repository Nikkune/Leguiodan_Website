<?php
global $dbWeb;
if (isset($_POST['formFile'])) {
	$type = htmlspecialchars($_POST['type']);
	$name = htmlspecialchars($_POST['name']);
	$desc = htmlspecialchars($_POST['desc']);
	$public = isset($_POST['public']) ? "1" : "0";
	$dl = isset($_POST['dl']) ? "1" : "0";
	$file = $_FILES['newFile'];
	$fileName = $file['name'];
	$fileExt = "." . strtolower(substr(strrchr($fileName, '.'), 1));
	$maxSize = 3000000;
	
	
	$errors = [];
	
	if ($type = 0) {
		$errors['type'] = 'Veuillez choisir un type de fichier !';
	}
	
	if ($file['error'] > 0) {
		$errors['fileError'] = 'Une erreur est survenue lors du transfert';
	}
	
	if ($file['size'] > $maxSize) {
		$errors['size'] = 'Le document est trop gros, il doit faire moins de 3 Mo';
	}
	
	if (name_taken($name)) {
		$errors['taken'] = 'Le nom est déjà assignée !';
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
		$filePath = 'tmpsFiles/' . $name . $fileExt;
		$resultMv = move_uploaded_file($file['tmp_name'], $filePath);
		if ($resultMv){
			moveFile($name,$type,$fileExt);
		}
		/*if ($resultMv) {
			insertFile($name, $type, $fileExt, $desc, $public, $dl);
		} else {
			die("Une erreur est survenue !");
		}*/
	}
}
?>
<div class="row justify-content-center">
	<div class="col-4">
		<div class="card p-3 mt-2">
			<h4 class="text-center">Ajouter un document</h4>
			<div class="container-fluid">
				<form method="post" enctype="multipart/form-data">
					<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="type" id="type">
						<option value="0" selected>Sélectionner le type de document :</option>
						<option value="illus">Image</option>
						<option value="other">Autre</option>
					</select>
					<div class="mb-3">
						<label for="name" class="form-label">Nom du document</label>
						<input type="text" class="form-control" id="name" name="name" required>
					</div>
					<div class="mb-3">
						<label for="desc" class="form-label">Description du document</label>
						<textarea name="desc" id="desc" class="form-control"></textarea>
					</div>
					<div class="form-check form-switch mb-3">
						<input class="form-check-input" type="checkbox" role="switch" id="public" name="public">
						<label class="form-check-label" for="public">Public ?</label>
					</div>
					<div class="form-check form-switch mb-3">
						<input class="form-check-input" type="checkbox" role="switch" id="dl" name="dl">
						<label class="form-check-label" for="dl">Téléchargeable ?</label>
					</div>
					<div class="mb-3">
						<label for="newFile" class="form-label">Choisir le fichier</label>
						<input class="form-control" type="file" name="newFile" id="newFile" required>
					</div>
					<center>
						<button type="submit" class="btn btn-primary" name="formFile">
							<i class="bi bi-file-plus"></i> Ajouter
						</button>
					</center>
				</form>

			</div>
		</div>
	</div>
</div>