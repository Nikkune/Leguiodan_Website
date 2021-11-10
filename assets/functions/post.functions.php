<?php /** @noinspection DuplicatedCode */
function get_post() {
	global $dbWeb;
	$req = $dbWeb->query("SELECT news_post.title,news_post.content,news_post.image,news_post.date,members.name FROM news_post JOIN members ON news_post.writer = members.email WHERE news_post.id = '{$_GET['id']}' AND public = '1'");
	$result = $req->fetchObject();
	return $result;
}

function date_fr($date) {
	$Day = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
	$Month = array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	return $Day[date("w", $date)] . " " . date("d", $date) . " " . $Month[date("n", $date)] . " " . date("Y", $date);
}

function comment($name, $comment) {
	global $dbWeb;
	
	$c = array(
		'name' => $name,
		'comment' => $comment,
		'post_id' => htmlspecialchars($_GET['id'])
	);
	
	$sql = "INSERT INTO news_comments(name, comment, post_id, date) VALUES (:name,:comment,:post_id,NOW())";
	$req = $dbWeb->prepare($sql);
	$req->execute($c);
}

function get_comments() {
	global $dbWeb;
	$req = $dbWeb->query("SELECT name, comment, date FROM news_comments WHERE post_id = '{$_GET['id']}' ORDER BY date DESC");
	$results = [];
	while ($rows = $req->fetchObject()) {
		$results[] = $rows;
	}
	return $results;
}