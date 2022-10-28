<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<?php
/* Use a total SELECT of post_ID and post_title, the latter displayed, 
the former used to generate URL, along with session username.*/
/* DELETE functionality: */
require 'C:\wamp64\www\personal-dash\php_local_libs\mysql.query-inc.php'; 
$result = full_post_list_select1(); 
/* I excluded conditional-envelopment if ($result->num_rows > 0) {
	Unclear what will happen, if this is run, when the user has no pages yet */
echo '<h1>Page-list</h1>';
echo '<table>';
echo '<tr>'; 
echo '<th>Post_ID</th>';
echo '<th>Post_title</th>';
/* I would like to make the delete function higher-IQ later, but need to consider the implementation. 
Another option: I can toggle "show-delete", and show delete buttons, which do not need a confirmation.*/
echo '<th>Delete</th></tr>';
while($row = $result->fetch_assoc()) {
	echo '<tr>'; 
	echo '<td>' . $row['post_ID'] . '</td/>'; 
	echo '<td>' . '<a href="../post.post-number.php?author=' . $_SESSION['username'] . '&post_ID=' . $row['post_ID'] . '">' . $row['post_title'] . '</a></td/>';
	echo '<td>' . '<a href="delete-confirm.php?author=' . $_SESSION['username'] . '&post_ID=' . $row['post_ID'] . '">Delete</a></td></tr>';
}
echo '</table>';
?>

<!-- test-url: http://personal-dash/page-list.php -->
<!-- test-log:
	2:05 AM 10/23/22:
		Delete-confirm redirect URL edited, when both files were shipped from testing-progress #
			Test passed. 
	22:16 PM: 
		Delete button direct to delete.confirm-test.php. 
		Added a new <td>, with URL to delete.confirm-test.php, and the correct $_GET parameters fed to URL 
			Test passed. Delete button shows in every row, hyperlink to corresponding delete page correct. 
	22:09 PM: 
		Added HTML table, with <table><tr><th><td> structure, 3 columns for Post_ID, Post_Title, and Delete. 
		Threaed my loop through with the table # and <td> column by column, with one <tr> row entry at each loop top,
		so each loop filled in each row of the table, with the correct value. HTML and PHP were inter-threaded, and
		I am able to link a dynamic HTML, corresponding to the correct # post_ID value, in each row. 
			Tests passed:
				A table structure was created, around my row list. 
				Post_title row is hyperlinked. 
				Hyperlinks go to the correct page, with correct URL. 
	17:41 PM: 
		Replicated functionality that was already produced, earlier, in db.full-list,test.php
		Enter page, and all records from tb, are printed, row by row, with correct column #
			Test passed. 