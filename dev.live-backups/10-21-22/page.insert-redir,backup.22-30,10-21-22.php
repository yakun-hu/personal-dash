<?php 
require 'C:\wamp64\www\personal-dash\php_local_libs\db.conn-inc.php'; 
$sql = "INSERT INTO dash_blind_posts (post_ID, post_title, text1, url1, text2, url2) VALUES ('2', 'p.dash-2,entertain', 'ITZY.YT', 'https://www.youtube.com/results?search_query=itzy', 'Twice.YT', 'https://www.youtube.com/results?search_query=twice')";
	$conn->query($sql); 
  // echo $sql; 
  echo $conn->error;
?>