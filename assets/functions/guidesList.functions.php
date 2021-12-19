<?php
function get_guides_post() {
	global $dbWeb;
	$req = $dbWeb->query("SELECT guides_post.id,guides_post.title,guides_post.date,guides_post.public,members.role,members.name FROM guides_post JOIN members ON guides_post.writer = members.email ORDER BY date DESC");
	$results = [];
	while ($rows = $req->fetchObject()) {
		$results[] = $rows;
	}
	
	return $results;
}

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
?>