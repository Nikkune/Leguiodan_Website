<?php
function get_news_post() {
	global $dbWeb;
	$req = $dbWeb->query("SELECT id,title,content,image,public FROM news_post ORDER BY date DESC");
	$results = [];
	while ($rows = $req->fetchObject()) {
		$results[] = $rows;
	}
	
	return $results;
}