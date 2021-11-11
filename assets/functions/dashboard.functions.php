<?php
function inTable($table_name, $table) {
	global $dbWeb;
	if ($table_name == "Rédacteurs") {
		$query = $dbWeb->query("SELECT COUNT(id) FROM members WHERE role = 3");
	} elseif ($table_name == "Modérateurs") {
		$query = $dbWeb->query("SELECT COUNT(id) FROM members WHERE role = 4");
	} elseif ($table_name == "Administrateurs") {
		$query = $dbWeb->query("SELECT COUNT(id) FROM members WHERE role = 5");
	} else {
		/** @noinspection SqlResolve */
		$query = $dbWeb->query("SELECT COUNT(id) FROM $table");
	}
	return $query->fetch();
}

function getColor($table_name, $colors) {
	if (isset($colors[$table_name])) {
		return $colors[$table_name];
	} else {
		return "secondary";
	}
}

function get_comments() {
	global $dbWeb;
	$req = $dbWeb->query("
	SELECT news_comments.id,
	       news_comments.name,
	       news_comments.date,
	       news_comments.post_id,
	       news_comments.comment,
	       news_post.title,
	       members.email,
	       members.role
	FROM news_comments
	JOIN news_post
	ON news_comments.post_id = news_post.id
	JOIN members
	ON news_comments.name = members.name
	WHERE news_comments.seen = '0'
	ORDER BY news_comments.date
	");
	
	$results = [];
	
	while ($rows = $req->fetchObject()) {
		$results[] = $rows;
	}
	
	return $results;
}