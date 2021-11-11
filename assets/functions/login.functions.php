<?php
function has_right($email,$password){
	global $dbWeb;
	$w = [
		'email' => $email,
		'password' =>  sha1($password)
	];
	$sql = "SELECT * FROM members WHERE email = :email AND password = :password AND role >= '3'";
	$req = $dbWeb->prepare($sql);
	$req->execute($w);
	$exist = $req->rowCount();
	return $exist;
}

function get_right($email){
	global $dbWeb;
	$w = [
		'email' => $email
	];
	$sql = "SELECT role FROM members WHERE email = :email";
	$req = $dbWeb->prepare($sql);
	$req->execute($w);
	$role = $req->fetchObject();
	switch ($role->role){
		case 3:
			return "writer";
		case 4:
			return "modo";
		case 5:
			return "admin";
		default:
			return "error";
	}
}