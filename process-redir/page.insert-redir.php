<?php 
require 'C:\wamp64\www\personal-dash\php_local_libs\db.conn-inc.php'; 
require 'C:\wamp64\www\personal-dash\php_local_libs\mysql.query-inc.php'; 
$session_username = $_SESSION['username'];
$post_ID = highest_post_ID_sess() + 1;
$post_title = $_POST["layer"] . '-dash: ' . $_POST["page_name"];
// echo $post_ID; 
echo $post_title; 
$sql = "INSERT INTO dash_{$session_username}_posts (post_ID, post_title, text1, url1, text2, url2, text3, url3, text4, url4, text5, url5, text6, url6, text7, url7, text8, url8, text9, url9, notes, back_url, attributes) VALUES ('$post_ID', '$post_title', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'null=null;')";
	$conn->query($sql); 
  // echo $sql; 
  echo $conn->error;
header("Location: http://personal-dash/dash-edit.php?author=$session_username&post_ID=$post_ID"); 
?>

<!-- Dev-url: http://personal-dash/process-redir/page.insert-redir.php -->
<!-- Testing-log: 
	00:09 AM 10/27/22:
		Added support for 'attributes' column, added a default value 'null=null;' to avoid empty array errors. 
			Test passed. Page inserted, no error. 
	3:22 AM 10/25/22:
		Added support for 'back_url' column. 
			Test passed: page.creation-functionality unencumbered # 
	18:40 PM: 10/24/22:
		Added support for notes column. 
			Test passed: page.creation-functionality unencumbered # 
	18:16 PM: 10/24/22:
		Text.url-3,9 added to $sql = "INSERT
		Tests passed: 
			9 columns x 2 inserted null default, row added to MySQL, dash-edit redirect displayed, w/ correct URL. 
	5:17 AM:
		Added mysql.query-inc.php require. 
		Added call to highest_post_ID_sess() to add one to its return, and assign to $post_ID; 
		Use this variable to write INSERT to db, $post_ID + 1 from last highest #
			Test: Using input form from page.create-form,test.php:
				Test passed: row was made. 
				Test passed: row $post_ID was +1 from last $post_ID. 
				Test passed: other data was isnerted correctly # 
	00:10 AM: 
		All text and url values erased. $_POST["page_name"] variable swapped in for post_title. 
		Test: fill out the form on page.create-form,test.php, and see if row is inserted, with the user-entered post_title. 
			Test-passed: Row is inserted, with the correct post title, with the syntax '{$_POST["page_name"]}'
		Added compiling $post_title variable, with 2 $_POST inputs, and one static input. 
		Swapped $_POST["page_name"] in insert VALUES with '$post_title'
			Test-passed. 
		Added session_start(); Propagate session name into dash-edit URL. 
			Test passed: username propagated into header w/ correct resulting URL. 
		Swapped hard-coded 'blind' for {$session_username} in tb-name param of INSERT:
			Test passed: no insertion is made, if username is not found in db as a tb-name. 
			Test passed: when 'blind' is the $_SESSION['username'], a record is made, and redirect still works. 