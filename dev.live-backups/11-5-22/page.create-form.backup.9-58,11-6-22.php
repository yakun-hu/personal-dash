<!-- I need to build a form, in which users can title the page. -->
<?php $back_author = $_GET['back_author'];
$back_ID = $_GET['back_ID'];?>
<h1>Create page:</h1>
<form action="../process-redir/page.insert-redir.php?back_author=<?php echo $back_author; ?>&back_ID=<?php echo $back_ID; ?>" method="post">
  <label for="layer">Layer:</label><br>
  <input type="number" id="layer" name="layer" value="##" min="1" max="99" step="1"><br>
  <label for="page_name">Page-name:</label><br>
  <input type="text" id="page_name" name="page_name" value="Enter.page-name:" minlength="1" maxlength="99"><br><br>
  <input type="submit" name="submit" value="Add">
 
 <br><br>In the layer field, enter the number of times, from the home-dash, that you need to click <br>
 to arrive on this page + 1, to represent the layer of abstraction. So if you need to click twice to <br>
 arrive here, from the homepage, this would be layer 3. Enter 3, into the layer field. 

<!-- Test-url http://personal-dash/testing-progress/page.create-form,test.php --> 
<!-- Test-changelog:
	3:58 AM 11/5/22:
		Changed $_GET retrievals to back_author, and back_ID, to reflect
		get post, from post.post-number. 
			Test passed: page does not give an error, relating to $_GET. 
		Changed $post_author_username to $back_author, $post_ID to $back_ID,
		changed get post to next page, and variable calls, in the form action URL. 
			Test passed: back_author and back_ID are now the get params, in the next URL. 
	3:26 AM 11/5/22:
		Added declaration of $post_author_username and $post_ID, from GETs<see-issues>, and into a new php-encap, in header #
		Added author_name and post_ID gets to URL -> process-redir/page.insert-redir.php
			Test passed: author param w/ name, and post_ID w/ #, propagated to URL. 
	22:08 PM 10/21/22:
		Add form for adding 1 text field, on the page: 
			Tested form: 
				Record added with post_title input ✔️
				Redirect to ../process-redir/page.insert-redir.php must have worked ✔️
				Input to "layer" >99, non-inclusive, is blocked ✔️
				<h1>Create page:</h1> is displayed ✔️
				All other display is working ✔️
	22:08 PM 10/21/22:
		Form added, for entering page name, redirecting to ../php_local_libs/page.insert-inc.php with non.functional-post, for now. 
			Test:
				Form is displayed ✔️
				Correct label, button are displayed. ✔️
				Clicking Add, redirects to correct destination ✔️