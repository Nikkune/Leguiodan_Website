<?php
if (!has_mini_perm("writer",$_SESSION['connectedUser'])){
	header("Location:index.php?page=dashboard");
}
?>
<h2>Listing des articles</h2>
<hr/>
<?php
$news_posts = get_news_post();
foreach ($news_posts as $news_post){
	?>
	<div class="row mb-4">
		<div class="col">
			<h4><?=$news_post->title?> <?php if (!$news_post->public){echo '<i class="bi bi-lock-fill"></i>';}?></h4>
			<div class="row row-cols-2">
				<div class="col-8">
					<?=substr(nl2br($news_post->content),0,1550) . "..."?>
				</div>
				<div class="col-4">
					<img src="<?=$baseWebSite?>/uploads/images/news_images/<?=$news_post->image?>" class="img-fluid img-thumbnail" alt="<?=$news_post->title?>">
					<br/><br/>
					<!--suppress HtmlUnknownTarget -->
					<a href="index.php?page=post&id=<?=$news_post->id?>" class="btn btn-primary">Lire l'article complet</a>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>