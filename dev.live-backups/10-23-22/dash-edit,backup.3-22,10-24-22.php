<?php 
/* The following code will prevent any user, who is not the author, from seeing this page,
including visitors; these other users will be redirected back to the display page, of the post. */
include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php';
$post_author_username = $_GET['author'];
$post_ID = $_GET['post_ID'];
$output = check_edit_perm($post_author_username);
if ($output != 1) {
	header("Location: http://personal-dash/index.php");
	// correct.header-redir: header("Location: post.post-number.php?post_ID=$post_ID"); 
	// correct-URL: include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php';
}
?>
<html>
<body>
<h1>Dash-edit.php</h1>
<p><a href="process-redir/log.out-redir">Log-out</a></p>
<?php 
require 'C:\wamp64\www\personal-dash\php_local_libs\db.conn-inc.php';
require 'C:\wamp64\www\personal-dash\php_local_libs\mysql.query-inc.php';
?>
<!-- // Form submission issue: when an apostraphe is included, text does not enter into db, and there's no feedback for user #
Try WP.MIC-H2S35 H3S3 H4S6 later # -->
<table><tr><th>Rank#</th><th>Text-field</th><th>URL-field</th></tr>
<form action="process-redir/edit-mysql-redir.php?author=<?php echo $post_author_username; ?>&post_ID=<?php echo $post_ID; ?>" method="post">
  
  <!-- loop-chunk # -->
  <tr><td>1:</td>
  <td><input type="text" id="text1" name="text1" value="<?php
  // the updated text is not displayed, immediately after clicking save; the page has to be refreshed
  // however, I can circumvent this, by re-directing users back to the display page, following refresh # 
	echo select_single_grid($post_author_username, $post_ID, 'text1');?>" minlength="1" maxlength="18"></td>
  <td><input type="text" id="url1" name="url1" value="<?php echo select_single_grid($post_author_username, $post_ID, 'url1');?>" minlength="1" maxlength="200"></td></tr>
  <!-- end.loop-chunk # -->
  
  <tr><td>2:</td>
  <td><input type="text" id="text2" name="text2" value="<?php echo select_single_grid($post_author_username, $post_ID, 'text2');?>" minlength="1" maxlength="18"></td>
  <td><input type="text" id="url2" name="url2" value="<?php echo select_single_grid($post_author_username, $post_ID, 'url2');?>" minlength="1" maxlength="200"></td></tr>
  <tr><td>3:</td>
  <td><input type="text" id="text3" name="text3" value="<?php echo select_single_grid($post_author_username, $post_ID, 'text3');?>" minlength="1" maxlength="18"></td>
  <td><input type="text" id="url3" name="url3" value="<?php echo select_single_grid($post_author_username, $post_ID, 'url3');?>" minlength="1" maxlength="200"></td></tr>
  <tr><td>4:</td>
  <td><input type="text" id="text4" name="text4" value="<?php echo select_single_grid($post_author_username, $post_ID, 'text4');?>" minlength="1" maxlength="18"></td>
  <td><input type="text" id="url4" name="url4" value="<?php echo select_single_grid($post_author_username, $post_ID, 'url4');?>" minlength="1" maxlength="200"></td></tr>
  <tr><td>5:</td>
  <td><input type="text" id="text5" name="text5" value="<?php echo select_single_grid($post_author_username, $post_ID, 'text5');?>" minlength="1" maxlength="18"></td>
  <td><input type="text" id="url5" name="url5" value="<?php echo select_single_grid($post_author_username, $post_ID, 'url5');?>" minlength="1" maxlength="200"></td></tr>
  <tr><td>6:</td>
  <td><input type="text" id="text6" name="text6" value="<?php echo select_single_grid($post_author_username, $post_ID, 'text6');?>" minlength="1" maxlength="18"></td>
  <td><input type="text" id="url6" name="url6" value="<?php echo select_single_grid($post_author_username, $post_ID, 'url6');?>" minlength="1" maxlength="200"></td></tr>
  <tr><td>7:</td>
  <td><input type="text" id="text7" name="text7" value="<?php echo select_single_grid($post_author_username, $post_ID, 'text7');?>" minlength="1" maxlength="18"></td>
  <td><input type="text" id="url7" name="url7" value="<?php echo select_single_grid($post_author_username, $post_ID, 'url7');?>" minlength="1" maxlength="200"></td></tr>
  <tr><td>8:</td>
  <td><input type="text" id="text8" name="text8" value="<?php echo select_single_grid($post_author_username, $post_ID, 'text8');?>" minlength="1" maxlength="18"></td>
  <td><input type="text" id="url8" name="url8" value="<?php echo select_single_grid($post_author_username, $post_ID, 'url8');?>" minlength="1" maxlength="200"></td></tr>
  <tr><td>9:</td>
  <td><input type="text" id="text9" name="text9" value="<?php echo select_single_grid($post_author_username, $post_ID, 'text9');?>" minlength="1" maxlength="18"></td>
  <td><input type="text" id="url9" name="url9" value="<?php echo select_single_grid($post_author_username, $post_ID, 'url9');?>" minlength="1" maxlength="200"></td></tr></table>
  <input type="submit" name="submit" value="Save">
</form>
</body>
</html>

<!-- dev.live-URL http://personal-dash/dash-edit.php?author=blind&post_ID=1 -->

<!-- Testing changelog, in reverse-chron
17:53 PM 10/23/22: 
	1. URL form field generated. 
	To SELECT the default value, swapped $sql 4 lines with a single line function call to mysql.query-inc, 
	a php-inc, select_single_grid with 3 arguments, 2 variable passes, and 1 hard code<Turing!>
		Test passed: correct URL pre-filled the line. 
		Test pending: update cannot be tested yet, for this line. 
	1. Text form field, replaced, with same function clal. 
		Test passed. 
	2. Text and URL generated. Table generated, around content. Deleted labels,
	substituted for table headers. Other styling changes. 
		Test passed: Table format is correct. All 4 fields, filled properly. 
	3-9 Text and URL generated. Database +14 columns, with titles. 
		Tests passed: 9 fields displayed properly, with form rows.
		Test pending: Update those fields. 
		Testing pending: See if rows are properly displayed, after updating. 
	Edit-redir link updated, to reflect folder: 
		Test pending. 
6:27 AM EDT, 10/21/22:
	Log-out button added, beneath all-HTML # 
		Test: 
			Button is displayed ✅
			When clicked, log-out + redirect to index.php ✅
			MySQL-update test ✅
2:17 AM EDT, 10/21/22:
	session_start(); added to the top of php. 
		Test: Page still loads, with form displayed. ✅
		Test: Form input, still updates the MySQL-tb. ✅
1:11 AM EDT, 10/20/22:
	Variable declaration added to global-header: $post_author_username = $_GET['author'];
		Page still loads ✅, when arrived at, from ?author=blind&post_ID=1
	Link to edit-mysql-redir updated to include dynamic author propagation:
		<form action="edit-mysql-redir.php?author=<?php echo $post_author_username; ?>&post_ID=<?php echo $post_ID; ?>" method="post">
		Test pending change to edit-mysql-redir...
		Test: after entering a new value in the form, and clicking save, should redirect to post.post-number in total, with correct URL:
			http://personal-dash/post.post-number.php?author=blind&post_ID=1
			Test passed ✅
	SELECT statement updated:
		$sql = "SELECT text1 FROM dash_{$post_author_username}_posts WHERE post_ID=$post_ID"; 
		Form still pre-fills, with correct text1-val: ✅
	$output = check_edit_perm($post_author_username);
		author=blind, page loads ✅
		author=lucy, page redirects back to index.html<see-below> ✅
	header("Location: http://personal-dash/index.html");
		Header redirect changed, to go to homepage: ✅
21:04 pm EDT 10/19/22:
	Added code from conditional.static-redir,test.php
	Test.case-1: check_edit_perm('blind');
		Result: Viewers can see the page. 
	Test.case-2: check_edit_perm('lucy');
		Failed: Redirected, but to wrong URL: http://personal-dash/post.post-number.php?post_ID=
		Fix: Re-add the $_GET retrieval, to above the $output declaration: $post_ID = $_GET['post_ID'];
		Test passed: redirected, to correct URL: http://personal-dash/post.post-number.php?post_ID=1
	Dependency.test-1: check_edit_perm('blind');
		Database update function continues to work. All tests passed. 
-->
