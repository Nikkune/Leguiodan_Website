<?php
function postGuides($title, $content, $posted) {
	global $dbWeb;
	$p = [
		'title' => $title,
		'content' => $content,
		'posted' => $posted,
		'writer' => $_SESSION['connectedUser']
	];
	$sql = "INSERT INTO guides_post(title, content, writer, date, public) VALUES (:title,:content,:writer,NOW(),:posted)";
	$req = $dbWeb->prepare($sql);
	$req->execute($p);
}
?>