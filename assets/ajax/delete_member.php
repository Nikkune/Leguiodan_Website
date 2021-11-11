<?php
require "../functions/main_functions.php";
$dbWeb->exec("DELETE FROM members WHERE id='{$_POST['id']}'");