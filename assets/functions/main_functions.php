<?php
include 'hide_functions.php';

$links = array(
	["url" => "home", "name" => "Home", "icon" => '<i class="bi bi-house-door me-2"></i>'],
	["url" => "musics", "name" => "Musics", "icon" => '<i class="bi bi-boombox me-2"></i>'],
	["url" => "illus", "name" => "Illustrations", "icon" => '<i class="bi bi-images me-2"></i>'],
	["url" => "members", "name" => "Members", "icon" => '<i class="bi bi-people me-2"></i>'],
	["url" => "#", "name" => "|", "icon" => ''],
	["url" => "server", "name" => "Server", "icon" => '<i class="bi bi-server me-2"></i>'],
	["url" => "news", "name" => "News", "icon" => '<i class="bi bi-newspaper me-2"></i>'],
	["url" => "guide", "name" => "Guides", "icon" => '<i class="bi bi-journal-richtext me-2"></i>']);

$messages = array("empty" => "Tous les champs n'ont pas été remplis !!");

function date_fr($date) {
	$Day = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
	$Month = array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	return $Day[date("w", $date)] . " " . date("d", $date) . " " . $Month[date("n", $date)] . " " . date("Y", $date);
}
