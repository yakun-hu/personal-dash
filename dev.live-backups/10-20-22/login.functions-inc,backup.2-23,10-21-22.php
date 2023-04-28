<?php
function check_edit_perm($post_author_username) {
	$session_username = 'blind';
	if ($session_username == $post_author_username) {
		return True;
	}
}

function empty_sess_uname_check() {
	if (empty($_SESSION['username'])) {
		$_SESSION['username'] = 'visitor';
		// This $_SESSION['username'] does not need to be returned. 
	}
}
// echo check_edit_perm('blind'); 
?>

