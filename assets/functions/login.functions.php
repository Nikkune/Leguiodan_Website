<?php
function userExist($email, $password) {
	global $dbWeb;
	$w = [
		'email' => $email,
		'password' => sha1($password)
	];
	$sql = "SELECT id FROM members WHERE email = :email AND password = :password";
	$req = $dbWeb->prepare($sql);
	$req->execute($w);
	$exist = $req->rowCount();
	return $exist;
}

function hasVerified($email) {
	global $dbWeb;
	$w = [
		'email' => $email
	];
	$sql = "SELECT id FROM members WHERE email = :email AND verified = '1'";
	$req = $dbWeb->prepare($sql);
	$req->execute($w);
	$exist = $req->rowCount();
	return $exist;
}