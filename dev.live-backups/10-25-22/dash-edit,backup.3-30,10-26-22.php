<html><head><style></style></head>
<?php /* The following code will prevent any user, who is not the author, from seeing this page,
including visitors; these other users will be redirected back to the display page, of the post. */
include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php';
$output = check_edit_perm($_GET['author']);
if ($output != 1) {
	header("Location: http://personal-dash/index.php");
	// correct.header-redir: header("Location: post.post-number.php?post_ID=$post_ID"); 
	// correct-URL: include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php';
}?>
<?php require 'C:\wamp64\www\personal-dash\php_local_libs\db.conn-inc.php';
require 'C:\wamp64\www\personal-dash\php_local_libs\mysql.query-inc.php'; ?>
<body><h1>Dash-edit.php</h1>
<a href="process-redir/log.out-redir">Log-out</a><br><br>
<!-- // Form submission issue: when an apostraphe is included, text does not enter into db, and there's no feedback for user #
Try WP.MIC-H2S35 H3S3 H4S6 later # -->
<form action="process-redir/edit-mysql-redir.php?author=<?php echo $_GET['author']; ?>&post_ID=<?php echo $_GET['post_ID']; ?>" method="post">
Page name: <input type="text" name="post_title" value="<?php echo select_single_grid($_GET['author'], $_GET['post_ID'], 'post_title'); ?>" minlength="1" maxlength="25">
<p>Back_url: <input type="text" name="back_url" value="<?php echo select_single_grid($_GET['author'], $_GET['post_ID'], 'back_url'); ?>" minlength="1" maxlength="99"></p>
<table><tr><th>Rank#</th><th>Text-field</th><th>URL-field</th><th>New-tab</th></tr>
<?php for ($x = 1; $x <= 9; $x++) {
	$url_column = 'url' . $x;
	$text_column = 'text' . $x;?>
  <tr><td><?php echo $x;?>:</td>
  <td><input type="text" id="text<?php echo $x;?>" name="text<?php echo $x;?>" value="<?php
  // the updated text is not displayed, immediately after clicking save; the page has to be refreshed
  // however, I can circumvent this, by re-directing users back to the display page, following refresh # 
	echo select_single_grid($_GET['author'], $_GET['post_ID'], $text_column);?>" minlength="1" maxlength="200"></td>
  <td><input type="text" id="url<?php echo $x;?>" name="url<?php echo $x;?>" value="<?php echo select_single_grid($_GET['author'], $_GET['post_ID'], $url_column);?>" minlength="1" maxlength="200"></td>
  <td><input type="checkbox" id="target<?php echo $x;?>" name="target<?php echo $x;?>" checked value="_blank"></td></tr>
<?php }?></table><input type="submit" name="submit" value="Save"><br><br>
Notes:<br>
<textarea style="width:400px;min-height:200px;vertical-align: top;" class="notes" type="text" id="notes" name="notes" minlength="1" maxlength="2000000"><?php
  // the updated text is not displayed, immediately after clicking save; the page has to be refreshed
  // however, I can circumvent this, by re-directing users back to the display page, following refresh # 
	echo select_single_grid($_GET['author'], $_GET['post_ID'], 'notes');?></textarea>
</form></body></html>
<!-- dev.live-URL http://personal-dash/dash-edit.php?author=blind&post_ID=1 -->
<!-- Testing changelog, in reverse-chron:
5:52 AM 10/25/22: 
	Added display of 9 additional checkbox fields, one per row. 
		Tests passed: checkboxes displayed, can be interacted, as expected. 
		Tests pending: dependency testing. 
3:46 AM 10/25/22: 
	Added 2 new fields: page-name, which allows the page_title to be edited, and back_url. 
		Tests-passed: fields displayed, users can enter text in them. 
2:31 AM 10/25/22: 
	<textarea> default value supported. 
		Test-passed: Users can edit the default value, extracted from db, and it is displayed, in the <textarea> box, before editing. 	
2:04 AM 10/25/22:
	Added <textarea>: H3S1 H4S5: https://www.wordpress.materialinchess.com/2022/10/21/h2s55-basic-html-syntax-lib/
	to capture 'notes' column input, mapped to name="notes", to prepare $_POST reception in edit-mysql-redir.php. 
	Added styling. 
		Tests passed: 400x200 textarea box displayed, with notes label, below <table>
		Test pending: all form inputs still work, notes input enabled. 
18:34 PM 10/24/22:
	Page name dynamic load w/ select_single_grid function added, selecting post_title. 
		Tests passed: UI looks as expected, page name is now displayed. 
6:35 AM 10/24/22:
	Form action swapped with superglobals. 
		Tests-passed:
			Redirect all to post.post-number still functional. 
			Update functionality still works. 
	Header check_edit_perm call swapped with superglobals. select_single_grid swapped with superglobals. 
	All superglobals swapped in for extraneous variables. 
		Tests-passed: 
			Display and update functionality, all still working. 
5:30 AM 10/24/22:
	For loop implemented, to render table. 
		Tests passed: table integrity maintained. All select statements, still displaying correct columns. Update
		functionality after form submission still works. 
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
