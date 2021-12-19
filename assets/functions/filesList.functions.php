<?php
function getFiles($type) {
	global $dbWeb;
	$sql = "SELECT id, title, file, description, public, download FROM files_tables WHERE type='" . $type . "' ORDER BY date DESC";
	$req = $dbWeb->query($sql);
	
	$results = [];
	
	while ($rows = $req->fetchObject()) {
		$results[] = $rows;
	}
	
	return $results;
}
?>