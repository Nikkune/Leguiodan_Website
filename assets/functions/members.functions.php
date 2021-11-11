<?php
function get_members(){
	global $dbWeb;
	$req = $dbWeb->query("SELECT id, name, role FROM members WHERE verified = 1 ORDER BY role DESC");
	$results = array();
	while ($rows = $req->fetchObject()) {
		$results[] = $rows;
	}
	
	return $results;
}

function get_role_icon($role){
	switch ($role){
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
	}
	return '<i class="bi bi-bug-fill"></i>';
}