<?php
function has_right($email,$password){
	global $dbWeb;
	$w = [
		'email' => $email,
		'password' =>  sha1($password)
	];
	$sql = "SELECT * FROM members WHERE email = :email AND role >= '3'";
	$req = $dbWeb->prepare($sql);
	$req->execute($w);
	$exist = $req->rowCount();
	return $exist;
}