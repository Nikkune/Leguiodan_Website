<div class="row">
	<div class="container text-center mt-3">
		<?php
		$players = get_online_players();
		?>
		<div class="container text-center mt-3">
			<div class="card">
				<div class="card-header">
					<img src="/uploads/images/base/brand.png" class="card-img-top" alt="Leguidoan">
				</div>
				<div class="card-body">
					<h2>Status du serveur : <?php if (is_server_online() == '1') {
							echo '<i class="bi bi-check-circle-fill text-success"></i> En ligne';
						} else {
							echo '<i class="bi bi-x-circle-fill text-danger"></i> Hors Ligne';
						} ?></h2>
					<p class="card-text"><?php if (is_server_online() == '1') {
							if (get_nbr_online() != 0) {
								echo 'Le serveur est actuellement ouvert !<br/>';
								echo 'Il y a ' . get_nbr_online() . ' joueur(s) trains de jouer !!';
							} else {
								echo 'Le serveur est actuellement ouvert !<br/>';
								echo 'Il n\'y a aucun joueur sur le serveur en ce moment.';
							}
						} else {
							echo 'Le serveur est actuellement fermé !';
						} ?></p>
				</div>
				<div class="card-footer text-muted">
					<div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
						<?php
						foreach ($players as $player) {
							?>
							<div class="col mb-3">
								<div class="card bg-secondary text-light" style="min-height: 386px; height: 100%">
									<div class="card-header">
										<h4><?= $player->pseudo ?></h4>
										<img src="https://minotar.net/helm/<?= $player->uuid ?>.png" alt="...">
									</div>
									<div class="card-body">
										<p>Level : <?= $player->level ?> <br />
											Xp : <?= $player->xp ?></p>
									</div>
									<div class="card-footer">
										<p>Temps de jeu : <?= formatPlaytime($player->playtime) ?></p>
									</div>
								</div>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
