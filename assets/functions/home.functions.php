<?php
function get_news_post() {
	global $dbWeb;
	$req = $dbWeb->query("SELECT news_post.id,news_post.title,news_post.content,news_post.image,news_post.date,members.name FROM news_post JOIN members ON news_post.writer=members.email WHERE public = '1' ORDER BY date DESC LIMIT 0,2");
	$results = array();
	while ($rows = $req->fetchObject()) {
		$results[] = $rows;
	}
	
	return $results;
}
?>
