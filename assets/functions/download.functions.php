<?php
function get_files($type) {
	global $dbWeb;
	$req = $dbWeb->query("SELECT title, file, description, date FROM files_tables WHERE download = 1 AND public = 1 AND type ='$type' ORDER BY date DESC");
	$results = array();
	while ($rows = $req->fetchObject()) {
		$results[] = $rows;
	}
	
	return $results;
}
?>