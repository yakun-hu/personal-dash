<h1>The 21st-century filing cabinet(2):</h1>
<?php 
include 'C:\wamp64\www\personal-dash\php_local_libs\login.functions-inc.php';
require 'C:\wamp64\www\personal-dash\php_local_libs\testing-inc.php'; 
echo "<p>Your username: ", sess_super_username_check() . "</p>"; 
?>
<html><head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa">
  <link rel="stylesheet" href="php_local_libs/CSS-external.php"><style>
  <title>Dash-Index</title><link rel="icon" type="image/x-icon" href="CHE_favicon.ico"><style><!-- Favicon<see-refs>feature not loading, yet-->
<!-- Grid adjacency not working yet 12.31-22,4th.21-->
.instructions { grid-area: instructions; background-color: #FFFFFF; text-align: center; border-style: solid; border-width: 3px; border-color: #1F1F1F;}
.RAM { grid-area: RAM; background-color: #25438B; color:FFFFFF; margin-top: 10px; border-style: solid; border-width: 1px; border-color: #1F1F1F; padding:10px;}
.grid-container { display: grid; grid: 'instructions RAM'; grid-gap: 1px; padding: 10px; height: 600px; width: 1000px; grid-template-rows: 600px; grid-template-columns: 3fr 1fr; text-align: left;}</style></head><body>
  <script src="script.js"></script>
<p><a <?php $output = logged_in_binary(); if ($output != 1) { echo 'hidden'; } ?> href="page.create-form.php">(+) New-page | </a>
<a <?php $output = logged_in_binary(); if ($output != 1) { echo 'hidden'; } ?> href="page-list.php">Page-list | </a>
<?php $output = logged_in_binary(); if ($output == 1) { ?><a href="../process-redir/log.out-redir">Log-out</a> | 
<a href="post.post-number.php?author=<?php echo $_SESSION['username']; ?>&post_ID=8">Pg.数-1</a><?php } else { ?><!-- See refs for "$post_ID=8" issue -->
<a href="../login.php">Log-in</a> | <a href="../register.php">Register</a><?php } ?></p>
<div class="instructions"><h2>Instructions for use:</h2>
<p> 1) 1: Job.app-notes[G-docs][2022] add mini-tags with [brackets] in the text-field
to help yourself # remember the destination category. This will minimize
mental.load-pre,click[Turing].
<br> 2) https://www.youtube.com/watch?v=avHo0-qU8xo 5:58 </div>
<div class="RAM" style=""><h1>Inner.RAM-Main:</h1>
<ol><li><p><a style="color:FFFFFF" href="post.post-number.php?author=blind&post_ID=352">Project-Management</a></p></li>
<li><p>4.<a style="color:FFFFFF" href="post.post-number.php?author=blind&post_ID=231">Textbooks-all</a></p></li>
<li><p><a style="color:FFFFFF" href="http://chess/chess-website.txt">WAMP-chess</a></p></li>
<li><p><a style="color:FFFFFF" href="post.post-number.php?author=blind&post_ID=355">Car-safety</a></p></li>
<li><p><a style="color:FFFFFF" href="post.post-number.php?author=blind&post_ID=350">CN,ENG</a></p></li>
<li><p><a style="color:FFFFFF" href="post.post-number.php?author=blind&post_ID=359">Tencent-Cloud</a></p></li>
</ol></body></html>
<!-- test-url: http://personal-dash/index.php -->
<!-- issues-list-->	
<!-- Testing changelog, in reverse-chron-->
<!-- References:
12.31-22,4th.24: $post_ID=8 issue: see documentation.txt in p.dash-main/ 
Earlier: Favicon feature:
https://www.w3schools.com/html/html_favicon.asp
https://perishablepress.com/everything-you-ever-wanted-to-know-about-favicons/<50% accuracy> -->