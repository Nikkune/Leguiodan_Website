$(document).ready(function (){
	$(".see_comment").click(function (){
		var id = $(this).attr('id');
		$.post('assets/ajax/see_comment.php',{id:id}, function (){
			$("#commentaire_"+id).hide();
		});
	});

	$(".delete_comment").click(function (){
		var id = $(this).attr('id');
		$.post('assets/ajax/delete_comment.php',{id:id}, function (){
			$("#commentaire_"+id).hide();
		});
	});
})