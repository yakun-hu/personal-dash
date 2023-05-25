<!-- JS: --><script>function bracketser() { var selStartindex = document.getElementById("notes").selectionStart; var selEndindex = document.getElementById("notes").selectionEnd; var note_snap = document.getElementById("notes").value; // Hu: For-reading
	document.getElementById("notes").innerHTML = note_snap.slice(0, selStartindex) + "＜" + note_snap.slice(selStartindex, selEndindex) + "＞" + note_snap.slice(selEndindex);
	document.getElementById("notes").selectionStart = selStartindex + 2;	document.getElementById("notes").selectionEnd = selStartindex + 2; 	
	document.getElementById("notes").focus(); /* the focus block, prec.3-lines, not working; requires separate test; #paused */ }

function hex_main() { var selStartindex = document.getElementById("notes").selectionStart; var selEndindex = document.getElementById("notes").selectionEnd; var note_snap = document.getElementById("notes").value;
	document.getElementById("notes").innerHTML = note_snap.slice(0, selStartindex) + "<span style='background-color:'>" + note_snap.slice(selStartindex, selEndindex) + "</span>" + note_snap.slice(selEndindex);}

function head_nlabel() { var selStartindex = document.getElementById("notes").selectionStart; var selEndindex = document.getElementById("notes").selectionEnd; var note_snap = document.getElementById("notes").value; 
	document.getElementById("notes").innerHTML = note_snap.slice(0, selStartindex) + "<h" + document.getElementById("head_n").value + ">" + note_snap.slice(selStartindex, selEndindex) + "</h" + document.getElementById("head_n").value + ">" + note_snap.slice(selEndindex);}

function snr_drops() { var selStartindex = document.getElementById("notes").selectionStart; var selEndindex = document.getElementById("notes").selectionEnd; var note_snap = document.getElementById("notes").value;
	if (event.target.id == "bold") { var open_term = "<b>"; var close_term = "</b>"; }
		else if (event.target.id == "italic") { var open_term = "<i>"; var close_term = "</i>"; } // differentiation doesn't work; all clicks default to bold-term # 
		else { var open_term = "<u>"; var close_term = "</u>"; }
	document.getElementById("notes").innerHTML = note_snap.slice(0, selStartindex) + open_term + note_snap.slice(selStartindex, selEndindex) + close_term + note_snap.slice(selEndindex);
	/* console.log(event.target.id); */}

function br() { var selStartindex = document.getElementById("notes").selectionStart; var selEndindex = document.getElementById("notes").selectionEnd; var note_snap = document.getElementById("notes").value; 
	document.getElementById("notes").innerHTML = note_snap.slice(0, selStartindex) + note_snap.slice(selStartindex, selEndindex) + "<br>" + note_snap.slice(selEndindex);} // the inclusion of Start->End slice prevents content#deletion in case in which some text is sel.Rang'd
<!-- the br function would benefit, in particular, from .focus , at 1-past sel-End -->

function a_tag() { var selStartindex = document.getElementById("notes").selectionStart; var selEndindex = document.getElementById("notes").selectionEnd; var note_snap = document.getElementById("notes").value;
	document.getElementById("notes").innerHTML = note_snap.slice(0, selStartindex) + "<a href=''>" + note_snap.slice(selStartindex, selEndindex) + "</a>" + note_snap.slice(selEndindex);}

function media_inser() { var selStartindex = document.getElementById("notes").selectionStart; var selEndindex = document.getElementById("notes").selectionEnd; var note_snap = document.getElementById("notes").value; 
	if (document.getElementById("media_type").value == "img") { var inser_term = '<img width="" height="" src="">' } 
		else if (document.getElementById("media_type").value == "video") { var inser_term = '<video controls width="" height=""><source src="" type=""></video>' } 
		else if (document.getElementById("media_type").value == "∅") { var inser_term = '' } 
		else { var inser_term = '<iframe width="" height="" src="https://www.youtube.com/embed/"></iframe>' } 
	document.getElementById("notes").innerHTML = note_snap.slice(0, selEndindex) + inser_term + note_snap.slice(selEndindex); } </script>
<!-- HTML: --><div style="padding-top:1px"><button style="background-color:608ABD;color:B9AD57" onclick="bracketser()"><p>＜失|效＞</p></button> <button onclick="hex_main()" style="background-color:A43F00;color:E2C535"><p>Hex</p></button> <select name="head_n" id="head_n" onchange="head_nlabel()"><option value="∅">H:</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select>
<span class="main-tab"><button><p>S.n-r⬇️</p></button><button class="sub-tab" onclick="snr_drops()" id="bold" style="position:absolute;top:251px;left:150px;background-color:black;height:30px;color:#FFFFFF"><p><b>B</b></p></button>
<button class="sub-tab" onclick="snr_drops()" id="italic" style="position:absolute;top:251px;left:172px;background-color:blue;height:30px;color:white"><p><i>i</i></p></button>
<button class="sub-tab" onclick="snr_drops()" id="underline" style="position:absolute;top:251px;left:190px;background-color:00FF00;height:30px;color:white"><p><u>u</u></p></button></span>
<button onclick="br()" style="background-color:3D85C6;color:0BE7F4">↵</button> <button onclick="a_tag()" style="background-color:0F173B;color:BA95A7"><p>&lt;a&gt;</p></button> 
<select name="media_type" id="media_type" onchange="media_inser()"><option value="∅">媒体</option><option value="img">img</option><option value="video">video</option><option value="iFrame">iFrame</option></select>
<button style="background-color:D21E1E"><p>⏩</p></button></div>
<!-- Echo-Documentation: -->
<?php function echo_docs () { ?>
<h4>Documentation:</h4>
<p>H5S1: Syntax-docs: <b>H6S1</b>: 8-Span<br>
H7S1: ＜span style='background-color:<span style='background-color:00FF00'>[color.name-Hex]</span>'>＜/span><br>
* Enter a <a target="_blank" href="https://www.w3schools.com/colors/colors_names.asp">standard color name</a> or a valid.Hex-Code in the 00FF00-zone #<br>
H8S1: 00FF00-highl,green | <br>
H7S2: ＜a href='<span style='background-color:00FF00'>Link-URL</span>'><span style='background-color:00FF00'>Displayed-name</span>＜/a><br>
H7S3: ＜img width="" height="" src=""> In the src quotes, enter a URL to a web.img,video-等等
<?php } ?>

<!-- Error-cases -->
<?php // echo "hey"; ?>

<!-- Reference-URL: http://personal-dash/testing-progress/proc_features/edit.panel-inc,test.php -->
<!-- testing-log: 
When the span-8 icons are displayed within<form/>tags, clicking them submits the form, disr-func # 
	http://personal-dash/post.post-number.php?author=blind&post_ID=575
Recall that textarea id and 2 onfocus-funcs need to be set # in the calling-doc<HTML.quick-render.php> -->
<!-- Issues: -->
<!-- notes<Simul>: 
<a>tag: after add, display opt to add target="_blank" attr w/ second mouse-click; reset this option onfocus in field # 
edit.panel-inc: Envelop the buttons area div into a function in that inc, with the bare-HTML within a close-tag in a PHP-cond, within that func, and call that func, where the buttons are displ, on any calling-pages # 
	Even better: simpl, req-call on the line of the buttons'intend-appr w/ naked-HTML -->