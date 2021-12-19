<?php
function compressImage($source, $destination) {
	
	$info = getimagesize($source);
	
	if ($info['mime'] == 'image/jpeg')
		$image = imagecreatefromjpeg($source);
	
	elseif ($info['mime'] == 'image/gif')
		$image = imagecreatefromgif($source);
	
	elseif ($info['mime'] == 'image/png')
		$image = imagecreatefrompng($source);
	
	imagejpeg($image, $destination, 60);
}

function post($title, $content, $posted) {
	global $dbWeb;
	$p = [
		'title' => $title,
		'content' => $content,
		'posted' => $posted,
		'writer' => $_SESSION['connectedUser']
	];
	$sql = "INSERT INTO news_post(title, content, writer, date, public) VALUES (:title,:content,:writer,NOW(),:posted)";
	$req = $dbWeb->prepare($sql);
	$req->execute($p);
}

function post_img($tmp_name,$extension){
	global $dbWeb,$baseWebSiteDirectory;
	$id = $dbWeb->lastInsertId();
	$i = [
		'id' => $id,
		'image' => $id . $extension
	];
	$sql = "UPDATE news_post SET image = :image WHERE id = :id";
	$req = $dbWeb->prepare($sql);
	$req->execute($i);
	$path = $baseWebSiteDirectory . '/uploads/images/news_images/';
	compressImage($tmp_name,$path . $id.$extension);
	header("Location:index.php?page=post&id=".$id);
}
?>