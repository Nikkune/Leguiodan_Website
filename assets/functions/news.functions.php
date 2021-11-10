<?php
function get_news_post() {
	global $dbWeb;
	$req = $dbWeb->query("SELECT id,title,content,image FROM news_post WHERE public = '1' ORDER BY date DESC");
	$results = array();
	while ($rows = $req->fetchObject()) {
		$results[] = $rows;
	}
	
	return $results;
}