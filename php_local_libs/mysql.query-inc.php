<?php
require 'db.conn-inc.php'; 
function highest_post_ID_sess($table_n) {
	$session_username = $_SESSION['username'];
	$sql = "SELECT post_ID FROM {$table_n} ORDER BY post_ID DESC LIMIT 1"; 
	global $conn; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	$post_ID = $row["post_ID"]; 
	// print_r($row); echo $post_ID; 
	return $post_ID; } // Used:  page.insert-redir.php, back-man
// highest_post_ID_sess();
function full_post_list_select1() {
	$session_username = $_SESSION['username'];
	$sql = "SELECT post_ID, post_title FROM dash_{$session_username}_posts ORDER BY post_ID DESC"; 
	global $conn; 
	$result = $conn->query($sql); 
	return $result; } 
function select_single_grid($post_author_username, $post_ID, $column) {
	$sql = "SELECT $column FROM dash_{$post_author_username}_posts WHERE post_ID=$post_ID"; 
	global $conn; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	return $row["$column"]; } 
function attributes_parse($post_author_username, $post_ID) {
	$attributes = select_single_grid($post_author_username, $post_ID, 'attributes');
	$attributes_assoc_array = 字串关联数组($attributes); 
	return $attributes_assoc_array; }
function 字串关联数组($attributes) { $attributes_char_array = str_split($attributes); $pair = '';
	foreach($attributes_char_array as $char) { if ($char == ';') { $key = strtok($pair, "="); $value = strtok("="); $attributes_assoc_array[$key] = $value; $pair = ''; } 
		else {$pair = $pair.$char; /* echo $pair; */} 
	} /* print_r($attributes_assoc_array); */
	return $attributes_assoc_array; } // post-number, back-man # 
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
} 
function empty_link_slot($author, $post_ID) {
	$num = 0;
	$empty_link_found = false; 
	while($empty_link_found == false && $num < 9) {
		// Incremeter micro-tested<below>: test-passed. 
		$url_num = 'url' . ++$num;
		$text_num = 'text' . $num;
		$url = select_single_grid($author, $post_ID, $url_num); 
		$text = select_single_grid($author, $post_ID, $text_num); 
		if($url == "" && $text == "") {
			$empty_link_found = true;
			/* Page.create-form will handle the returned $num to display link #
			and if user selects to add the forward link, pass $num to the insert-redir*/
			return $num; 
		} 
	}
	return 'null'; 
} 
	
function ins_row_gen($table_n, $columns_列, $values_列) /* WP.MIC-H2S37 */
	{$sql_command = "INSERT INTO ".$table_n." (".implode($columns_列).") VALUES (".implode($values_列).")"; // assembly
	global $conn; $conn->query($sql_command); // fire
	echo $sql_command; echo "<br>".$conn->error;} // debuggers // Callings: insert-redir, backlog, media // src SQL.row-funcs,test.php
	
function update_row_any($table_n, $columns_列, $values_列, $index_col_列=array(), $index_val_列=array()) 
{$sql_command = "UPDATE ".$table_n." SET "; for ($inx =0; $inx < count($columns_列); $inx++) { $sql_command .= $columns_列[$inx]."=".$values_列[$inx] /* Apostraph the $values in assembl # */; } if(count($index_col_列)==0) {} else { $sql_command .= " WHERE "; for ($inx =0; $inx < count($index_col_列); $inx++) { $sql_command .= $index_col_列[$inx]."=".$index_val_列[$inx];}} // assembly
global $conn; $conn->query($sql_command); 
echo $sql_command; echo "<br>".$conn->error;} // Callings: edit-redir, backlog, media

function 选出_rows_any/*ref SQL.row-funcs,test*/($table_n,$行_列=array(),/*原因➡️*/$指标行列=array(),$指标经营列=array(),$指标val列=array(),$order=null)/*LIKE<e|经营;'%'<e|指标val*/
{$sql命令="SELECT ";for($inx=0;$inx<count($行_列);$inx++){$sql命令.=$行_列[$inx];}$sql命令.=" FROM $table_n ";
if(count($指标行列)!==0){$sql命令.=" WHERE ";for($inx=0;$inx<count($指标行列);$inx++){$sql命令.=$指标行列[$inx].' '.$指标经营列[$inx].' '.$指标val列[$inx];}}
if(isset($order)){$sql命令.=' ORDER BY '.$order[0].' '.$order[1];}/*debug*/echo $sql命令;}

// AJAX-rec,UPDATE:

if(isset($_POST["fire"]))
{ /* testing in backlog -> server.php, same level */ }

?>
<!-- test-url: http://personal-dash/php_local_libs/mysql.query-inc.php --> 
<!-- test-changelog: 
12.31-22,5th.23:
	Web testing: after a session_username was assigned from the start'd validate-redir, a sep.page-jump 🏀 w/ echo test returns "robert" # 

=== earlier:
	4:44 AM: added fetch_password() {
		var_dump remotely retrievs an obj, displays the password string. 
	4:21 AM: added full_users_tb_select() { 
		var_dump remotely retrieves an obj, field_count=1, num_rows=2. 
	9:47 AM 11/6/22:
		Added function empty_link_slot from empty.link-slot,test.php
			Test passed: require file calls this function, same output. 
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