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
	foreach ($administrators as $administrator) {
		if (has_mini_perm("modo", $_SESSION['connectedUser'])) {
			echo(writeMember($administrator));
		}
	}
	foreach ($moderators as $moderator) {
		if (has_mini_perm("admin", $_SESSION['connectedUser'])) {
			echo(writeMember($moderator));
		}
	}
	foreach ($writers as $writer) {
		if (has_mini_perm("admin", $_SESSION['connectedUser'])) {
			echo(writeMember($writer));
		}
	}
	foreach ($youtubers as $youtuber) {
		if (has_mini_perm("modo", $_SESSION['connectedUser'])) {
			echo(writeMember($youtuber));
		}
	}
	foreach ($members as $member) {
		if (has_mini_perm("modo", $_SESSION['connectedUser'])) {
			echo(writeMember($member));
		}
	}
	?>
	</tbody>
</table>