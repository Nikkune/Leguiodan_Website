<?php /** @noinspection DuplicatedCode */
function get_post() {
	global $dbWeb;
	$req = $dbWeb->query("SELECT news_post.title,news_post.content,news_post.image,news_post.date,members.name FROM news_post JOIN members ON news_post.writer = members.email WHERE news_post.id = '{$_GET['id']}' AND public = '1'");
	$result = $req->fetchObject();
	return $result;
}

function comment($email, $comment) {
	global $dbWeb;
	
	$c = array(
		'email' => $email,
		'comment' => $comment,
		'post_id' => htmlspecialchars($_GET['id'])
	);
	
	$sql = "INSERT INTO news_comments(email, comment, post_id, date) VALUES (:email,:comment,:post_id,NOW())";
	$req = $dbWeb->prepare($sql);
	$req->execute($c);
}

function get_comments() {
	global $dbWeb;
	$req = $dbWeb->query("SELECT members.name, news_comments.comment, news_comments.date FROM news_comments JOIN members ON news_comments.email = members.email WHERE post_id = '{$_GET['id']}' AND seen = '1' ORDER BY date DESC");
	$results = [];
	while ($rows = $req->fetchObject()) {
		$results[] = $rows;
	}
	return $results;
}