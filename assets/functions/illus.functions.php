<?php
function get_illus(){
	global $dbWeb;
	$req = $dbWeb->query("SELECT id,title,file,description,date FROM files_tables WHERE public = '1' AND type = 'illus' ORDER BY date DESC");
	$results = array();
	while ($rows = $req->fetchObject()) {
		$results[] = $rows;
	}
	
	return $results;
}

function get_illus_nbr(){
	global $dbWeb;
	$query = $dbWeb->query("SELECT COUNT(id) FROM files_tables WHERE type = 'illus'");
	return $query->fetch();
}

/** @noinspection DuplicatedCode */
function date_fr($date) {
	$Day = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
	$Month = array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	return $Day[date("w", $date)] . " " . date("d", $date) . " " . $Month[date("n", $date)] . " " . date("Y", $date);
}