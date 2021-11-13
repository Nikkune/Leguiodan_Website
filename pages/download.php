<div class="row">
	<h2 class="mt-3">Téléchargements</h2>
	<hr />
	<div class="container">
		<div class="container">
			<h4>Illustrations</h4>
			<?php
			$illus_dls = get_files("illus");
			if (!empty($illus_dls)) {
				foreach ($illus_dls as $illus_dl) {
					?>
					<div class="card text-center mb-3">
						<div class="card-header">
							<?= $illus_dl->title ?>
						</div>
						<div class="card-body">
							<p><?= $illus_dl->description ?></p>
							<!--suppress HtmlUnknownTarget -->
							<a class="btn btn-primary" href="uploads/<?= $illus_dl->file ?>" download="<?= $illus_dl->title ?>">Download</a>
						</div>
						<div class="card-footer text-muted">
							<?= 'Le ' . date_fr(strtotime($illus_dl->date)) ?>
						</div>
					</div>
					<?php
				}
			} else {
				echo 'Pas d\'illustration a télécharger !';
			}
			?>
			<hr />
			<h4>Others</h4>
			<?php
			$others_dls = get_files("other");
			if (!empty($others_dls)) {
				foreach ($others_dls as $others_dl) {
					?>
					<div class="card text-center mb-3">
						<div class="card-header">
							<?= $others_dl->title ?>
						</div>
						<div class="card-body">
							<p><?= $others_dl->description ?></p>
							<!--suppress HtmlUnknownTarget -->
							<a class="btn btn-primary" href="uploads/<?= $others_dl->file ?>" download="<?= $others_dl->title ?>">Download</a>
						</div>
						<div class="card-footer text-muted">
							<?= 'Le ' . date_fr(strtotime($others_dl->date)) ?>
						</div>
					</div>
					<?php
				}
			} else {
				echo 'Pas d\'autres fichier a télécharger !';
			}
			?>
		</div>
	</div>
</div>