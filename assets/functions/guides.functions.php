<?php
function get_guides_post() {
	global $dbWeb;
	$req = $dbWeb->query("SELECT guides_post.id,guides_post.title,guides_post.date,members.role,members.name FROM guides_post JOIN members ON guides_post.writer = members.email WHERE public = '1' ORDER BY date DESC");
	$results = array();
	while ($rows = $req->fetchObject()) {
		$results[] = $rows;
	}
	
	return $results;
}
?>