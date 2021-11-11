<?php
session_start();
include 'hidden_functions.php';

$links = array(
	["url" => "dashboard", "name" => "Dashboard", "icon" => '<i class="bi bi-sliders me-2"></i>', "perm" => "modo"],
	["url" => "writeNews", "name" => "Publier un arcticle", "icon" => '<i class="bi bi-pencil-square me-2"></i>', "perm" => "writer"],
	["url" => "writeGuides", "name" => "Publier un guide", "icon" => '<i class="bi bi-pencil-square me-2"></i>', "perm" => "writer"],
	["url" => "newsList", "name" => "Listing des arcticles", "icon" => '<i class="bi bi-list-nested me-2"></i>', "perm" => "writer"],
	["url" => "guidesList", "name" => "Listing des guides", "icon" => '<i class="bi bi-list-nested me-2"></i>', "perm" => "writer"],
	["url" => "membersList", "name" => "Listing des membres", "icon" => '<i class="bi bi-person-lines-fill me-2"></i>', "perm" => "modo"],
	["url" => "exits", "name" => "Quitter", "icon" => '<i class="bi bi-box-arrow-right me-2"></i>', "perm" => "writer"],
	["url" => "logout", "name" => "Déconnexion", "icon" => '<i class="bi bi-door-closed me-2"></i>', "perm" => "writer"]
);

$messages = array("empty" => "Tous les champs n'ont pas été remplis !!", "exist" => "Cet utilisateur n'existe pas ou n'a pas les droits !!");

/** @noinspection PhpInconsistentReturnPointsInspection */
function has_mini_perm($min_perm, $email){
	if ($min_perm == "writer")
	{
		global $dbWeb;
		$w = [
			'email' => $email
		];
		$sql = "SELECT * FROM members WHERE email = :email AND role = '3' OR role = '5'";
		$req = $dbWeb->prepare($sql);
		$req->execute($w);
		$exist = $req->rowCount();
		return $exist;
	}elseif ($min_perm == "modo")
	{
		global $dbWeb;
		$w = [
			'email' => $email
		];
		$sql = "SELECT * FROM members WHERE email = :email AND role = '4' OR role = '5'";
		$req = $dbWeb->prepare($sql);
		$req->execute($w);
		$exist = $req->rowCount();
		return $exist;
	}elseif ($min_perm == "admin")
	{
		global $dbWeb;
		$w = [
			'email' => $email
		];
		$sql = "SELECT * FROM members WHERE email = :email AND role >= '5'";
		$req = $dbWeb->prepare($sql);
		$req->execute($w);
		$exist = $req->rowCount();
		return $exist;
	}
}

function is_writer($email){
	global $dbWeb;
	$w = [
		'email' => $email
	];
	$sql = "SELECT * FROM members WHERE email = :email AND role = '3'";
	$req = $dbWeb->prepare($sql);
	$req->execute($w);
	$exist = $req->rowCount();
	return $exist;
}

function is_modo($email){
	global $dbWeb;
	$w = [
		'email' => $email
	];
	$sql = "SELECT * FROM members WHERE email = :email AND role = '4'";
	$req = $dbWeb->prepare($sql);
	$req->execute($w);
	$exist = $req->rowCount();
	return $exist;
}

function is_admin($email){
	global $dbWeb;
	$w = [
		'email' => $email
	];
	$sql = "SELECT * FROM members WHERE email = :email AND role = '5'";
	$req = $dbWeb->prepare($sql);
	$req->execute($w);
	$exist = $req->rowCount();
	return $exist;
}