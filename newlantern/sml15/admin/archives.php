<?
include ('config.inc.php');
include ('paginator.class.php');

if ($_GET[m])
{
	$delete_query = "DELETE FROM mailinglist_messages WHERE id = '$_GET[m]'";
	$delete_result = mysql_query($delete_query) or die("Query failed : " . mysql_error());
	$deleted = mysql_affected_rows();

	$clear_queue_query = "DELETE FROM mailinglist_queue WHERE message_id = '$_GET[m]'";
	$clear_queue_result = mysql_query($clear_queue_query) or die("Query failed : " . mysql_error());
}

$query = "SELECT * FROM mailinglist_messages ORDER BY created DESC";
$result = mysql_query($query) or die("Query failed : " . mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Message Archive</title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.3.0/build/container/assets/container.css">

<!-- Dependencies -->
<script type="text/javascript" src="http://yui.yahooapis.com/2.3.0/build/yahoo-dom-event/yahoo-dom-event.js"></script>

<!-- OPTIONAL: Animation (only required if enabling Animation) -->
<script type="text/javascript" src="http://yui.yahooapis.com/2.3.0/build/animation/animation-min.js"></script>

<!-- OPTIONAL: Drag & Drop (only required if enabling Drag & Drop) -->
<script type="text/javascript" src="http://yui.yahooapis.com/2.3.0/build/dragdrop/dragdrop-min.js"></script>

<!-- OPTIONAL: Connection (only required if performing asynchronous submission) -->
<script type="text/javascript" src="http://yui.yahooapis.com/2.3.0/build/connection/connection-min.js"></script>

<!-- Source file -->
<script type="text/javascript" src="http://yui.yahooapis.com/2.3.0/build/container/container-min.js"></script>

<script>
function swap(group)
{
	if (document.getElementById(group).style.height == '200px')
	{
		document.getElementById(group).style.height= '30px';
	}
	else
	{
		document.getElementById(group).style.height= '200px';	
	}
}

function do_divs(x)
{
	var divs = document.getElementsByTagName('DIV');

	if(x == 1)
	{
		for(var i=0;i<=(divs.length)-5;i++)
		{
			document.getElementById(i).style.height= '200px';
		}
	}
	if(x == 0)
	{
		for(var i=0;i<=(divs.length)-5;i++)
		{
			document.getElementById(i).style.height= '30px';
		}
	}
}

function besure()
{
	return confirm('You are about to permanently delete the selected message. Are you SURE you want to continue?');
}

function process()
{
	var responseSuccess = function(o)
	{
		if(o.responseText > 0)
		{
	 		document.getElementById("remain").innerHTML = o.responseText;
			document.getElementById("manual").style.display = '';
			document.getElementById("anim").style.display = 'none';
			document.getElementById("consume_message").innerHTML = "Messages processed. <a href=\"javascript:void(0)\" onclick=\"closeRefresh();\">Click here</a> to close this panel and refresh the archives";
		}
		else
		{
			document.getElementById("consume_message").innerHTML = "Queue empty. <a href=\"javascript:void(0)\" onclick=\"closeRefresh();\">Click to close this panel and refresh the archives</a>";
			document.getElementById("manual").style.display = 'none';
			document.getElementById("anim").style.display = 'none';
		}
	}
	document.getElementById("manual").style.display = 'none';
	document.getElementById("anim").style.display = '';
	all = (document.dlgForm.manual_all.checked) ? "1":"0";
	sUrl = "manual_consume.php?all="+all;
	var callback =
	{
		success: responseSuccess,
		failure: function(o) {alert(o.tId + o.status + o.statusText );}
	}
	var transaction = YAHOO.util.Connect.asyncRequest('GET', sUrl, callback, null);
}

function closeRefresh()
{
	queueDialog.hide();
	window.location='archives.php';
}
</script>

<style type="text/css" media="screen">@import "css/basic.css";</style>
<style type="text/css" media="screen">@import "css/tabs.css";</style>
<style type="text/css">
.paginate {
    font-family: Arial, Helvetica, sans-serif;
    font-size: .9em;
}
a.paginate {
    border: 1px solid #666;
    padding: 2px 6px 2px 6px;
    text-decoration: none;
    color: #333;
}
a.paginate:hover {
    background-color: #CCC;
    color: #000;
    text-decoration: underline;
}
a.current {
    border: 1px solid #666;
    font: bold .9em Arial,Helvetica,sans-serif;
    padding: 2px 6px 2px 6px;
    cursor: default;
    background:#777;
    color: #FFF;
    text-decoration: none;
}
span.inactive {
    border: 1px solid #999;
    font-family: Arial, Helvetica, sans-serif;
    font-size: .9em;
    padding: 2px 6px 2px 6px;
    color: #999;
    cursor: default;
}
#zeropct {
	display: none;
	color: #A00;
}
.mask {
    -moz-opacity: 0.5;
    opacity:.50;
    filter: alpha(opacity=50);
    background-color:#666;
}

#myDialog .ft {
	text-align: center;
}

#myDialog .hd {
	background-color:#999;
/*    border: 2px solid #CCC; */
	border-top: 0px none;
	border-left: 0px none;
	border-right: 0px none;
	border-bottom: 1px solid #000;
	text-align:center
}

#manual {
	text-align: center;
}
</style>
</head>

<body>

<?
if ($_GET)
{
	if ($deleted) echo "Message successfully deleted\n";	
}
?>

<h1>Golden Dragon Mailing List</h1>

<div id="header">
	<ul id="primary">
		<li><a href="send.php">Send Message</a></li>
		<li><a href="members.php">Members</a></li>
		<li><span>Archives</span></li>

	</ul>
</div>
<div id="main">
	<div id="contents">
			<h2>Archives (<?=mysql_num_rows($result)?> messages)</h2>			
			<p class="note">Messages you have sent or queued are displayed below with the most recently created at the top. To view a message in a popup window in its final form
			(useful for HTML messages), click the <img src="newwin.gif" border="0"> icon.<a href="help.php#zeropct"><span id="zeropct"><br />Why is my progress bar stuck at 0%? Why aren't my messages being sent?</span></a></p>
<?
if($config['use_queue'])
{
	$curr_unix_time = time();
	$queuecount_query = "SELECT COUNT(*) FROM mailinglist_queue WHERE send_after <= '$curr_unix_time'";
	$queuecount_result = mysql_query($queuecount_query) or die("Query failed : " . mysql_error());
	$queuecount_count = mysql_fetch_row($queuecount_result);
	$afterclick = $queuecount_count[0] - $config[queue_size];
	if($queuecount_count[0] > 0) echo "To manually process queued messages <button onclick=\"queueDialog.show();\">click here</button>";
}
?>
			<div align="center">
<?
$pages = new Paginator;
$pages->items_total = mysql_num_rows($result);
$pages->mid_range = 7;
$pages->paginate();

$query = "SELECT * FROM mailinglist_messages ORDER BY created DESC $pages->limit";
$result = mysql_query($query) or die("Query failed : " . mysql_error());

if(mysql_num_rows($result) > 0)
{
	echo "<h3>Click to show/hide a message. <a href=\"javascript:void(0);\" onclick=\"do_divs(1)\">Show All</a>/<a href=\"javascript:void(0);\" onclick=\"do_divs(0)\">Hide All</a></h3>\n";
	echo "<span class=\"paginate\">Page </span><span style=\"padding:8px;border:1px dotted #999;\">";
	echo $pages->display_pages();
	echo $pages->display_jump_menu();
	echo $pages->display_items_per_page();
	echo "</span>";
}

$counter = 0;
while ($row = mysql_fetch_assoc($result))
{
	// query queue table and count addresses for this message id
	// divide total messgaes sent (first query) by the count and round down
	$queue_query = "SELECT COUNT(*) FROM mailinglist_queue WHERE message_id = '$row[id]'";
	$queue_result = mysql_query($queue_query) or die("Query failed : " . mysql_error());
	$queue_count = mysql_fetch_row($queue_result);

	$percent = @floor((($row[count]-$queue_count[0])/$row[count])*100);
	echo "<p><table width=\"100%\" border=\"0\" id=\"table2\" cellpadding=\"0\" cellspacing=\"2\">\n";
	echo "<tr><td class=\"message\"><b>Created:</b> " . date("F j, Y @ g:i a",$row[created]) . "</td><td class=\"message\">";
	echo "<b>Sent to:</b> $row[count] subscribers (<img src=\"bar.php?p=$percent\" height=\"6px\" width=\"100px\"> $percent% complete)</td>\n";
	echo "<td><a target=\"_blank\" href=\"popwin.php?m=$row[id]\" title=\"Click to display message in new window\"><img alt=\"Click to display message in new window\" src=\"newwin.gif\" border=\"0\"></a></td>\n";
	echo "<td align=\"right\" class=\"message\"><a onclick=\"return besure();\" href=\"archives.php?m=$row[id]\">Delete?</a></td></tr>\n";
	echo "<tr><td><b>Begin Delivery on:</b> " . date("F j, Y @ g:i a",$row[queued]) . "</td><td colspan=\"2\"><b>Subject:</b> $row[subject]</td><td><b>Sent as:</b> $row[format]</td></tr>\n";
	echo "<tr><td colspan=\"6\"><div onclick=\"swap('$counter');\" class=\"message\" id=\"$counter\" style=\"width: 650; cursor:pointer; cursor:hand; height: 30px; padding: 8px; border: 2px solid #808080; background: url('postmark.gif') no-repeat right top; background-color: #DDDDDD; overflow: auto;\">\n";
	echo nl2br(htmlspecialchars($row[message])) . "</div></td></tr></table></p>\n";
	$counter++;
	if($percent == 0) echo "<script>document.getElementById('zeropct').style.display = 'inline';</script>";
}

if(mysql_num_rows($result) == 0)
{
	echo "<h3><p>&nbsp;</p>You currently have no messages in your archive. Why not <a href=\"send.php\">send</a> one?</h3>";
}
else
{
	$num_msgs = mysql_num_rows($result);
	echo "<br /><span class=\"paginate\">Page: </span>";
	echo $pages->display_pages();
	//echo $pages->display_jump_menu();
}
?>
		</div>
	</div>
</div>
<p align="center" class="message"><a href="../../index.php">Back to Website</a></p>

<div id="myDialog">
	<div class="hd">Simple Mailing List - Manually Process Message Queue</div>
	<div class="bd">
		<form name="dlgForm" method="POST" action="">
			<div id="manual"><p><span id="remain"><?=$queuecount_count[0] ?></span> messages remain in the queue available to be sent. 
			<button type="button" onclick="process()">Click to send <?=$config['queue_size']?> messages now</button></p>
			<p>To process <u>all</u> reminaing messages in the queue, click here <input name="manual_all" type="checkbox" />then press the above button.</p></div>
			<div id="anim" style="text-align:center;display:none"><img src="consume_anim.gif" width="32" height="32" align="absmiddle" />  Processing...please wait</div>
			<div id="consume_message"></div>
			<blockquote style="padding:8px;border:1px dotted #999;">
			<strong><img width="32" height="32" src="dialog-information.png" style="float:left">Did you know...?</strong><br />Manually processing the queue isn&#39;t the best way to use the 
			queue. The queue can be processed automatically using scheduling features like 
			cron which can be setup to process the queue for you. This way you can send 
			mailings to be delivered and let SML handle the rest. Check out the <a href="help.php">Help</a> tab 
			for details on setting up the queue to run automatically. Note that manually processing messages may cause your browser to hang or 
			timeout before the expected number of messages are processed.
			</blockquote>
		</form>
	</div>
	<div class="ft"><button onclick="queueDialog.hide();">Click to close</button></div>
</div>
<script>
queueDialog = new YAHOO.widget.Dialog("myDialog", {
	effect:{effect:YAHOO.widget.ContainerEffect.FADE,duration:.25},
	fixedcenter: true,
	modal:true,
	visible: false,
	close:false,
	width: '600px',
	constraintoviewport: true,
	underlay:"shadow",
	draggable:true }
);
queueDialog.render();
</script>
</body>
</html>