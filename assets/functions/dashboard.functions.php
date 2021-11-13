<?php
function inTable($table) {
	global $dbWeb;
	/** @noinspection SqlResolve */
	$sql = "SELECT COUNT(id) FROM $table[0]";
	if ($table[1] != null){
		$option = $table[1];
		$sql .= " WHERE $option[0] = '$option[1]'";
	}
	$query = $dbWeb->query($sql);
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
	       members.name,
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
	ON news_comments.email = members.email
	WHERE news_comments.seen = '0'
	ORDER BY news_comments.date
	");
	
	$results = [];
	
	while ($rows = $req->fetchObject()) {
		$results[] = $rows;
	}
	
	return $results;
}