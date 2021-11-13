<?php
include 'hide_functions.php';
session_start();

$links = array(
	["url" => "home", "name" => "Home", "icon" => '<i class="bi bi-house-door me-2"></i>'],
	["url" => "musics", "name" => "Musics", "icon" => '<i class="bi bi-boombox me-2"></i>'],
	["url" => "illus", "name" => "Illustrations", "icon" => '<i class="bi bi-images me-2"></i>'],
	["url" => "members", "name" => "Members", "icon" => '<i class="bi bi-people me-2"></i>'],
	["url" => "#", "name" => "|", "icon" => ''],
	["url" => "server", "name" => "Server", "icon" => '<i class="bi bi-server me-2"></i>'],
	["url" => "news", "name" => "News", "icon" => '<i class="bi bi-newspaper me-2"></i>'],
	["url" => "guides", "name" => "Guides", "icon" => '<i class="bi bi-journal-richtext me-2"></i>'],
	["url" => "#", "name" => "|", "icon" => ''],
	["url" => "download", "name" => "Téléchargements", "icon" => '<i class="bi bi-download me-2"></i>']
);

$messages = array("empty" => "Tous les champs n'ont pas été remplis !!", "exist" => "Cet utilisateur n'existe pas ou n'a pas les droits !!");

function date_fr($date) {
	$Day = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
	$Month = array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	return $Day[date("w", $date)] . " " . date("d", $date) . " " . $Month[date("n", $date)] . " " . date("Y", $date);
}

function get_role_icon($role) {
	switch ($role) {
		case 1:
			return '<i class="bi bi-person-fill"></i>';
		case 2:
			return '<i class="bi bi-youtube"></i>';
		case 3:
			return '<i class="bi bi-pen"></i>';
		case 4:
			return '<i class="bi bi-wrench"></i>';
		case 5:
			return '<i class="bi bi-code-slash"></i>';
		default:
			return '<i class="bi bi-bug-fill"></i>';
	}
}

function get_role_aff($role) {
	switch ($role) {
		case 1:
			return '<i class="bi bi-person-fill"></i> Membre';
		case 2:
			return '<i class="bi bi-youtube"></i> Youtuber';
		case 3:
			return '<i class="bi bi-pen"></i> Écrivain';
		case 4:
			return '<i class="bi bi-wrench"></i> Modérateur';
		case 5:
			return '<i class="bi bi-code-slash"></i> Administrateur';
		default:
			return '<i class="bi bi-bug-fill"></i> Erreur';
	}
}

function get_user_avatar() {
	if (isset($_SESSION['userEmail']) && !empty($_SESSION['userEmail'])) {
		$email = $_SESSION['userEmail'];
		global $dbWeb;
		$req = $dbWeb->query("SELECT files FROM members WHERE email = '$email'");
		$member = $req->fetchObject();
		return $member->files;
	} else {
		return 'unknow_user.png';
	}
}