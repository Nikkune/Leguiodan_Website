<h2>Liste des documents</h2>
<?php
$others = getFiles('other');
$illus = getFiles('illus');
?>
<table class="table table-striped">
	<thead>
	<tr>
		<th scope="col">Nom</th>
		<th scope="col">Visuel</th>
		<th scope="col">Description</th>
		<th scope="col">Public</th>
		<th scope="col">Téléchargeable</th>
		<th scope="col">Action</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td colspan="7" class="text-center"><strong>Autre Documents</strong></td>
	</tr>
	<?php
	foreach ($others as $other) {
		var_dump($other->download);
		?>
		<tr>
			<td><?= $other->title ?></td>
			<td>Aucun</td>
			<td><?= $other->description ?></td>
			<td><?php if ($other->public == '1') {
					echo '<i class="bi bi-check-circle-fill text-success"></i>';
				} else {
					echo '<i class="bi bi-x-circle-fill text-danger"></i>';
				} ?></td>
			<td><?php if ($other->download == '1') {
					echo '<i class="bi bi-check-circle-fill text-success"></i>';
				} else {
					echo '<i class="bi bi-x-circle-fill text-danger"></i>';
				} ?></td>
			<td><a href="index.php?page=toggleFilePu&id=<?=$other->id?>" class="btn btn-primary shadow rounded delete_member">Public / Non Public</a>
				<a href="index.php?page=toggleFileDl&id=<?=$other->id?>" class="btn btn-secondary shadow rounded delete_member">Téléchargeable / Non Téléchargeable</a>
				<a href="index.php?page=deleteFile&id=<?=$other->id?>" class="btn btn-danger shadow rounded rounded-circle delete_member"><i class="bi bi-trash-fill text-light"></i></a></td>
		</tr>
		<?php
	}
	?>
	<tr>
		<td colspan="7" class="text-center"><strong>Illustrations</strong></td>
	</tr>
	<?php
	foreach ($illus as $illu) {
		?>
		<tr>
			<td><?= $illu->title ?></td>
			<td><img src="<?= $baseWebSite . '/uploads/' . $illu->file ?>" style="height: 150px"></td>
			<td><?= $illu->description ?></td>
			<td><?php if ($illu->public == '1') {
					echo '<i class="bi bi-check-circle-fill text-success"></i>';
				} else {
					echo '<i class="bi bi-x-circle-fill text-danger"></i>';
				} ?></td>
			<td><?php if ($illu->download == '1') {
					echo '<i class="bi bi-check-circle-fill text-success"></i>';
				} else {
					echo '<i class="bi bi-x-circle-fill text-danger"></i>';
				} ?></td>
			<td><a href="index.php?page=toggleFilePu&id=<?=$illu->id?>" class="btn btn-primary shadow rounded delete_member">Public / Non Public</a>
				<a href="index.php?page=toggleFileDl&id=<?=$illu->id?>" class="btn btn-secondary shadow rounded delete_member">Téléchargeable / Non Téléchargeable</a>
				<a href="index.php?page=deleteFile&id=<?=$illu->id?>" class="btn btn-danger shadow rounded rounded-circle delete_member"><i class="bi bi-trash-fill text-light"></i></a></td>
		</tr>
		<?php
	}
	?>
	</tbody>
</table>