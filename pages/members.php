<h2>Members</h2>
<?php
$members = get_members();
?>
<div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-2 p-3">
	<?php
	foreach ($members as $member) {
		?>
		<div class="col">
			<div class="card text-white bg-secondary mb-3">
				<div class="card-body text-center">
					<h5 class="card-title"><?= get_role_icon($member->role) . " " . $member->name ?></h5>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>

