<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
	global $dbWeb;
	$id = $_GET['id'];
	$sql = "UPDATE files_tables SET public = NOT public WHERE id = ?";
	$upd = $dbWeb->prepare($sql);
	$upd->execute(array($id));
	header('Location:index.php?page=filesList');
} else {
	header('Location:index.php?page=filesList');
}