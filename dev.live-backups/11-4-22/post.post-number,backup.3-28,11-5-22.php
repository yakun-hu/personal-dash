<html><head>
<!-- in-line styling can also be applied, with php-encap<Turing!> to provide
dynamic coloring, and other in-grid patterns, while keeping main squares -->
<style>
table {
	border-collapse: collapse;
}
tr {
	height: 150px;
}
td {
	border: 1px solid #dddddd;
	text-align: left;
	width: 150px;
}
</style></head><body><script src="script.js"></script>
<?php 
// Global requirements, for this script #, and variable declarations #:
require 'C:\wamp64\www\personal-dash\php_local_libs\db.conn-inc.php'; 
include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php';
require 'C:\wamp64\www\personal-dash\php_local_libs\mysql.query-inc.php';
$attributes = attributes_parse($_GET['author'], $_GET['post_ID']); 
// Immediate redir will be placed here #
$check_edit_perm_bool = check_edit_perm($_GET['author']);
if ($check_edit_perm_bool != 1) {
	if (array_key_exists("private", $attributes)) { 
		if ($attributes["private"] == "true") {
			header("Location: http://personal-dash/index.php");
		}
	}
}
// require 'db-lib.php'; shelved for the moment due to #  Notice: Undefined variable: conn in C:\wamp64\www\personal-dash\db-lib.php on line 7
$post_author_username = $_GET['author'];
$post_ID = $_GET['post_ID'];
?>
  <h1><?php echo 'Page-name: ' . select_single_grid($_GET['author'], $_GET['post_ID'], 'post_title'); ?></h1>
<!-- After implementing $post_ID, and URL appends, the next link will need to call the $post_ID variable, as an append #  -->
<p><a href="<?php echo select_single_grid($_GET['author'], $_GET['post_ID'], 'back_url');?>">Back</a> |
<a <?php 
if ($check_edit_perm_bool != 1) {
	echo 'hidden';
}
?> href="dash-edit.php?author=<?php echo $post_author_username; ?>&post_ID=<?php echo $post_ID; ?>"> Edit</a> | 
<a <?php 
$logged_in_binary_bool = logged_in_binary(); 
if ($logged_in_binary_bool != 1) {
	echo 'hidden';
}
?> href="page.create-form.php">(+) New-page</a> | 
<?php if ($logged_in_binary_bool == 1) {?>
<a href="../process-redir/log.out-redir">Log-out</a>
<?php }
else { ?>
<a href="../login.php">Log-in</a>
<?php } ?> | <a href="index.php">Index</a></p>
<table><?php $entry_count_9 = 0;
$row_count_3 = 1;
while ($row_count_3 <= 3) {
	$count_container_2 = $row_count_3++;?><tr><?php
	$column_count_3 = 1; 
	while ($column_count_3 <= 3) {
		// echo $entry_count_9;
		$count_container = $column_count_3++;
		$url_column = 'url' . ++$entry_count_9; 
		$text_column = 'text' . $entry_count_9; ?>
			<td><?php echo $entry_count_9; ?>: 

<?php $url = select_single_grid($post_author_username, $post_ID, $url_column);
if (check_private($url) && $check_edit_perm_bool != 1) {
	echo "🔒:";
	} else {
?>
<!-- check_private controller target start -->			
			<a href="<?php echo $url;?>" data-type="URL" <?php if (array_key_exists("url$entry_count_9", $attributes)) { 
			if ($attributes["url$entry_count_9"] == "_blank") {
	echo 'target="_blank"';
	$internal = 'off';
	}
} else {
	$internal = 'on';
	}
 ?> ><?php $display_text = select_single_grid($post_author_username, $post_ID, $text_column);
			echo $display_text?></a><?php if ($display_text != "") {
				if ($internal == 'on') { 
			echo '[i]'; 
			}
		} 
	} ?>
<!-- controller target end -->		
</td>
<?php }?></tr><?php }?></table>
<h3>Notes:</h3>
<p style="width:400px"><?php echo select_single_grid($_GET['author'], $_GET['post_ID'], 'notes');?></p>
</body></html>
<!-- dev.live-URL http://personal-dash/post.post-number.php?author=blind&post_ID=1 -->
<!-- Testing changelog, in reverse-chron:
7:28 AM 10/28/22:
	$output for check_edit_perm function call, replaced with $check_edit_perm_bool, and this variable is called, in subsequent iterations. 
	Test:
		Header redirect: Working. 
		Display of edit icon: Working. 
		check_private control, co-condition #: Working. 
	$output for logged_in_binary function call, replaced with $logged_in_binary_bool, and this variable is called, in subsequent iterations. 
	Test:
		Display of new page icon, toggle: Working. 
		Logged in / out toggle: Working. 
7:13 AM 10/28/22: 
	Added function call to check_private, located in mysql.query-inc
	Echos a lock icon if the post is private, else displays the regular link, and link text. 
	Test:
		Using post_ID=34 as the private post, and post_ID=22 which links it, tested binary if post_ID=34 is set to private. 
		Test passed:
			Lock icon is shown, and is not clickable, if post_ID=34 is private, on post_ID=22. 
			Regular clickable title and text are shown, otherwise. 
		Added support for check_edit_perm, if $output != 1 clause added, as an add-append<Turing> to the 
		check_private conditional control. 
		Test passed: 
			When post is private, the title is still shown, from a linking page #, if author is logged in, and viewing that linking page #
			When post is private, lock is shown, in the preceding circumstance, if another user, or visitor. 
			When post is public, visitors can also see the title, on the linking page. 
1:15 AM 10/27/22:
	Added new page button, for logged-in visitors only. 
		Test passed: Button displayed, leads to correct destination # 
19:50 PM 10/26/22: 
	Added support for conditional showing of [i] 1) if there is text, in the column for that row, and 2) if the link does not open in target=_blank. 
		Test passed: [i] display is un-linked, and displays, under the correct conditions. 
		Test passed: empty text boxes do not display an [i]. 
19:30 PM 10/26/22: 
	Nested $attributes["url$x"] in "checked" echo toggle # inside of an array_key_exists search, with inefficiency note in documentation. 
		Test passed: Checkbox functionality continues work fully, got rid of unidentified index error. 
4:06 AM 10/26/22: 
	Added $attributes function call to attributes_parse in mysql.query-inc
	Added condition check, specific to url-columns, that displays 'target="_blank"' attribute for checkbox input. 
		Test-passed: Checked boxes produces page that opens in a new window. Unchecked boxes produces pages that open in the same window. 
4:14 AM 10/25/22: 
	Added support for clickable back button, populated by 'back_url' column URL. 
		Test passed: Back-button is displayed, clickable, and goes to # the correct URL 
2:46 AM 10/25/22: 
	Added support for # 'notes' display, printed below the grid, with some styling. 
		Test passed: 'notes' successfuly retrieved from db, and displayed # 
18:34 PM 10/24/22:
	Page name dynamic load w/ select_single_grid function added, selecting post_title. 
		Tests passed: UI looks as expected, page name is now displayed. 
3:07 AM 10/24/22:
	Styled table with CSS in <head><style>, internal # 
	All table grids are 150x150px grid, to start. 
		Test passed: Visual design as described, functionality not disrupted. 
2:50 AM 10/24/22:
	For loop swapped for a nested 2x-while, to generate a 3x3. 
	HTML table code added, full. 
		Test-passed: Entries, and entry numbers, displayed as before. 
1:57 AM 10/24/22:
	For loop added, to generate table via an HTML.escape-output,loop. 
		Test passed: exact table replicated. 
1:13 AM 10/24/22:
	mysql.query-inc.php added as include. 
		Test-passed: page loads with all normal elements, no session_start(); duplicate notice # 
2:19 AM 10/23/22:
	"Back" button renamed to "Index"
01:55 AM EDT, 10/22/22:
	Pushed Dr. Dunkle's conditional implementation, see index.php same time, to login/out buttons. 
		Logged-out, log-in is displayed ✔️
		Logged-in, log-out is displayed ✔️
06:41 AM EDT, 10/21/22:
	Log.in/out pushed from log.out-button,test.php, with same.line-display,UI! 
		Test: 
			Links are displayed correctly, on the same line as Back | ✅
			Conditional control works ✅
			Edit button conditional dependency did not break<fbno> ✅
			Clicking the buttons has the correct-E ✅
00:59 AM EDT, 10/20/22:
	Variable declaration added to global-header: $post_author_username = $_GET['author'];
		Page still loads ✅
	Line 18, swapped in for hard-coded 'blind': $output = check_edit_perm($post_author_username);
		Removed single quote around the previous string. 
		author=blind, Edit button shown ✅
		author=lucy, Edit button hidden ✅
	HTML link display section:
		In every $sql declaration, swapped in variable username with hard-coded 'blind' in the table name:
		$sql = "SELECT url1 FROM dash_{$post_author_username}_posts WHERE post_ID=$post_ID"; 
		author=blind, all text displays ✅
		author=blind, all links load ✅
		author=lucy, text and links hidden ✅ error given. 
	Link to dash-edit updated to include author=:
		<a href="dash-edit.php?author=<?php echo $post_author_username; ?>&post_ID=<?php echo $post_ID; ?>
		Output URL correct ✅ http://personal-dash/dash-edit.php?author=blind&post_ID=1
17:17 EDT, 10/19/22:
	All code from /testing-progress/threaded.echo-test,2 was pushed to here, in several locations #
	Testing paradigm defined as of https://www.wordpress.materialinchess.com/2022/10/19/h2s51-a-granular-process-of-merging-code/
	H3S2: 'lucy' and 'blind' test repeated, Edit button behavior expected #
	H3S3: Clicking edit icon, still leads to correct URL. 
	H3S3: All redirects, and db-behavior, remains functional. 
	Testing status: ✅
	Backup location: dev.live-backups/post.post-number,backup.17-07,10-19-22
-->
