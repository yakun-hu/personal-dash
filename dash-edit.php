<html><?php /* The following code will prevent any user, who is not the author, from seeing this page, including visitors; these other users will be redirected back to the display page, of the post. */
require 'php_local_libs\mysql.query-inc.php'; include 'php_local_libs\login.functions-inc.php'; $check_edit_perm_bool = check_edit_perm($_GET['author']); if ($check_edit_perm_bool != 1) { header("Location: http://personal-dash/index.php"); } /* correct.header-redir: header("Location: post.post-number.php?post_ID=$post_ID"); correct-URL: include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php'; */ 
/* Global-header: */ $attributes = attributes_parse($_GET['author'], $_GET['post_ID']); // print_r($attributes); 
if (isset($_GET['back_author'])) { $back_author = $_GET['back_author'];	$back_ID = $_GET['back_ID']; } ?>
<body onload="notes.selectionStart=10**7;notes.focus();" style="margin:10px;border-left:1px solid #2196F3;"><div style="margin-left:10px"><h1 style="display:inline;color:9F8E80;background-color:99A4AC">Dash-edit.php:</h1><p style="display:inline;margin-left:200px"><a href="post.post-number.php?author=<?php echo $_GET['author']; ?>&post_ID=<?php echo $_GET['post_ID']; ?>">Cancel</a> | <a href="process-redir/log.out-redir"><i>Log-out</i></a></p>
<!-- // Form submission issue: when an apostraphe is included, text does not enter into db, and there's no feedback for user # Try WP.MIC-H2S35 H3S3 H4S6 later # -->
<form action="process-redir/edit-mysql-redir.php?author=<?php echo $_GET['author']; ?>&post_ID=<?php echo $_GET['post_ID']; ?>" method="post" id="主式">
<p>Private:<input type="checkbox" id="private" name="private" style="vertical-align:sub;"<?php if (array_key_exists("private", $attributes)) { if ($attributes["private"] == "true") { echo "checked"; }}?> value="true">Page name: <input style="margin-top:3px;width:150px" type="text" name="post_title" value="<?php $page_n = select_single_grid($_GET['author'], $_GET['post_ID'], 'post_title'); echo $page_n; ?>" minlength="1" maxlength="25"> Back_<b>url</b>: <input type="text" name="back_url" style="width:140px" value="<?php if (isset($_GET['back_author'])) { echo 'post.post-number.php?&author=' . $back_author . '&post_ID=' . $back_ID; } else { echo select_single_grid($_GET['author'], $_GET['post_ID'], 'back_url'); } ?>" minlength="1" maxlength="99">
<table><tr><th><h4>Rank#</h4></th><th><h4>Text-field</h4></th><th><h4>URL-field</h4></th><th><h4 style="background-color:608ABD;color:CD8D5E">New-tab?</h4></th></tr></h4>
<?php for ($x = 1; $x <= 9; $x++) { $url_column = 'url' . $x; $text_column = 'text' . $x;?><tr><td><?php echo $x;?>:</td>
  <td><input style="width:160px" type="text" id="text<?php echo $x;?>" name="text<?php echo $x;?>" value="<?php
  // the updated text is not displayed, immediately after clicking save; the page has to be refreshed
  // however, I can circumvent this, by re-directing users back to the display page, following refresh # 
	echo select_single_grid($_GET['author'], $_GET['post_ID'], $text_column);?>" minlength="1" maxlength="200"></td>
  <td><input style="width:160px;background-color:80D52E"type="text" id="url<?php echo $x;?>" name="url<?php echo $x;?>" value="<?php echo select_single_grid($_GET['author'], $_GET['post_ID'], $url_column);?>" minlength="1" maxlength="1000"></td>
  <td><input type="checkbox" id="target<?php echo $x;?>" name="target<?php echo $x;?>" <?php if (array_key_exists("url$x", $attributes)) { 
  if ($attributes["url$x"] == "_blank") { echo "checked"; } }?> value="_blank"></td></tr><?php }?></table>
<h3 style="margin-bottom:-5px">Notes:</h3>
<br><textarea style="width:400px;min-height:200px;vertical-align:top;" type="text" id="notes" name="notes" onfocus="document.getElementById('head_n').value = '∅'; document.getElementById('media_type').value = '∅';" minlength="1" maxlength="2000000"><?php
  /* the updated text is not displayed, immediately after clicking save; the page has to be refreshed however, I can circumvent this, by re-directing users back to the display page, following refresh # */
echo select_single_grid($_GET['author'], $_GET['post_ID'], 'notes');?></textarea>
<div style="margin-top:2px"><?php require 'php_local_libs/edit.panel-inc.php';?><input type="submit" style="background-color:23233F;color:7F2A57" name="submit" id="f7F2A57" value="Save"></div></form><?php echo_docs();?></div></body></html>
<!-- dev.live-URL http://personal-dash/dash-edit.php?author=blind&post_ID=1 -->
<!-- issues-list
	$back_author is traced from a ghost-redir and requires from retri to swap<MIC># 
<!-- Testing changelog, in reverse-chron:
Late.22-6th.14:
	Added CSS-inc, style sheet, distortion issues fixed w/ edit-panel; 
		+3 HTTP-reqs, monitoring E on load time # 
4:16 AM 11/5/22:
	Added 2 get declarations for $backs
	Added a second, non-redundant echo in the value attribute of Back_url form, using $backs. 
	Added 2 isset checks, both for $_GET['back_author']), that controls 
	1) the $backs variable declarations, since page returns an error, if $_GET when empty #
	2) echo if the new $backs-based URL string, to avoid redundant URL. 
	Test passed:
		URL pre-filled in back_url, following redirect from page.insert-redir
		http://personal-dash/post.post-number.php?&author=blind&post_ID=32
		No redundancy, when page is revisted, from post.post_number. 
4:49 AM 10/28/22: 
	Added  checkbox for toggling post to private, checked = true. Push value true to $_POST["private"] to edit.mysql-redir.php
		Test passed: Checkbox displayed, can be checked. 
19:30 10/26/22:
	Nested $attributes["url$x"] in "checked" echo toggle # inside of an array_key_exists search, with inefficiency note in documentation. 
		Test passed: Checkbox functionality continues work fully, got rid of unidentified index error. 
3:42 AM 10/26/22: 
	Cancel button added to dash-edit.php, with smart-URL, back to post.post-number, no saving. 
		Test passed: URL is displayed correctly, leads to correct destination. 
3:35 AM 10/26/22: 
	Added $attributes function call to attributes_parse in mysql.query-inc
	Added condition check, specific to url-columns, that displays "checked" attribute for checkbox input. 
		Test passed: checkbox setting, on dash-edit, is preserved, after save, and returning to page. 
		Dependency test pending: 
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
<head><title>Edit<?php $discard = strtok($page_n, ":"); echo str_replace($discard, "", $page_n); ?></title></head>
<script>bold.style = "position:absolute;top:675px;left:156px;background-color:black;height:30px;color:#FFFFFF"; italic.style = "position:absolute;top:675px;left:178px;background-color:blue;height:30px;color:white"; underline.style = "position:absolute;top:675px;left:196px;background-color:00FF00;height:30px;color:white"; console.log("test"); 
for(let 选=1;选<10;选++){;if(document.getElementById("url"+选).value==''){document.getElementById("url"+选).style.backgroundColor='white'}}
f7F2A57.addEventListener('click', function(){if(document.activeElement.id=='notes'){主式.action=主式.action+"&redir=notes";}})</script>
