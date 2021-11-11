<?php
require('assets/jbbcode/Parser.php');
$guide = get_guide();
if ($guide == false) {
	header("Location:index.php?page=error");
} else {
?>
<div class="container" id="bbcode_display">
	<h2><?= $guide->title ?></h2>
	<h6>Par <?= $guide->name ?> Le <?= date_fr(strtotime($guide->date)) . " à " . date("H:i", strtotime($guide->date)); ?></h6>
	<?php
	$parser = new JBBCode\Parser();
	$parser->addCodeDefinitionSet(new JBBCode\DefaultCodeDefinitionSet());
	$parser->addBBCode("center", '<div class="text-center">{param}</div>');
	$parser->addBBCode("size", '<div style="font-size: calc({option}px / 5);">{param}</div>', true);
	$parser->addBBCode("font", '<div style="font-family: {option};">{param}</div>', true);
	$parser->addBBCode("quote", '<blockquote class="blockquote">{param}</blockquote>');
	$parser->addBBCode("code", '<div class="card text-white bg-dark mb-3"><div class="card-body"><p class="card-text">{param}</p></div></div>');
	$parser->parse($guide->content);
	echo $parser->getAsHTML();
	?>
	<?php
	}
	?>
</div>