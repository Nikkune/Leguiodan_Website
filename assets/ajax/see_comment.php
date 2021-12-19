<?php
require "../functions/main_functions.php";
$dbWeb->exec("UPDATE news_comments SET seen='1' WHERE id='{$_POST['id']}'");
?>