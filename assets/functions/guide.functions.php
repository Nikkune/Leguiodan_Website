<?php
function get_post() {
	global $dbWeb;
	$req = $dbWeb->query("SELECT guides_post.id,guides_post.title,guides_post.content,guides_post.date,guides_post.public,members.name FROM guides_post JOIN members ON guides_post.writer = members.email WHERE guides_post.id = '{$_GET['id']}'");
	$result = $req->fetchObject();
	return $result;
}

function edit($title, $content, $posted,$id){
	global $dbWeb;
	$e = [
		'title' => $title,
		'content' => $content,
		'posted' => $posted,
		'id' => $id
	];
	
	$sql = "UPDATE guides_post SET title=:title, content=:content, public=:posted WHERE id=:id";
	$req = $dbWeb->prepare($sql);
	$req->execute($e);
}
?>