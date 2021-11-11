<?php
$illus = get_illus();
$illus_nbr = get_illus_nbr()[0];
$x = 0;
?>
<div class="row pt-3 align-content-center justify-content-center">
	<div id="illustration" class="carousel slide" data-bs-ride="carousel" style="max-width: 1447px">
		<div class="carousel-indicators">
			<?php
			while ($x < $illus_nbr) {
				?>
				<button type="button" data-bs-target="#illustration" data-bs-slide-to="<?= $x ?>" class="<?php if ($x == 0) {
					echo 'active';
				} ?>" aria-current="true" aria-label="Slide <?= $x + 1 ?>"></button>
				<?php
				$x++;
			}
			?>
		</div>
		<div class="carousel-inner">
			<?php
			foreach ($illus as $illu) {
				?>
				<div class="carousel-item <?php if ($illu->id == $illus_nbr) {
					echo 'active';
				} ?>">
					<div class="image_holder" value="<?= $illu->file ?>">
						<img src="../uploads/images/base/watermark.png" class="d-block w-100" alt="">
					</div>
					<div class="carousel-caption d-none d-md-block">
						<h5><?= $illu->title ?></h5>
						<p><?= $illu->description ?> <br/> Fait le <?= date_fr(strtotime($illu->date)) . " à " . date("H:i", strtotime($illu->date)); ?></p>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#illustration" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#illustration" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
</div>