<?php
function name_taken($name) {
	global $dbWeb;
	$e = ['name' => $name];
	$sql = "SELECT id FROM files_tables WHERE title = :name";
	$req = $dbWeb->prepare($sql);
	$req->execute($e);
	$free = $req->rowCount($sql);
	
	return $free;
}

function insertFile($name, $type, $ext, $desc, $public, $dl) {
	global $dbWeb;
	if ($type == 'illus') {
		$file = 'images/base/' . $name . $ext;
	} else {
		$file = 'files/others/' . $name . $ext;
	}
	$e = ['title' => $name,
		'type' => $type,
		'description' => $desc,
		'public' => $public,
		'download' => $dl,
		'file' => $file
	];
	$sql = "INSERT INTO files_tables(title, type, file, description, date, public, download) VALUES(:title,:type,:file,:description,NOW(),:public,:download)";
	$ins = $dbWeb->prepare($sql);
	$ins->execute($e);
}

function moveFile($name, $type, $ext) {
	global $baseWebSite, $ftp_host, $ftp_user_name, $ftp_user_pass;
	if ($type == 'illus') {
		$file = $baseWebSite . 'images/base/' . $name . $ext;
	} else {
		$file = $baseWebSite . 'files/others/' . $name . $ext;
	}
	
	/* Remote File Name and Path */
	$remote_file = $file;
	
	/* File and path to send to remote FTP server */
	$local_file = 'tmpsFiles' . $name . $ext;
	
	/* Connect using basic FTP */
	$connect_it = ftp_connect($ftp_host);
	
	/* Login to FTP */
	$login_result = ftp_login($connect_it, $ftp_user_name, $ftp_user_pass);
	
	/* Send $local_file to FTP */
	if (ftp_put($connect_it, $remote_file, $local_file, FTP_BINARY)) {
		echo "WOOT! Successfully transfer $local_file\n";
	} else {
		echo "Doh! There was a problem\n";
	}
	
	/* Close the connection */
	ftp_close($connect_it);
	
}
?>