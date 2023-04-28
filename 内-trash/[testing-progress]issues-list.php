<?php
/* 1) http://personal-dash/post.post-number.php?author=blind&post_ID=15 all instances
In logged out experience, 2 extraneous | | are shown between Back and Log-in. Need to display
dividers with a CSS right border, rather than a manual entry of the character. */

/* 2) Text-field entry problem, possibly URL also on dash-edit, all, when quotation marks
both ' and " are added, testing different counts, either does not register, pull, or both. 
10/28/22: the following paragraphs:
1) I do not have a college degree, but with 120 completed credits, and intro courses in 10+ major programs. My life followed the track of an early 20s entrepreneur, and I sacrificed college completion, at several junctures, to produce cutting-edge research in comp-sci and profit opportunities. Having worked with multiple senior web architects, A-list VCs, and business execs for years, my experiential and academic credentials far exceed what this line may show. 
<br>
2) The field of comp-sci sits in an awkward displacement # between academia and industry, and I invested $1-mn+ toward WebRTC research in 2015-6, and another $600k+ toward WebSockets in 2018-9, both 10's or later tech. The late adoption maturity for both, following adoption scale of HTTP-proper, may not reach until 2023-5; in academic science, researchers are encouraged to produce such interceding # results; in startup-biz, the binary failure paradigm is limiting. 

Completely failed to add, here, when the ' was included: http://personal-dash/post.post-number.php?author=blind&post_ID=34

" also does not save, with the whole row, in the text-field: http://personal-dash/post.post-number.php?author=blind&post_ID=28
It seems like dash-edit and post.post-number handles SELECT " differently. 

After a few loops through loading dash-edit and saving, the text was wiped, both from text-field, and Notes. 

^ a str-replace function can be used to swap out all instances of ' with another char, as one potential solution # 

Really starting to annoy me 10/29/22. Elevated priority to [critical], need to figure out why it doesn't even save, very unexpected. Figure out if it's a write or read issue, or both. 

11/24/22: In PHP concatenation #, ' terminates a string clause, but the issue might be in the db. 
*/

/* 
3) In post.post-number.php, and possibly dash-edit, and elsewhere, $output is the variable for
both logged_in_binary and check_author_perm. Secondarily, both functions are called multiple times, when
its value can be determined once, with a unique variable name, and that variable can be called, rather than the function,
again, later. 

Update 10/28/22: Issue fixed in post.post-number.php, only 

[RESOLVED]: 4) Investigate: how do I know, which version of HTML I'm running, or is that dictated by the browser?
Update 10/29: According to Lengstorf and Leggetter<pg16> header is new in HTML-5, and another book about it came out in 2012. 

5) How do I persistently keep PHP 8 running in WAMP?

6) In post.post-number, and now page.create-form, and possibly elsewhere, I have a redundant variable def, 
where I assign the value of $_GET to $variable, and then plug in that variable, to various calls, rather than
the $_GET superglobal directly, as intended. Should be possible 100%, but just need to test, and confirm the
formatting, especially when it's in an HTML multi-thread. 

7) What is the computational load of a require? What is pulled and run by default, and what is not?
For instance, are all variables automatically loaded, or only when called? Same with functions. 
*/
?>

<!-- http://personal-dash/testing-progress/random.test-dump.php -->