<?php
require "../functions/main_functions.php";
$dbWeb->exec("DELETE FROM news_comments WHERE id='{$_POST['id']}'");
?>