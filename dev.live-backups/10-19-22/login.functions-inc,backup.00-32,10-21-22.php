<?php
function check_edit_perm($post_author_username) {
	$session_username = 'blind';
	if ($session_username == $post_author_username) {
		return True;
	}
}
// echo check_edit_perm('blind'); 
?>

