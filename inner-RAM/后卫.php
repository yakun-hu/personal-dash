<?php require '../php_local_libs/mysql.query-inc.php'; if ($_SESSION["username"] !== "robert" && $_SESSION["username"] !== "blind") { ?><script>window.open('../login.php', '_parent');</script><?php } ?>
<head><title>Backlog-manager:</title><style>.l1 { grid-area: simul-top; background-color: #FFFFFF; border-style: solid; border-width: 3px; border-color: #1F1F1F;}
.r1 { grid-area: nadel-top; background-color: #FFFFFF; margin-top: 10px; margin-left: 20px; border-style: solid; border-width: 1px; border-color: #2196F3;}
.grid-container { display: grid; grid: 'simul-top nadel-top'; grid-gap: 1px; padding: 10px; height: 400px; width: 1000px; grid-template-rows: 400px; grid-template-columns: 1fr 1fr; text-align: left;} .grid-container > div { padding-top: 10px; padding-left: 10px; margin-right: 10px; } 
table {border-collapse: collapse; width: 100%;} td { border: 1px solid #dddddd; text-align: left; padding: 8px;} th { border: 1px solid #dddddd; text-align: left; padding: 8px;}
<!--sort-grid-->.sort1_simple {grid-area:sort1_simple}.sortr_s {grid-area:sortr_s}.grid-sort {display:grid;grid:'sort1_simple sortr_s'} </style></head>
<script>const selIndexObj={"∅":0, "in_prog":1, "mark_compl":3};</script>
<!--form.left--><div class="grid-container"><div class="l1"><h2>Personal-dash Website Backlog-<a target="_blank" href="https://scrumguides.org/scrum-guide.html">Scrum</a>:</h2>
<form id="主式后卫" method="post"><p>Task-title: <input required type="text" name="task_title"></input><span style='color:red'>* </span>Due: <input required type="date" name="due_date_f" value="<?php $d_date = date('d')+3; if(strlen($d_date)==1){$d_date="0".$d_date;} echo date('Y-m-').$d_date;?>"><br>
Task-type: <input style="vertical-align:sub;"type="checkbox"name="prom"onchange="置链();">Promise<input type="checkbox"style="vertical-align:sub"name="phi"onchange="置链();">Philo<input type="checkbox"name="m_kats"style="vertical-align:sub"onchange="置链();">＜-Micro.Kats<input type="checkbox"name="big"style="vertical-align:sub"onchange="置链();"><a href="upwork.com/freelancers/~0165d626c768f8f3fe/"target="blank">大</a><input type="checkbox"name="rel"style="vertical-align:sub"onchange="置链();">Rel<br>
Tech: <input required name="tech" type="text" style="width:300px" value="PHP, WordPress, HTML, etc"><span style='color:red'>*</span><br>
<textarea required id="notes" name="notes" onfocus="document.getElementById('head_n').value = '∅'; document.getElementById('media_type').value = '∅';" style="width:400px;min-height:200px;margin-top:2px">Description:</textarea></p>
<div style="margin-top:2px"><?php /*span-8*/require'../php_local_libs/edit.panel-inc.php';if(isset($_POST["task_title"])){ins_assembl_sql();}?><input id="f7F2A57"style="display:inline;background-color:944761" type="submit" value="Save"></div></form></div>
<!--docs-right--><div class="r1"><?php /*span-8*/echo_docs();?>
<h4>Instructions:</h4><p>Use the form on the left to submit a new feature request; once submitted, only the developer will be able to edit; you can submit change
requests to me via Upwork messages.</p>
<h4>Project-summary:</h4><p>Calculations: preview if a synchro/migr task will have enough free space on the receiving side; calculate the "synchro-margin" and run an if-comp/a/r w/ that free-space # |
 WordPress[<a href="https://automattic.com/about/" target="_blank">Automattic</a>], Gutenberg, and Woo-Commerce
<br>超链 <a href='../post.post-number.php?author=blind&post_ID=376'>Back⬆️to-do</a> | <a href='../post.post-number.php?author=blind&post_ID=8'>Dash.inx-1</a> | <a href='../post.post-number.php?author=blind&post_ID=613'>Legacy-后卫</a> | <a href='../media/media-player.php'>Media-放器</a> | <a href='../post.post-number.php?author=blind&post_ID=459'>本-dev</a></p></div></div>
<h2>Back-log:</h2>
<!--h4--><div id="布告" style="display:flex;height:30px;line-height:30px;vertical-align:middle;text-align:center"><div style="flex-grow:1;background-color:2F3A84"><a href="后卫.php?板=prom&pg_数=1#布告" style="color:B13B3A"id="1标"><h4>Promise</h4></a></div><div style="flex-grow:1;background-color:F0B5B5"><a href="后卫.php?板=phi&pg_数=1#布告"style="color:FFF0CB"id="2标"><h4>Philo</h4></a></div><div style="flex-grow:1;background-color:38761D"><a href="后卫.php?板=sort&pg_数=1#布告"style="color:F1C232"id="3标"><h4>Sort</h4></a></div><div style="flex-grow:1;background-color:3C5977"><a href="后卫.php?板=rel&pg_数=1#布告"style="color:F2F0D3"id="4标"><h4>Rel</h4></a></div><div style="flex-grow:1;background-color:125274"><a href="后卫.php?板=m_kats&pg_数=1#布告"style="color:C79E5C"id="5标"><h4>Micro-Kats</h4></a></div><div style="flex-grow:1;background-color:E80508"><a href="后卫.php?板=Big&pg_数=1#布告"style="color:F1B70F"id="6标"><h4>Big</h4></a></div></div></h4>
<!--sort.displ-if--><?php $db_obj=select_assembl_后卫();?><?php /*overr's*/if(isset($_GET["post_ID"])){$db_obj=序输_ssembl("select * from to_do_blind where post_ID={$_GET['post_ID']}");}else{if(($_GET["板"])=="sort"){if(isset($_POST["序输"])){$db_obj=序输_ssembl($_POST["序输"]);}?><div class="grid-sort"><div class="sort1_simple"><form method="post" style="margin-top:10px"><textarea required name="序输" style="width:800px;min-height:200px;vertical-align:top;">主菜:SQL-synt</textarea><button style="transform:translate(-45px,170px);background-color:E80508;color:F1B70F">Fire</button></form></div><div class="sortr_s"><h3>SQL.quer-stats:</h3><p>Sort_echo | Quick_procsTM<button>1</button><button>2</button><button>3</button><button>4</button><button>5</button></p></div></div><?php }}?>
<!--tbleau-set--><table><tr><th>task_title</th><th>tech_notes</th><th style="width:70%">description:</th><th>status</th><th>due⏱️</th></tr>
<!--concise-loader➡️--><!--loop-meta--><?php $计数=1;$计结='假';$介于_首位=intval($_GET['pg_数'].'1')-10;/*<setters-loop->*/while($计结 !=='true'&&$这排=$db_obj->fetch_assoc()){$计数=$计数+1;if($计数 >= $介于_首位){?>
<!--row-liner➡️--><tr><p hidden id="attr<?php echo$这排['post_ID'];?>"><?php echo$这排["attributes"]."|".字串关联数组($这排["attributes"])["status"];?></p>

<td><?php echo$这排["task_title"];?></td><td><?php echo$这排["tech"];?></td><td><?php echo$这排["notes"];?></td><td>

<select id="item_status<?php echo$这排['post_ID'];?>" onchange="status_exec()">
<!--def-opt--><option value="∅"><?php echo"ID=".$这排['post_ID'];?></option>
<!--opt-1--><option style="background-color:00FF00" value="in_prog">in-progress</option>
<option style="background-color:F0B5B5" value="del">delete</option>
<!--opt-2--><option style="background-color:38761D;color:FFFFFF" value="mark_compl">mark-compl</option>
</select><span id="save_dr<?php echo$这排['post_ID'];?>"></span>

</td><td id="save_日<?php echo$这排['post_ID'];?>"><input type="date" id="<?php echo$这排['post_ID'];?>" value="<?php echo$这排["deadline_date"];?>" onchange="status_exec()"></td>
<script>document.getElementById("item_status"+"<?php echo$这排["post_ID"];?>").selectedIndex=selIndexObj["<?php echo 字串关联数组($这排['attributes'])['status'];?>"];</script>
</tr><!--no.issues-tbl,ordr*-->
<!--loop-clos--><?php }if($计数==intval($介于_首位+10)){$计结='true';}}?></table><!--paginators--><p><?php if(intval($_GET['pg_数'])!==1) {?><a id="前页" href="<?php echo '后卫.php?板='.$_GET["板"].'&pg_数='.intval($_GET['pg_数'])-1 .'#布告';?>">Prev-page | </a><?php }?> <?php if($计结 !== '假'){?><a id="下页" href="<?php echo '后卫.php?板='.$_GET["板"].'&pg_数='.intval($_GET['pg_数'])+1 .'#布告';?>">Next-page</a><?php }?></p>
<!--ref-URL: http://personal-dash/inner-RAM/后卫.php?板=Promise&pg_数=1#布告 -->
<!--load-funcs⬇️--><?php /* form-ins: */ function ins_assembl_sql() { global $conn; $task_title = mysqli_real_escape_string($conn, $_POST["task_title"]); $tech = mysqli_real_escape_string($conn, $_POST["tech"]); $notes = mysqli_real_escape_string($conn, $_POST["notes"]); $post_ID = highest_post_ID_sess("to_do_{$_SESSION['username']}")+1; $today_date = date("Y-m-d");
$attributes="status=∅;";if(isset($_POST["prom"])){$attributes.="prom=true;";}if(isset($_POST["phi"])){$attributes.="phi=true;";} if(isset($_POST["m_kats"])){$attributes.="m_kats=true;";} if(isset($_POST["big"])){$attributes.="big=true;";} if(isset($_POST["rel"])){$attributes.="rel=true;";} // echo $attributes;
$table_n="to_do_blind";$columns_array=array("task_title, ", "post_ID, ", "start_time, ", "deadline_date, ", "attributes, ", "tech, ", "notes"); $values_array = array(); array_push($values_array, "'$task_title', ", "'$post_ID', ", "'$today_date', ", "'{$_POST["due_date_f"]}', ", "'$attributes', ", "'$tech', ", "'$notes'"); 
/* call-SQL,inc */ ins_row_gen($table_n, $columns_array, $values_array); } 
function/*analy-2*/select_assembl_后卫(){$行_列=array("*");$指标行列=array("attributes", "AND attributes");$指标经营列=array("LIKE", "NOT LIKE");$指标val列=array("'%{$_GET["板"]}=true%'","'%status=mark_compl%'");$order=array("post_ID","DESC"); // '<-JS.str-delim,PHP->"
/*call-SQL,inc*/ return 选出_rows_any("to_do_blind",$行_列,$指标行列,$指标经营列,$指标val列,$order);}
function 序输_ssembl($差_SQL){global $conn; return $conn->query($差_SQL);}?>
<script>function status_exec(){if(event.target.type=="date"){var 执行载荷="date='"+event.target.value+"'"+"|"+event.target.id;console.log(执行载荷);}
else {let 地位/*status-obj*/=event.target;var post_ID=地位.id.slice(11);console.log(post_ID);
if(地位.value=="in_prog"||地位.value=="mark_compl"){var 执行载荷/*message.to-PHP*/="payload="+document.getElementById("attr"+post_ID).innerHTML+"|status="+地位.value+";|"+post_ID;console.log(执行载荷);}
else if(地位.value=="del"){location.href='../delete-confirm.php?板=<?php echo$_GET["板"];?>&pg_数=<?php echo$_GET["pg_数"];?>&post_ID='+post_ID+'&本=to_do';}}
/* Ajax: 准并-开火 */let 包裹=new XMLHttpRequest();包裹.open("POST","../php_local_libs/mysql.query-inc.php",true);包裹.setRequestHeader("Content-type", "application/x-www-form-urlencoded");包裹.send(执行载荷); 
/*resp-displ*/包裹.onload=function(){document.getElementById("save_dr"+post_ID).innerHTML+=this.responseText;}}
/*kb-shorts*/document.addEventListener('keydown',function(键){if(键.altKey){if(键.key=='ArrowRight'){下页.click();}else if(键.key=='ArrowLeft'){前页.click();}else{document.getElementById(键.key+"标").click();} }})
/*dest-contr*/function 置链(){主式后卫.action="后卫.php?板="+event.target.name+"pg_数=1#布告"}</script>
<!-- testing: 
[7th-4]
Uncaught TypeError: Cannot read properties of null (reading 'click') at HTMLDocument.<anonymous>: 
<script>document.addEventListener('keydown',function(键){键.preventDefault();
if(键.altKey){
	if(键.key==='right'){下页.click();}
	else if(键.key==='left'){前页.click();}
	else {document.getElementById(键.key+"标").click();}
	}
})</script>
[Late.6th-22]
	slice(11) is respo to len item_status pref; JS cannot call later<script>func, 陈_菜单 de-func'd 
	Bug: only post_ID = 11 attr are updated, and its notes is also pushed, upon each AJAX-fire 
		status_exec console.log(post_ID) shows 13; AJAX-ret, corr-row# $post_ID was hard.cod'on-$_POST ✅
	Bug: at 9-10 posts, next page appears, but that page is empty; the same bottom post is sel'd top # at 11-tot, the bottom 2, sel'd top-2 | only 1/2 of the calc'r is brok
		there may be 2 bugs; both rel' "termination" while was missn$计结 !=='true'
	Bug: sending this.responseText, to save_日 rt save_dr works, but I cannot receive the echo from the if post=date case # 
		this.responseText has a data-ty that constr<block>it from use in var.decl-val and if cond # 
		reason: the responseText contains comment-lines; when exec'd in JS, text; when exec'd in HTMl, the comments are extr'd However, HTML does not cleans
			But this seems-expl, 1/2-pr | There-f, I cannot use responseText as the cond-proc,JS; use the payl-inst# in either-case, the echo of date-case, not incl'd
[Late.22-6th.15]
	ins_row_gen assembly test run-1: ins-made, but no imm-SEL # refr'd, sel'd 
		Echo'd; INSERT INTO to_do_blind (task_title, post_ID, start_time, deadline_date, attributes, tech, notes) VALUES ('Fuckin Legit', '3', '35', '45', 'null=null;phi=true;m_kats=true;', 'PHP, WordPress, HTML, etc', 'Description:')
	Test in backlog-manager for updating in_prog status to db-attr: 
		The idea is that when a JS-func is called via the HTML event, all code inside the { } of the JS-func will exec including what I’ve termed a “php encap” Cont: analogue-AJAX!
	12.31-22,5th.24:
		A $_POST from insert, in prec-load, is SELECTED within the next-load # 
		<WP-MIC>In PHP, session_start(); connects the current script to the Stratospheric ⚠️ Session, before actions, including var-call, can be acted, upon that session<stream>
	12.31-22,5th.23:
		window.open in the echo-less str: performance is adequate in ini-testing # 
	db-testing: Hard-core mode, MIC.leap,dev-prod, leave on dream-host 
	First test, values 'test' and '0' inserted to db # 
		$sql = "INSERT INTO users (username, password) VALUES ('test', 'test')";
		$conn->query($sql); 
		echo $conn->error; 
	Reason<diagnosed>password field data type set to int 
	When the span-8 icons are displayed within<form/>tags, clicking them submits the form, disr-func # 
	Web-testing:
		Errant.login-redir, when logged in as "robert"; since redir->login.php works, then the ?php tags and cond.exec-line are working; issue
		is with username.str-recog<2.4-54k,possibilities>
		Issue: This page, uniquely as opposed to an echo test, containing only session_start() and echo $_SESSION, is failing
			to echo $_SESSION["username"]; but that encap-within can echo a naked-str; 
			Next test: is session_start() fail? When require edit-panel<sole.require-80%,fast>is rem'd, echo["username"] still fails # 
			Fundamental: echo $_SESSION only works in the context of session_start/resume, in script, confounding-issue # 
				Partial-✅: session_status() in this web-doc is 1, whereas in a session_start() test without any, and I mean any # code on page, status is 2: 
					Ref: https://www.php.net/manual/en/function.session-status.php
					Logically, it's not clear # why a session_status() that immed-follows session_start would return 1; that code-line must be non-run # 
						Recall that even a gen-session<LDS>has to be ref'd via session_start on any present script #defd 
					A "holy-fuck"lichess.org/P9qpA03K[q.tum-outc]<fbno>; removing an HTML-comm <!-- --＞ at doc-top # -->
<!-- notes: 
[Late-6th,21]ordr*the tbl.r-1 is within the while-l, so when # there is 0 loops, there is no echo, when-in | Highl due-box diff-colors depending on compr-ineq w/ today's date and Sort() <analyzer> 
===
function status_exec<AJAX> /* update status:value attribute in db; select, and set this, as default #; try: PHP.multi-thr, a sql-statement, w/o AJAX; getting row Post_ID? query-selector */ /* transform: reveal a "Confirm" icon that deletes and redirs to the same URL#target<mal-pr><tabbed-headers> */ /* PHP UPDATE multi-thr, status-attr */
Ssg_display: within the context of a form, that itself, can be submitted:
S.n-r sub-icons needs to be over-ride: style="position:absolute;top:251px;left:172px;", all-3 using a JS getElementById over-ride # 
Work p-dash in as project evolves # 
Add log.out-button 
[12.31-22,5th.23]: Backlog-manager: Web experience: redirect to login.php if session username does not exist, or does not match the prescribed user # 
Once logged in, user will be directed to index.php, from login.validate-redir.php; on the DreamHost site, build a temp-AAM handler that checks for username = 
	Robert, and redirect that user specifically to backlog-manager, which will be his homepage # 
Backlog-manager push to production: require error solved; next, I use several header redirects in association with Session to handle log-in bounces and redirs; this will be a time to impl window open() from JS # 
login.php validation will not be working yet because the $conn is from db-conn, up-path, and I have not input the correct db-details there; for sec, insert the correct db-conn to db.conn-inc.php on Dream-Host, 
	and stop touching that file, and from other files, require db-conn, rather than injecting the SQL.root-login,info, again # 
For online version, let's just make # index.php a pure-redir for now; later, I can add an advertising homepage for dash, that logged.in-users will not have to see; also, user-specific access info, including 
	the log-in redir, can be stored in the users_tb, in an attributes column<new!>, and users can choose in settings, these AAM-perms # 

Attributes: 3 additional columns in backlog manager: 1) estimates hrs 2) actual hrs 3) status, plus the form, and leave it there for MVP
	attr-constr should be much easier than splitting the string later, to reform the key.value-pairs 
Done: Build a dummy # test-table for backlog_manager_cadets in db.main-local w/ same intended name # as on dash-Dream<clout>	
Session_start(): // Currently I have no mysql-incs on this page, so there should be # no session_start redundancy #

Architech:
	Tutorial suggestion: use if ( isset = the name of the submit button to initiate form processing; I will have # 2 forms on page, so 2 total condition trees, no function-env’d
		Merger: dash->to.do-feat, merge backlog manager w/ that-feature # 
			I can create meta tabs ala # message-board and users can toggle which type of # to do item, in 4 different categories, they see, and the names of these can be customized #; note that if this is changed later, it will cause a db-SELECT conflict in my present impl
				This, combined with pagination within each tab<message-板>can keep me within the Rule of 9<WP-MIC> 
		Later: add a permissions box; new dash: Permissions; permissions can be stored in attr in users_tb for global perms, on a post spec basis, or for an entire service like backlog, to-do, etc # 
	Check how I handle # private checkbox attr in dash-save and clone this 4x for the 4 checkbox attr # 
	Also, the workflow for drawing it into display # in the archive-ver
		Table: add a post_ID column and use the post_ID incrementer in dash.insert-redir to generate the post_ID value 
	
To.do-fodl:
Fold to do feature into backlog manager and merge the 2, and cont dev from there: implement pushes from dash, and test span-8 there<final-stage>; next: add the media backlog, and take a look at Twitch-API 
1) AJAX HTTP-req in mysql-query; investigate, how general it should be #
2) SELECT & APPEND ssg with generalized table as arg to be used in any user_tb in his db | =blind&post_ID=598, Db-管理
	The post_ID of dash should be ref.link'd from the to.do-item; also, add Date-added and Estimate columns, and prompt this from dash-edit # leave the backlog-manager form untouched.as-is, for now. 
		Place date-added and estimate into the Form for to.do-push from dash-edit, and append these into attr-column in db_table; extr this, into 2 display columns in the to-do,displ
3) In-line marker displ'd in post-number and dash-edit, linking to precise-loc in to-do of the INSERT # 
	When redir to to_do, # into the precise table-loc, skipping the input-form at the top # 
		Ref: http://hu-lab/message-板.php?板=faculty&pg_数=1#布告
4) Back.log-manager,displ:
	From hu.lab-message,板: add 6 "department" tabs; aggregated from attr # can be adj using settings, recombinatorily, and dynamically (ie: date count-down)(analyzer.loa-2)
		Linking from dash-mains will be a chal' then 
			I can do a deferred conditional search<red.unleash-MIC>where if the link'd loc does not return the originally reg'd to.do-ID, that is $-there, then a secondary, deeper, incl-comprehen,search is ini'd, 
				and subseq the updated-loc can be updated in the dash-mains link, as an attr in that post_ID,mains; the attrs can have a multi.thr'd dict to contain multiple.loc-attrs
					Dev.prior-level: as-needed
		Tab-names: Promises, to do items triggered start by meeting a condition | 2) Micro-Kats 3) Philo 4) Rel 5) Big | Sort, fold <days into this from pre-MVP<fbno>This category will not appear in check-boxes, but will be a tab for sort. 
	Pagination: one every base-9 
	Addi-cats:
		Mark as Complete - save to history for now; attr:history will not be shown in regular tabs; separate clock emoji icon<innovatif!>Separately, add a del-button via transform
	a) Notif
		To-do: display a notifier # adj-each cat name that is post_proc stor'd in the file, and updated w/ count upon edits, sans any db-invol: delete, "Save" button press forks<Turing>
		Can: displ a total-sum next to "Back-log", and this-be # counted novel-wise per load; the counts can be manual-upped; the incr is algo'd, but the value, static # 
5) Input form from dash-edit: expandable pop-up, in-line, onfocus, test # 
	also need a JS action to slice and extr, define as variable, the sel-range’d.text 
	Dash-edit input form: onfocus: expose a (+) at selectionStart row height, right of box # 
	This action can also lazy-load a require<later>containing the 代码 for this-feat 
	The edit.panel-require can also be trigger’d-loaded by the first focus into the dash.edit-textarea.
	Concept: Fold back to dash, thematic for RAM-funcs, an option to re-insert the now to.do-descr back into the dash-field, at the og.sel-range, replacing, or appending # the og-text: problem: the index may have moved from independent edits to dash-edit # 
	
	Use cases:
		In Cadet_Gear, Robert might want to set an assignee for a task, and this can be a "department" or an attr-in,line 
		Backlog-manager: tutorial suggestion: use if ( isset = the name of the submit button to initiate form processing; I will have # 2 forms on page, so 2 total condition trees, no function-env’d
		Check how I handle # private checkbox attr in dash-save ans clone this 4x for the 4 checkbox attr # 
		A post_proc’d 500<lite>that is weekly db-sync’d in file such as a “flash-req”<html, compr>fold # file<v-t>
		<b>Post</b>I can append 7-0s to the dash_post_ID #payload @blind&post_ID=459
		Potential idea: a meta-controller table that controls, and has the columns-gen,for, the other tables in v.host-db
		When users land on backlog-man, they can be header-redir'ed if pass username check etc to &p1=1&p2=34&p8=58; the array to feed # ?author=blind&post_ID=459 h4: Pagination-index'n
		Q: Where will this array be stored? 1) a pagination-index,CSV.inc 2) this file, w/ fwrite<concern> 3) a post_ID = -1 <imagin-#> unused in the SQL-tbl #Keep-3
			Run another scope of PHP file-sys and de-sele if too diff ; issue: the contents of an array are hidden-vis, so I need to<late-22>run a command to re-instantiate the var; unless I write the numbers dir into HTML, and use JS getElementById to instant; the array de novo each load<n-p>
				fwrite is #clunky but no more so than SQL | IIRC # novel instanti is the sole-opt in file, since logically an array cannot persist<late-22>
				Novel-instanshi: needs also str_tok proc, but so does sel from db # ; I can also reserve, and this is the key-conc, lines in the scr is the operator of PHP.file-sys,prim<index><late-22>
		Build in lazy loading and caching concepts to backlog-man working.MVP-2
		Build the array feed into URL w/ hard coding, make 10 sample posts, so build INSERT, then code the dynamic array-gen #, w/ some speed testing <parshal-dec’i>w/ URL-incr
			Use db-impl due to vis-defl + degrade.6-rows, whereas in-doc, loads all # time; issue; in db, I have to sel # all post_id rows to grab the rows, so there’s a bidir scal-bloc #math 
		Time: SQL grids # also has a time-attr 
			This func can iso-get a specific line from file: https://www.php.net/manual/en/function.fgets.php; issue w/ separating the records for each cat into diff csv-files is multipl.HTTP-req,cnt https://www.php.net/manual/en/function.fseek.php blindly moves a file pointer # 
			Returns: current cursor pos https://www.php.net/manual/en/function.ftell.php 
			Weird idea: don’t use vars in URL-push; hardcore URL-vals; there are 5 pages per cat # Dynamic cache file gen & temp-stor # This-func can # shortcut # strktok assembly into 1 step: https://www.php.net/manual/en/function.explode.php; format such as 1,3,8,88,235 # CSV name️<caution>
			This func can be fed a str from the file or db-sel # Delete an ID and mark as compl will bump that ID off all cat-arrays; this can be compl post_proc # w/ cond displ that doesn’t break<Anki>
				Order within won’t change, however, if I bump a complete back to displ, it should go back in the same spot # <hold-em>99% explode<>implode[PHP]to pack an array to db<agn>️and when in RAM-trans, insert mid-index #, or edit at any index[#] = new.value <twats>stremble / string-break
			lite-MVP: build sel w/o ind.x’ for now; use compr where, not etc conds 
			Can use: NOT-Like https://www.digitalocean.com/community/tutorials/sql-like-sql-not-like
		Attendance-Tracker 
	Task types:
		Daily tasks: Add 50 Anki cards for Intellipaat daily to course end # 
		Tasks by search[tags]
			Back-man: Index.attmpt-2<10.22-6,strtch>Cascade the redir-folder and add a to.do-create, standard workflow # 
		Ongoing tasks:
			Incr: #->id URLs; Backup-Sync folder dir-links from dash # <inter-op><thru-pu>
			Schedule: Wednesdays # go for a run, 7:30 Chinese Church # 
			Mondays: social + athl
			Tuesdays: "prophl" would like to have 10 rotating options, inter-ex group #MVP #life-quality
		Reading progress: Sub.modulo-4,7<start>
		File-attachm
		
Final.kats-MVP,full: M_Kat: Sel.1-row M_KAT: date-cols; start_time nev-upd, and dead_da will take the overwr.POST-inp # No-need for esc bc: on update, I take no text-inputs # 
	Promise: Each HTML id within row # shoudl carry # the $post_ID 
	M_Kat: Select date from db and displ w/ JS<PHP-back>;encap-need does I ins the input type="date" to deadline_date? H5S1: Also needs: write today's date in "start_time", for.now-2
--> 
<!-- issues: 
[Late.22-6th.8] Status drop-down w/ state-persist needs-be assoc'd with a post_ID # 
[Earlier]
The width of the description column, at minimum, may need to be limited, after obs.default-HTML,behav-->
<!-- references: 
Deferred-doc<nf,wm>?author=blind&post_ID=693 "Indexing-job"
	2) ?author=blind&post_ID=459 "To.do-feature"
$this = "30.line-Trello" 
https://codehandbook.org/default-value-html-select/<caution>
https://www.w3schools.com/php/php_date.asp https://www.w3schools.com/TAGS/att_input_type_date.asp
https://www.w3schools.com/jsref/jsref_search.asp 
Y - A four digit representation of a year https://www.w3schools.com/php/func_date_date.asp
https://www.w3schools.com/sqL/sql_top.asp where is FETCH [Range]? 
hu.lab-web: message-board.php[paginators, board selector loop 
https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement/hidden 
"event.target returns the DOM element, so you can retrieve any property/ attribute that has a value" stack.overfl:what-properties-can-i-use-with-event-target
digital-ocean: tutorials/sql-like-sql-not-like#sql-not-like -->
<!-- ideation:

attr-index'in; step 1: select, only attr, "remembering the row", or passing to an index'd column parallel, to grab data-REST 
	Attr-column is among the lightest, a "moderate-index" 
	Index is for Search, even the data-full 
	
The tabulo-modularity of backlog-do permits cascade.lazy-load<caution>of huge volumes of data # -->

<script>bold.style = "position:absolute;top:362px;left:166px;background-color:black;height:30px;color:#FFFFFF";italic.style = "position:absolute;top:362px;left:188px;background-color:blue;height:30px;color:white";underline.style = "position:absolute;top:362px;left:206px;background-color:00FF00;height:30px;color:white";</script>
