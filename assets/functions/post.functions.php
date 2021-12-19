<?php
function get_post() {
	global $dbWeb;
	$req = $dbWeb->query("SELECT news_post.id,news_post.title,news_post.content,news_post.image,news_post.date,news_post.public,members.name FROM news_post JOIN members ON news_post.writer = members.email WHERE news_post.id = '{$_GET['id']}'");
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
	
	$sql = "UPDATE news_post SET title=:title, content=:content, public=:posted WHERE id=:id";
	$req = $dbWeb->prepare($sql);
	$req->execute($e);
}
?>