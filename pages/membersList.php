<h2>Liste des membres</h2>
<?php
$members = get_members('1');
$youtubers = get_members('2');
$writers = get_members('3');
$moderators = get_members('4');
$administrators = get_members('5');
?>
<table class="table">
	<thead>
	<tr>
		<th scope="col">Nom</th>
		<th scope="col">Email</th>
		<th scope="col">Role</th>
		<th scope="col">Verification</th>
		<th scope="col">Actions</th>
	</tr>
	</thead>
	<tbody>
	<?php
	if (has_mini_perm("modo", $_SESSION['connectedUser'])) {
		foreach ($administrators as $administrator) {
			echo(writeMember($administrator));
		}
		foreach ($members as $member) {
			echo(writeMember($member));
		}
		foreach ($youtubers as $youtuber) {
			echo(writeMember($youtuber));
		}
	}
	if (has_mini_perm("admin",$_SESSION['connectedUser'])){
		foreach ($writers as $writer) {
			echo(writeMember($writer));
		}
		foreach ($moderators as $moderator) {
			echo(writeMember($moderator));
		}
	}
	?>
	</tbody>
</table>