$(document).ready(function (){
	$(".promote_member").click(function (){
		var id = $(this).attr('id');
		$.post('assets/ajax/promote_member.php',{id:id}, function (){
			window.location.replace("index.php?page=membersList");
		});
	});

	$(".demote_member").click(function (){
		var id = $(this).attr('id');
		$.post('assets/ajax/demote_member.php',{id:id}, function (){
			window.location.replace("index.php?page=membersList");
		});
	});

	$(".delete_member").click(function (){
		var id = $(this).attr('id');
		$.post('assets/ajax/delete_member.php',{id:id}, function (){
			$("#membre_"+id).hide();
		});
	});
})