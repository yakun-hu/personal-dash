<?php
if(session_status() === PHP_SESSION_NONE) {
	session_start();
}
require 'C:\wamp64\www\personal-dash\php_local_libs\db.conn-inc.php'; 
function highest_post_ID_sess() {
	$session_username = $_SESSION['username'];
	$sql = "SELECT post_ID FROM dash_{$session_username}_posts ORDER BY post_ID DESC LIMIT 1"; 
	global $conn; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	$post_ID = $row["post_ID"]; 
	// print_r($row); 
	// echo $post_ID; 
	return $post_ID; 
} 
// highest_post_ID_sess();
function full_post_list_select1() {
	$session_username = $_SESSION['username'];
	$sql = "SELECT post_ID, post_title FROM dash_{$session_username}_posts ORDER BY post_ID DESC"; 
	global $conn; 
	$result = $conn->query($sql); 
	return $result; 
} 
function select_single_grid($post_author_username, $post_ID, $column) {
	$sql = "SELECT $column FROM dash_{$post_author_username}_posts WHERE post_ID=$post_ID"; 
	global $conn; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	return $row["$column"]; 
} 
function attributes_parse($post_author_username, $post_ID) {
	$attributes = select_single_grid($post_author_username, $post_ID, 'attributes');
	$attributes_char_array = str_split($attributes); 
	$pair = '';
	foreach($attributes_char_array as $char) {
		if ($char == ';') {
			$key = strtok($pair, "=");
			$value = strtok("=");
			$attributes_assoc_array[$key] = $value;
			$pair = '';
		} else {
			$pair = $pair . $char; 
		}
	}
	return $attributes_assoc_array;
}
/* This function will be called 9x every time post.post-number loads; monitor its E on load-times
https://www.wordpress.materialinchess.com/2022/10/13/h2s34-speed-optimizations-for-wordpress/ */
function check_private($url) {
	strtolower($url);
	if (str_contains($url, 'personal-dash')) {  
		$strpos = strpos($url, '?') + 1; 
		$substr = substr($url, $strpos, null); 
		strtok($substr, '=');
		$post_author_username = strtok('&');
		// echo $post_author_username;
		strtok('=');
		$post_ID = strtok('');
		// echo $post_ID;
		$attributes = attributes_parse($post_author_username, $post_ID); 
		if (array_key_exists("private", $attributes)) { 
			if ($attributes["private"] == "true") {
				return true;
			}
		} 
	}
} ?>
<!-- test-url: http://personal-dash/php_local_libs/mysql.query-inc.php --> 
<!-- test-changelog: 
	6:56 AM 10/28/22: 
		Added function check_private($url) {, returns true, if the passed URL has private setting, true. 
		Test: 
	3:11 AM 10/26/22:
		Added function attributes_parse, which was tested in link.target-check,box.test-4.php 
		Test passed: attribute successfully retrieved, when dash-edit loads. 
	17:53 PM 10/23/22: 
		function select_single_grid added. Testing at dash-edit.php, same time. 
		session_start(); at doc-type replaced with a conditional that checks #
		session_status, and only triggers session_start, if NONE, to avoid
		redundancy notice, by https://www.wordpress.materialinchess.com/2022/10/23/h2s59-intra-threading-chained-includes-and-calls/
			Tests:
				Notice removed, when this doc is the second include. 
					Test passed. 
				Full post list at page-list.php still loads correctly. 
					Test passed. 
				Add posts function at page.create-form.php start, process:
					Test passed, page can still be created. 
	2:20 AM 10/23/22:
		full_post_list_select() function imported from db.full-list,test. 
		Dependency altered on page-list.php
		Page-load functionality continues to work. Multiple entries are displayed. 
			Test passed. 
	🟡 Testing.to-do[1]: see 16:16 PM 10/22/22: 
		Technically, I don't know # if the LIMIT worked, or was ineffective. 
		I would need to write a fetch loop in order to test this. Will do this some time later. 
	16:16 PM 10/22/22: 
		LIMIT clause added to highest_post_ID_sess() SELECT: 
		Ref: https://www.w3schools.com/mysql/mysql_limit.asp
		Test:
			Ran page w/ uncommented function call and echo, highest # still returned. 
				Test passed. 	
	4:53 AM 10/22/22: 
		highest_post_ID_sess(); call test: global declaration added to $conn variable only.
			Test passed: returned 45. -->