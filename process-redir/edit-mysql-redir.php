<?php
require 'C:\wamp64\www\personal-dash\php_local_libs\db.conn-inc.php'; 
// This statement declares a variable, to prep the db-call, but does not, in itself, run a db-call. 
// Potential loop variable: # count + 1, concatenate, insert into superglobal somehow, or extrapolated var. Lines = 2+4 vs 18, so 1/3. 
$attributes = ""; 
for ($x = 1; $x <= 9; $x++) {
	$text_column_input = $_POST["text$x"];
	echo $text_column_input; 
	$sql = "UPDATE dash_{$_GET['author']}_posts SET text$x='$text_column_input' WHERE post_ID='{$_GET["post_ID"]}'";
	// This statement is needed, referring to 'database.php', every time code is to be run, to the db # 
		$conn->query($sql);
		echo $conn->error; 
		// echo $sql; 
	$url_column_input = $_POST["url$x"];
	$sql = "UPDATE dash_{$_GET['author']}_posts SET url$x='$url_column_input' WHERE post_ID='{$_GET["post_ID"]}'";
		$conn->query($sql);
		echo $conn->error;
	if (isset($_POST["target$x"])) {
		$attributes = $attributes . 'url' . $x . '=' . $_POST["target$x"] . ';';
	}
} 
$attributes = $attributes . 'null=null;';
$sql = "UPDATE dash_{$_GET['author']}_posts SET notes='{$_POST["notes"]}' WHERE post_ID='{$_GET["post_ID"]}'";
		$conn->query($sql);
		echo $conn->error;
$sql = "UPDATE dash_{$_GET['author']}_posts SET post_title='{$_POST["post_title"]}' WHERE post_ID='{$_GET["post_ID"]}'";
		$conn->query($sql);
		echo $conn->error;
$sql = "UPDATE dash_{$_GET['author']}_posts SET back_url='{$_POST["back_url"]}' WHERE post_ID='{$_GET["post_ID"]}'";
		$conn->query($sql);
		echo $conn->error;
$sql = "UPDATE dash_{$_GET['author']}_posts SET attributes='$attributes' WHERE post_ID='{$_GET["post_ID"]}'";
		$conn->query($sql);
		echo $conn->error;
// After implementing $post_ID, and URL appends, the next link will need to call the $post_ID variable, as an append #
header("Location: ../post.post-number.php?author={$_GET['author']}&post_ID={$_GET["post_ID"]}"); 
?>

<!-- dev.live-url http://personal-dash/process-redir/edit-mysql-redir.php?author=blind&post_ID=1 -->

<!-- Testing changelog, in reverse-chron
17:25 10/26/22:
	Added $attributes = $attributes . 'null=null;'; just before MySQL update, to ensure attributes column always filled. 
	This meaningless | entry<Turing> ensures that no syntax errors, additionally, of a categorical type<Turing-2> will occur as a result. 
		Test passed: http://personal-dash/post.post-number.php?author=blind&post_ID=6
		which previously had a blank attributes column, now does not return undefined variable: attributes_assoc_array error, nor the dash-edit.php? version
5:50 AM EDT 10/26/22:
	Made a slight change to input, that only adds an attribute instance, if there is checkbox entry, leading to a more concise db-entry:
	Added isset() check to $attributes concatenation within the loop. 
		Test passed: blank inputs eliminated from db-entry, ie url1=_blank;url3=_blank;url5=_blank;
		Dependendy testing pending<mbno><fbno>
4:07 AM EDT, 10/25/22:
	Support for 'back_url' and 'post_title' column input added, outside of loop #
		Test passed: 'back_url' and 'post_title' columns successfully updated, accurately, with input from dash-edit. 
2:24 AM EDT, 10/24/22:
	Support for 'notes' column input added, outside of loop #
		Test passed: 'notes' column successfully updated, accurately, with input from dash-edit. 
1:04 AM EDT, 10/24/22:
	Converted input mechanism into for loop, with only 2 stated $sql updates, an 18 to 6 line reduction #
		Tests passed: db update behavior continues to function as before #
20:46 PM EDT, 10/23/22: 
		Global variable declarations for $_POST and $_GET replaced with MySQL.in-line,super<Turing>
		Syntax set according to H3S1 H4S4 H5S5 https://www.wordpress.materialinchess.com/2022/10/14/h2s35-basic-php-syntax/
		Header: location also updated to reflect new location of this doc<fbno> and superglobal inclusion. 
			Test passed: text1 post from dash-edit is propagated to display # 
			Test passed: redirect to post.post-number contains correct URL. 
		Rows 3-9 propagated. 
			Test passed: all rows propagated. 
			Test passed: redirect to post.post-number contains correct URL. 
1:11 AM EDT, 10/20/22:
	Variable declaration added to global-header: $post_author_username = $_GET['author'];
		Test pending...
		Page functions normally, when the full test from dash-edit is run ✅
	Link to post.post-number updated to include dynamic author propagation:
		header("Location: post.post-number.php?author=$post_author_username&post_ID=$post_ID"); 
		Correct redirect test: http://personal-dash/post.post-number.php?author=blind&post_ID=1
		Test passed ✅
	sql = "UPDATE dash_blind_posts SET text1='$text1' WHERE post_ID=$post_ID";
		4 instances updated, but only 1 form shows right now. 
		Update still works, when form is used from dash-edit ✅