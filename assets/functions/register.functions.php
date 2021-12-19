<?php
function email_taken($email) {
	global $dbWeb;
	$e = ['email' => $email];
	$sql = "SELECT id FROM members WHERE email = :email";
	$req = $dbWeb->prepare($sql);
	$req->execute($e);
	$free = $req->rowCount($sql);
	
	return $free;
}

function pseudo_taken($pseudo) {
	global $dbWeb;
	$e = ['pseudo' => $pseudo];
	$sql = "SELECT id FROM members WHERE name = :pseudo";
	$req = $dbWeb->prepare($sql);
	$req->execute($e);
	$free = $req->rowCount($sql);
	
	return $free;
}

function token($length) {
	$chars = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789";
	return substr(str_shuffle(str_repeat($chars, $length)), 0, $length);
}

function register($pseudo, $email, $password, $token) {
	global $dbWeb;
	
	$m = [
		'pseudo' => $pseudo,
		'email' => $email,
		'token' => $token,
		'password' => sha1($password)
	];
	
	$sql = "INSERT INTO members(name, email, password, token) VALUES(:pseudo,:email,:password,:token)";
	$req = $dbWeb->prepare($sql);
	$req->execute($m);
	sendConfirmationMail($email,$pseudo,$token);
}

function compressImage($source, $destination) {
	
	$info = getimagesize($source);
	
	if ($info['mime'] == 'image/jpeg')
		$image = imagecreatefromjpeg($source);
	
	elseif ($info['mime'] == 'image/gif')
		$image = imagecreatefromgif($source);
	
	elseif ($info['mime'] == 'image/png')
		$image = imagecreatefrompng($source);
	
	imagejpeg($image, $destination, 60);
}

function post_img($tmp_name, $extension) {
	global $dbWeb;
	$id = $dbWeb->lastInsertId();
	$i = [
		'id' => $id,
		'image' => $id . $extension
	];
	$sql = "UPDATE members SET files = :image WHERE id = :id";
	$req = $dbWeb->prepare($sql);
	$req->execute($i);
	$path = 'uploads/images/avatars/';
	compressImage($tmp_name, $path . $id . $extension);
	header("Location:index.php?page=home&msg=registerOK");
}