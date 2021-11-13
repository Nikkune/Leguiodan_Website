<h2>Members</h2>
<?php
$members = get_members();
?>
<div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-2 p-3">
	<?php
	foreach ($members as $member) {
		?>
		<div class="col">
			<!--suppress HtmlDeprecatedTag -->
			<center>
				<div class="card text-white bg-secondary mb-3 w-75">
					<!--suppress HtmlDeprecatedTag -->
					<center>
						<img src="uploads/images/avatars/<?= $member->files ?>" class="card-img-top rounded-circle ratio ratio-1x1 p-3" alt="<?= $member->name ?>">
					</center>
					<div class="card-body text-center">
						<h5 class="card-title"><?= $member->name ?></h5>
						<p><?= get_role_aff($member->role) ?></p>
					</div>
				</div>
			</center>
		</div>
		<?php
	}
	?>
</div>

