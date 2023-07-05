<!-- JS: --><script>function bracketser() { var 角_片 = document.getElementById("notes"); var 引开 = notes.selectionStart; var 引结 = notes.selectionEnd; /* Hu: For-reading */ console.log(角_片.value);
	角_片.value = 角_片.value.slice(0, 引开) + "＜" + 角_片.value.slice(引开, 引结) + "＞" + 角_片.value.slice(引结);
	if (引开 == 引结) { 角_片.setSelectionRange(引开 + 1, 引开 + 1); 角_片.focus();}
		else { /* Turning off focus in this mode, for now*/ } }

function hex_main() { var 引开 = notes.selectionStart; var 引结 = notes.selectionEnd; var 角_片 = notes.value;
	notes.value = 角_片.slice(0, 引开) + "<span style='background-color:'>" + 角_片.slice(引开, 引结) + "</span>" + 角_片.slice(引结);
	notes.selectionStart = 引开 + 30; notes.selectionEnd = 引开 + 30; notes.focus(); }

function head_nlabel() { var 引开 = notes.selectionStart; var 引结 = notes.selectionEnd; var 角_片 = notes.value; 
	notes.value = 角_片.slice(0, 引开) + "<h" + head_n.value + ">" + 角_片.slice(引开, 引结) + "</h" + head_n.value + ">" + 角_片.slice(引结);
	if (引开 == 引结) { notes.selectionStart = 引开 + 4; notes.selectionEnd = 引开 + 4; notes.focus();}
		else { /* Turning off focus in this mode, for now: notes.selectionStart = 引结 + 2;	notes.selectionEnd = 引结 + 2; } */ }}

function snr_drops() { var 引开 = notes.selectionStart; var 引结 = notes.selectionEnd; var 角_片 = notes.value;
	if (event.target.id == "bold") { var open_term = "<b>"; var close_term = "</b>"; }
		else if (event.target.id == "italic") { var open_term = "<i>"; var close_term = "</i>"; } // differentiation doesn't work; all clicks default to bold-term # 
		else { var open_term = "<u>"; var close_term = "</u>"; }
	notes.value = 角_片.slice(0, 引开) + open_term + 角_片.slice(引开, 引结) + close_term + 角_片.slice(引结);
	if (引开 == 引结) { notes.selectionStart = 引开 + 3; notes.selectionEnd = 引开 + 3; notes.focus();}
		else { /* Turning off focus in this mode, for now: notes.selectionStart = 引结 + 2;	notes.selectionEnd = 引结 + 2; } */ }
	/* console.log(event.target.id); */}

function br() { var 引开 = notes.selectionStart; var 引结 = notes.selectionEnd; var 角_片 = notes.value; 
	notes.value = 角_片.slice(0, 引开) + 角_片.slice(引开, 引结) + "<br>" + 角_片.slice(引结);
	notes.selectionStart = 引开 + 4; notes.selectionEnd = 引开 + 4; notes.focus(); } // the inclusion of Start->End slice prevents content#deletion in case in which some text is sel.Rang'd
<!-- the br function would benefit, in particular, from .focus , at 1-past sel-End -->

function a_tag() { var 引开 = notes.selectionStart; var 引结 = notes.selectionEnd; var 角_片 = notes.value;
	notes.value = 角_片.slice(0, 引开) + "<a href=''>" + 角_片.slice(引开, 引结) + "</a>" + 角_片.slice(引结);
	notes.selectionStart = 引开 + 9; notes.selectionEnd = 引开 + 9; notes.focus();}

function media_inser() { var 引开 = notes.selectionStart; var 引结 = notes.selectionEnd; var 角_片 = notes.value; 
	if (media_type.value == "img"){var inser_term='<img width="" height="" src="">'}else if(media_type.value == "video"){var inser_term='<video controls width="" height=""><source src="" type=""></video>'}else if(media_type.value=="∅"){var inser_term='';}else {var inser_term='<iframe width="" height="" src="https://www.youtube.com/embed/"></iframe>'}
	notes.value = 角_片.slice(0, 引结) + inser_term + 角_片.slice(引结); } </script>
<!-- HTML: --><button type="button" style="background-color:608ABD;color:B9AD57" onclick="bracketser()"><p>＜失|效＞</p></button> <button type="button" onclick="hex_main()" style="background-color:A43F00;color:E2C535"><p>Hex</p></button> <select name="head_n" id="head_n" onchange="head_nlabel()"><option value="∅">H:</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select>
<span class="main-tab"><button type="button"><p>S.n-r⬇️</p></button><button type="button" class="sub-tab" onclick="snr_drops()" id="bold">B</button><button type="button" class="sub-tab" onclick="snr_drops()" id="italic">i</button><button type="button" class="sub-tab" onclick="snr_drops()" id="underline"><u>u</u></button></span>
<button type="button" onclick="br()" id="断线" style="background-color:3D85C6;color:0BE7F4">↵</button> <button type="button" onclick="a_tag()" style="background-color:0F173B;color:BA95A7"><p>&lt;a&gt;</p></button> 
<select name="media_type" id="media_type" onchange="media_inser()"><option value="∅">媒体</option><option value="img">img</option><option value="video">video</option><option value="iFrame">iFrame</option></select>
<button type="button" style="background-color:D21E1E"><p>⏩</p></button>
<!-- Echo-Documentation: --><?php function echo_docs () { ?>
<h4>Documentation:</h4>
<p>H5S1: Syntax-docs: <b>H6S1</b>: 8-Span<br>
H7S1: ＜span style='background-color:<span style='background-color:00FF00'>[color.name-Hex]</span>'>＜/span><br>
* Enter a <a target="_blank" href="https://www.w3schools.com/colors/colors_names.asp">standard color name</a> or a valid.Hex-Code in the 00FF00-zone #<br>
H8S1: 00FF00-highl,green | <br>
H7S2: ＜a href='<span style='background-color:00FF00'>Link-URL</span>'><span style='background-color:00FF00'>Displayed-name</span>＜/a><br>
H7S3: ＜img width="" height="" src=""> In the src quotes, enter a URL to a web.img,video-等等
<?php } ?><!-- Error-cases --><?php // echo "hey"; ?>
<!-- KB-shorts:blind&post_ID=747-->
<script>document.addEventListener('keydown',function(键){if (键.key==='s'&&键.ctrlKey){键.preventDefault();f7F2A57.click();}
else if(键.key==='b'&&键.ctrlKey){/*id*/bold.click();键.preventDefault();}else if(键.key==='u'&&键.ctrlKey){underline.click();键.preventDefault();}else if(键.key==='i'&&键.ctrlKey){italic.click();}
else if(键.key==='1'&&键.altKey&&键.ctrlKey){head_n.value = "1";}/*onchange not trggr // Bug*/
else if(键.key==='Enter'&&键.altKey){断线.click();}
});</script>

<!-- Reference-URL: http://personal-dash/php_local_libs/edit.panel-inc.php -->
<!-- testing-log: 
Late.22-7th.3: Diffic w/ repl all note_snap w/ notes, 角_片.slice bc the snap-片 and notes(getElem), which edits HTML-dir, are used differen-cs; sim, 引结<snap> = notes.selectionEnd<dir-obj>;
Late.22-6th.14: removed <div> wrappers around button area to enable same.line-displ,calling
	onfocus dropdl reset: sum-funcs incl focus(); others, reset at func's end rt in-line onfocus iD #
Web-testing[Dash-MIC, backlog-manager] -> not yet func # 
12.31-22,5th.27:
	Try using this-> $here, and cite: https://developer.mozilla.org/en-US/docs/Web/API/HTMLInputElement/setSelectionRange (startindex, end-index)
		Assoc: converted note_snap var to contain the "notes" obj, rather than the value property of the object. Ref: Gran-Parse: Execution Line Ordering<MIC>as an Optimization-vect<Turing>
		Ini-testing: working for ✅ bracketser(), prop-later # 
12.31-22,5th.26:
	Trying to fix error of symbols not inserting when the default text inside input box has been updated to any extent; for instance, moving the initial text-container var outside of func<ala-Nadel>
		and swapping around .value and .innerHTML as attr of getElementById for the read, and write clauses # 
		Review: https://www.w3schools.com/jsref/jsref_slice_array.asp
	<left-fold>Apparent overlap: 
		The innerHTML property sets or returns the HTML content (inner HTML) of an element, including all spacing and inner HTML tags. https://www.w3schools.com/jsref/prop_html_innerhtml.asp https://www.w3schools.com/jsref/prop_node_textcontent.asp
		The value property sets or returns the value of the value attribute of a text field. The value property contains the default value OR the value a user types in (or a value set by a script). https://www.w3schools.com/jsref/prop_text_value.asp
			Both can "set and return"; 
	<left-fold>In both of these examples, what is set is a <p> tag, not an input element:
		https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_element_innerhtml_p
		https://www.w3schools.com/jsref/tryit.asp?filename=tryjsref_text_value
	Next: granular error segmentation testing # 
		Not seeing any major quantity of console-errs # 
		console.log(note_snap); before the .slice-write, when I multiplied the field.val-ini by 2, returns only 1 instance, the hard-coded setting; is the page refreshing? #rough This behavior # is unexpected;
			quite likely # this means the error is precedent, is the page...refreshing intermittently? In nadel.test-comp, the JS is same.page-script, and Nadel also <script> tags the JS # Behavior no.diff-wise # 
		When the read line is set to .value rt .innerHTML, console.log of the read-var does permit variation w/ the user input, such as field.val-ini*2; 
		bracketser() function was restored, seemingly, when both the read and write note_snaps were set to .value, rt .innerHTML # 
			✅ All-func is expected , tested | Focus is still not-func # 
	<left-fold>Focus is now working again, in light of the correction of read.write-value/innerHTML; updated, ✅ working for bracketser()
	<left-fold>when var note_snap read is moved outside of func-def, that read is not able to pull # dynamic.user-input, which is expected, because that user input should be retri'd in real-time, at moment of interaction w/ span.8-icon 
When the span-8 icons are displayed within<form/>tags, clicking them submits the form, disr-func # 
	http://personal-dash/post.post-number.php?author=blind&post_ID=575
Recall that textarea id and 2 onfocus-funcs need to be set # in the calling-doc<HTML.quick-render.php> -->
<!-- Issues: 
[Late.7th-3]document.getElementById("notes") repl.w-notes, via https://stackoverflow.com/a/23641956/20256608 Issue: redund.w/var-nom; if an HTML id="" is var-ref'd, that#, but if var[name], then over-wr<conjec>
[Late.22-5th.26]SNR button mapping is still a bit off # 
event.target.id conditional-handling, reduction to a single-func can reduce this file ~4/1 
<Anki-22><input onClick="{{c1::this}}.select();" Hu: There is no opportunity to use this in-line because neither in edit.panel-inc nor its callers are there internal.self-ref,execs<generally.late-22> -->
<!-- notes<Simul>: 
<a>tag: after add, display opt to add target="_blank" attr w/ second mouse-click; reset this option onfocus in field # 
edit.panel-inc: Envelop the buttons area div into a function in that inc, with the bare-HTML within a close-tag in a PHP-cond, within that func, and call that func, where the buttons are displ, on any calling-pages # 
	Even better: simpl, req-call on the line of the buttons'intend-appr w/ naked-HTML
Can I use contentEditable<HTML-attr>to make a WYSIWYG editor? https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement/contentEditable -->