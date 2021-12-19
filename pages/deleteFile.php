<?php
if (isset($_GET['id']) && !empty($_GET['id'])){
	$id =$_GET['id'];
	$dbWeb->exec("DELETE FROM members WHERE id='$id'");
	header('Location:index.php?page=filesList');
}else{
	header('Location:index.php?page=filesList');
}
