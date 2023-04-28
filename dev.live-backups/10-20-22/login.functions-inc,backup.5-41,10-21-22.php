<?php
session_start();

function empty_sess_uname_check() {
	if (empty($_SESSION['username'])) {
		$_SESSION['username'] = 'visitor';
		// This $_SESSION['username'] does not need to be returned. 
	}
}

function check_edit_perm($post_author_username) {
	empty_sess_uname_check();
	if ($_SESSION['username'] == $post_author_username) {
		return True;
	}
}

// echo check_edit_perm('blind'); 
?>

<!-- testing-log 
2:30 AM 10/21/22:
	From function check_edit_perm: 
		Removed $session_username variable declaration. 
		Substituted $session_username variable for $_SESSION['username'] superglobal in the if header. 
		When username is set to 'lucy' on login.php, post.post-number.php, which calls check_edit_perm, 
		does not display Edit. 
			Test passed. 
		When username is set to 'blind', Edit is displayed. 
			Test passed. 
	Assignment of username, when $_SESSION['username'] is empty:
		Add empty_sess_uname_check() call to function check_edit_perm.
		Without a login, users should not see Edit, on post.post-number.php ✔️
		Post.post-number should still load ✔️
-->
