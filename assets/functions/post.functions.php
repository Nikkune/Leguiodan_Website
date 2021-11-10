<?php /** @noinspection DuplicatedCode */
function get_post(){
	global $dbWeb;
	$req = $dbWeb->query("SELECT news_post.title,news_post.content,news_post.image,news_post.date,members.name FROM news_post JOIN members ON news_post.writer = members.email WHERE news_post.id = '{$_GET['id']}'");
	$result = $req->fetchObject();
	return $result;
}

function date_fr($date){
	$Day = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
	$Month = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
	return $Day[date("w",$date)] . " " . date("d",$date) . " " . $Month[date("n",$date)] . " " . date("Y",$date);
}