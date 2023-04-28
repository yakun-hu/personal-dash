<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>replit</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  Hello world.
  <script src="script.js"></script>

 <!--
  This script places a badge on your repl's full-browser view back to your repl's cover
  page. Try various colors for the theme: dark, light, red, orange, yellow, lime, green,
  teal, blue, blurple, magenta, pink!
  -->
  <script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script> 

<?php 
// Global requirements, for this script #, and variable declarations #:
require 'database.php'; 
// require 'db-lib.php'; shelved for the moment due to #  Notice: Undefined variable: conn in C:\wamp64\www\personal-dash\db-lib.php on line 7
// This post_ID defines this specific dash-page, and will be smart, as it will be associated with each author-name, in the format
// [author-name]_[layer]_[count] 
$post_ID = $_GET['post_ID'];
// $post_author_username = $_GET['author'];
?>
<p><a href="index.html">Back</a></p>
<!-- After implementing $post_ID, and URL appends, the next link will need to call the $post_ID variable, as an append #  -->
<p><a href="dash-edit.php?post_ID=<?php echo $post_ID; ?>">Edit</a></p>
<p>1: <a href="<?php 
	$sql = "SELECT url1 FROM dash_blind_posts WHERE post_ID=$post_ID"; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	echo $row["url1"]; 
?>" data-type="URL" data-id="https://developer.wordpress.org/plugins/" target="_blank"><?php 
	$sql = "SELECT text1 FROM dash_blind_posts WHERE post_ID = $post_ID"; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	echo $row["text1"]; 
?></a></p>
<p>2: <a href="<?php 
// the require statement propgates <WP.MIC-H2S35>
	$sql = "SELECT url2 FROM dash_blind_posts WHERE post_ID=$post_ID"; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	echo $row["url2"]; 
?>" data-type="URL" data-id="https://developer.wordpress.org/plugins/" target="_blank"><?php 
	$sql = "SELECT text2 FROM dash_blind_posts WHERE post_ID=$post_ID"; 
	$result = $conn->query($sql); 
	$row = $result->fetch_assoc();
	echo $row["text2"]; 
?></a></p>   
<p>3: <a href="https://developer.wordpress.org/plugins/" data-type="URL" data-id="https://developer.wordpress.org/plugins/" >dev-WP</a>[i]</p>
<p>4: <a href="https://developer.wordpress.org/plugins/" data-type="URL" data-id="https://developer.wordpress.org/plugins/" >dev-WP</a>[i]</p>
<p>5: <a href="https://developer.wordpress.org/plugins/" data-type="URL" data-id="https://developer.wordpress.org/plugins/" >dev-WP</a>[i]</p>
<p>6: <a href="https://developer.wordpress.org/plugins/" data-type="URL" data-id="https://developer.wordpress.org/plugins/" >dev-WP</a>[i]</p>
<p>7: <a href="https://developer.wordpress.org/plugins/" data-type="URL" data-id="https://developer.wordpress.org/plugins/" >dev-WP</a>[i]</p>
<p>8: <a href="https://developer.wordpress.org/plugins/" data-type="URL" data-id="https://developer.wordpress.org/plugins/" >dev-WP</a>[i]</p>
<p>9: <a href="https://developer.wordpress.org/plugins/" data-type="URL" data-id="https://developer.wordpress.org/plugins/" >dev-WP</a>[i]</p>
  
</body>

</html>
