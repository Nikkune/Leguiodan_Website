<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "UPDATE files_tables SET download = NOT download WHERE id = ?";
	$upd = $dbWeb->prepare($sql);
	$upd->execute(array($id));
	header('Location:index.php?page=filesList');
} else {
	header('Location:index.php?page=filesList');
}