<?php /** @noinspection DuplicatedCode */
function get_guide() {
	global $dbWeb;
	$req = $dbWeb->query("SELECT guides_post.title,guides_post.content,guides_post.date,members.name FROM guides_post JOIN members ON guides_post.writer = members.email WHERE guides_post.id = '{$_GET['id']}' AND public = '1'");
	$result = $req->fetchObject();
	return $result;
}
