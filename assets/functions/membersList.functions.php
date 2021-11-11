<?php
function get_members($role) {
	global $dbWeb;
	$sql = "SELECT id,name,email,verified,role FROM members WHERE role='" . $role . "' ORDER BY id DESC";
	$req = $dbWeb->query($sql);
	
	$results = [];
	
	while ($rows = $req->fetchObject()) {
		$results[] = $rows;
	}
	
	return $results;
}

function writeMember($memberInfo) {
	if ($memberInfo->role != 5) {
		if ($memberInfo->role != 1) {
			$demote = '<a href="#" id="' . $memberInfo->id . '" class="btn btn-warning shadow rounded rounded-circle demote_member"><i class="bi bi-arrow-down text-light"></i></a>';
		} else {
			$demote = '<a href="#" id="' . $memberInfo->id . '" class="btn btn-warning shadow rounded rounded-circle demote_member disabled"><i class="bi bi-arrow-down text-light"></i></a>';
		}
		
		if ($memberInfo->role != 4) {
			$promote = '<a href="#" id="' . $memberInfo->id . '" class="btn btn-success shadow rounded rounded-circle promote_member"><i class="bi bi-arrow-up text-light"></i></a>';
		} else {
			$promote = '<a href="#" id="' . $memberInfo->id . '" class="btn btn-success shadow rounded rounded-circle promote_member disabled"><i class="bi bi-arrow-up text-light"></i></a>';
		}
		
		$action = '<td>
					' . $promote . '
					' . $demote . '
					<a href="#" id="' . $memberInfo->id . '" class="btn btn-danger shadow rounded rounded-circle delete_member"><i class="bi bi-trash-fill text-light"></i></a>
				</td>';
	} else {
		$action = '<td><strong>Pas d\'action à faire !</strong></td>';
	}
	if ($memberInfo->verified) {
		$icon = '<i class="bi bi-shield-fill-check"></i>';
	} else {
		$icon = '<i class="bi bi-shield-slash-fill"></i>';
	}
	
	return '<tr id="membre_' . $memberInfo->id . '">
				<td><h5>' . $memberInfo->name . '</h5></td>
				<td><h5>' . $memberInfo->email . '</h5></td>
				<td><h5>' . get_role_name($memberInfo->role) . '</h5></td>
				<td><h3>' . $icon . '</h3></td>
				' . $action . '
			</tr>';
}

function get_role_name($role) {
	switch ($role) {
		case 1:
			return '<i class="bi bi-person-fill"></i> Membre';
		case 2:
			return '<i class="bi bi-youtube"></i> Youtuber';
		case 3:
			return '<i class="bi bi-pen"></i> Écrivain';
		case 4:
			return '<i class="bi bi-wrench"></i> Modérateur';
		case 5:
			return '<i class="bi bi-code-slash"></i> Administrateur';
		default:
			return '<i class="bi bi-bug-fill"></i> Erreur';
	}
}