<?php
function get_members() {
	global $dbWeb;
	$req = $dbWeb->query("SELECT id, name, role,files FROM members WHERE verified = 1 ORDER BY role DESC");
	$results = array();
	while ($rows = $req->fetchObject()) {
		$results[] = $rows;
	}
	
	return $results;
}
?>