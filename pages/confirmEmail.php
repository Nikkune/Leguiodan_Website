<?php
function userExistToken($token){
	global $dbWeb;
	$t=['token' => $token];
	$sql = "SELECT id FROM members WHERE token  = :token";
	$req = $dbWeb->prepare($sql);
	$req->execute($t);
	return $req->rowCount($sql);
}
function verifiedUser($token){
	global $dbWeb;
	$t=['token' => $token];
	$sql = "UPDATE members SET verified = '1' WHERE token = :token";
	$req = $dbWeb->prepare($sql);
	$req->execute($t);
	header('Location:index.php?page=home');
}
if (isset($_GET['token']) && !empty($_GET['token'])){
	if (userExistToken($_GET['token']) == 1){
		verifiedUser($_GET['token']);
	}else{
		echo 'Ce token est invalid !';
	}
}else{
	header('Location:index.php?page=home');
}

