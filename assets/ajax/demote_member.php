<?php
require "../functions/main_functions.php";
$req = $dbWeb->query("SELECT role FROM members WHERE id='{$_POST['id']}'");
$req = $req->fetch();
$role = intval($req['role']) - 1;
$dbWeb->exec("UPDATE members SET role='" . $role . "' WHERE id='{$_POST['id']}'");
?>