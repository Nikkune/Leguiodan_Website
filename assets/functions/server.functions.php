<?php
function is_server_online(){
	global $dbServer;
	$req = $dbServer->query("SELECT online FROM online_status WHERE uuid = 'server'");
	return $req->fetchObject()->online;
}

function get_online_players(){
	global $dbServer;
	$req = $dbServer->query("SELECT online_status.uuid,players.pseudo,players.playtime,players.level,players.xp FROM online_status JOIN players on online_status.uuid = players.uuid WHERE online = '1' AND online_status.uuid != 'server' ORDER BY players.level DESC");
	$results = array();
	while ($rows = $req->fetchObject()) {
		$results[] = $rows;
	}
	
	return $results;
}

function get_nbr_online(){
	global $dbServer;
	$query = $dbServer->query("SELECT COUNT(id) FROM online_status WHERE uuid != 'server' AND online = '1'");
	return $query->fetch()[0];
}

function formatPlaytime($playtime)
{
	$var = explode(".", round($playtime / 60, 1));
	$hour = $var[0];
	if (isset($var[1]) && !empty($var[1])){
		$minute = 6 * $var[1];
	}else{
		$minute = 0;
	}
	return $hour . " H et " . $minute . " Min";
}