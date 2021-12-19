<?php
if (isset($_SESSION['userEmail'])) {
	unset($_SESSION['userEmail']);
}
header("Location:index.php?page=home");
?>