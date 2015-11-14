<?
session_start();
if( isset($_SESSION['rights'] ) & $_SESSION['rights'] > 0 )
{

include('config.inc.php');
include('SMLmailer.class.php');

$today = getdate();

$current_member_count = mysql_num_rows(get_confirmed_members());
$current_member_count_staustell = mysql_num_rows(get_confirmed_members_staustell());
$current_member_count_roche = mysql_num_rows(get_confirmed_members_roche());
$current_member_count_truro = mysql_num_rows(get_confirmed_members_truro());
$current_member_count_truro = mysql_num_rows(get_confirmed_members_penzance());

//echo $current_member_count_roche;
//echo $current_member_count_staustell;
//echo $current_member_count_truro;

if($_GET['draftid'])
{
	$draft_query = "SELECT * FROM mailinglist_drafts WHERE id = '$_GET[draftid]'";
	$draft_result = mysql_query($draft_query) or die("Query failed : " . mysql_error());
	$draft_row = mysql_fetch_row($draft_result);
	list($draft_id,$draft_subject,$draft_message,$draft_format) = $draft_row;
}

if($_POST)
{
	if (get_magic_quotes_gpc()) // Quotes in the message are automatically being escaped
	{
		$message = stripslashes($_POST[message]);
		$subject = strip_tags(stripslashes($_POST[subject]));
	}
	else
	{
		$message = $_POST[message];
		$subject = strip_tags($_POST[subject]);
	}

	if ($config['use_queue'])
	{
		$str = "$_POST[month]/$_POST[date]/$_POST[year] $_POST[hour]:$_POST[minute]$_POST[ampm]";
		$send_time = strtotime($str);
	}
	else
	{
		$send_time = time();
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Send Message</title>
<!-- CSS -->
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.3.0/build/container/assets/container.css">
<style type="text/css" media="screen">@import "css/basic.css";</style>
<style type="text/css" media="screen">@import "css/tabs.css";</style>
<style>
.mask {
    -moz-opacity: 0.5;
    opacity:.50;
    filter: alpha(opacity=50);
    background-color:#666;
}

.button-group button {
	font-size: 1.1em;
	font-weight: bold;
}

.button-group button:hover, .button-group button.hover {
	border:2px solid #797979;
	background-color:#BBB;
	border-top-color:#FFF;
	border-left-color:#FFF;
}

#myPanel .bd {
	width:60em;
	height:40em;
	overflow:auto;
}

#myPanel .ft {
	text-align: center;
}

#myPanel .hd {
	background-color:#999;
/*    border: 2px solid #CCC; */
	border-top: 0px none;
	border-left: 0px none;
	border-right: 0px none;
	border-bottom: 1px solid #000;
	text-align:center
}

</style>

<!-- Dependencies -->
<script type="text/javascript" src="http://yui.yahooapis.com/2.3.0/build/yahoo-dom-event/yahoo-dom-event.js"></script>

<!-- OPTIONAL: Animation (only required if enabling Animation) -->
<script type="text/javascript" src="http://yui.yahooapis.com/2.3.0/build/animation/animation-min.js"></script>

<!-- Source file -->
<script type="text/javascript" src="http://yui.yahooapis.com/2.3.0/build/dragdrop/dragdrop-min.js"></script>

<!-- Source file -->
<script type="text/javascript" src="http://yui.yahooapis.com/2.3.0/build/container/container-min.js"></script>

<!-- Source file -->
<script type="text/javascript" src="http://yui.yahooapis.com/2.3.0/build/connection/connection-min.js"></script>

<script>
function convert(text)
{
    return text.replace(/&/g, "&amp;").replace(/</g,"&lt;").replace(/>/g, "&gt;");
}

function dopreview()
{
	var previewtext = (document.form1.format.value=='1') ? document.getElementById('msg_area').value:convert(document.getElementById('msg_area').value);
	previewpanel = new YAHOO.widget.SimpleDialog("myPanel", {
		effect:{effect:YAHOO.widget.ContainerEffect.FADE,duration:.25},
		fixedcenter: true,
		modal:true,
		visible: false,
		close:false,
		constraintoviewport: true,
		underlay:"shadow",
		draggable:true }
	);
	previewpanel.setHeader("Jade Palace Mailing List - Message Preview");
	previewpanel.setBody('<pre>'+previewtext+'</pre>');
	previewpanel.setFooter("<button onclick=\"previewpanel.hide();\">Click to close</button>");

	previewpanel.render(document.body);
	previewpanel.show();
	previewed = true;
}
</script>

<script>
var previewed = false;
var timerId;
var scr_w = screen.availWidth;
var scr_h = screen.availHeight;
var warnleave=true;

function loadtemplate()
{
	leftPos = (scr_w-625)/2;
	topPos = (scr_h-400)/2;
	window.open("loadtemplate.php", "template", 'toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=0,resizable=1,width=625,height=400,left='+leftPos+',top='+topPos+'');
}

function loaddraft()
{
	leftPos = (scr_w-800)/2;
	topPos = (scr_h-400)/2;
	window.open("loaddraft.php", "draft", 'toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=0,resizable=1,width=800,height=400,left='+leftPos+',top='+topPos+'');
}

function ownertest(form)
{
	win=window.open('','myWin','toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=0,resizable=1,width=350,height=100,left=390,top=262');
	if(!win) alert('Please disable popup blockers');
	form.target='myWin';
	form.method='POST';
	form.action='owner_test.php';
	form.submit();
	return false;
}

function besure(tz)
{
	if(document.form1.message.value.length > 0)
	{
<?
if ($config['use_queue'])
{
echo <<<EOT

		if (document.form1.subject.value.length == 0) 
		{
			alert('WARNING: The subject line is empty. Please enter a subject for your message.');
			document.form1.subject.focus();
			warnleave=true;
			return false;
		}
		if(document.form1.minute.value < 10)
		{
			queue_minute = '0' + document.form1.minute.value;
		}
		else
		{
			queue_minute = document.form1.minute.value;
		}
		var queue_date = document.form1.month.value+'/'+document.form1.date.value+'/'+document.form1.year.value+' @ '+ document.form1.hour.value+':'+queue_minute+' '+document.form1.ampm.value;
		var confirm_text = 'You are about to send your message.\\nIt will be queued for delivery on or about: '+queue_date+' '+tz+'.\\n';
		confirm_text +=	'Are you SURE you want to continue?';
EOT;
echo "\n";
}
else
{
	echo "var confirm_text = 'You are about to send your message.\\nAre you SURE you want to continue?'\n";
}
?>
		if (previewed == false)
		{
			if (confirm('This message has not been previewed. It is recommended that you preview your message before sending. Continue anyway?'))
			{
				return confirm(confirm_text);
			}
			else
			{
				return false;
			}
		}
		else
		{
			return confirm(confirm_text);
		}
	}
	else
	{
		alert('Message area is empty - no message will be sent.');
		return false;
	}
}

function leaving()
{
	if(document.getElementById("msg_area").value.length > 0  && warnleave==true) return("You have not sent your message yet.");
}

function msg_change()
{
	previewed = false;
}

function updatedatetime()
{
	var request = YAHOO.util.Connect.asyncRequest('GET', "datetime.php", {
	    success: function(o)
	    {
	        document.getElementById('datetime').innerHTML = o.responseText;
	    },
	    failure: function(o)
	    {
	        //alert('Date/Time Request failed: ' + o.statusText);
	    }
	}); 
	setTimeout(updatedatetime,10000);
}

function updatemembercount()
{
	var request = YAHOO.util.Connect.asyncRequest('GET', "membercount.php", {
	    success: function(o)
	    {
	        document.getElementById('mc').innerHTML = o.responseText;
	    },
	    failure: function(o)
	    {
	        //alert('Member Count Update Request failed: ' + o.statusText);
	    }
	});
	setTimeout(updatemembercount,10000);
}

function sendtoowner()
{
	YAHOO.util.Connect.setForm('form1');
	var request = YAHOO.util.Connect.asyncRequest('POST', "owner_test.php", {
	    success: function(o)
	    {
	        document.getElementById('ownerreply').innerHTML = o.responseText;
	    },
	    failure: function(o)
	    {
	        //alert('Send To Owner Request failed: ' + o.statusText);
	    }
	}); 
}

function updatedays()
{
	var months = new Array(31,29,31,30,31,30,31,31,30,31,30,31);
	
	document.forms[0].date.options[0] = null;

	for (var w = 0; w < document.forms[0].date.length; w++)
	{
		document.forms[0].date.options[0] = null;
	}

	for (var x = 0; x < months[document.forms[0].month.selectedIndex]; x++)
	{
		document.forms[0].date.options[x] = new Option(x+1);
	}
}

function format_text(th)
{
	var text1 = document.getElementById("format_text");
	text1.style.display=(th == 1)?'':'none';
}

function savedraft()
{
	msg_id = '<? echo (isset($draft_id)) ? $draft_id:md5(time()); ?>';
	ta = document.getElementById("msg_area");
	sub = document.form1.subject.value;
	msg = escape(ta.value);	// formerly used encodeURI
	fmt = document.form1.format.value;

// check to see that ta.length > 0
/*

	url = 'save_draft.php?id='+msg_id+'&subject='+sub+'&message='+msg+'&texthtml='+fmt;
	var request = YAHOO.util.Connect.asyncRequest('GET', url, {
	    success: function(o)
	    {
	        document.getElementById('draft_response').innerHTML = o.responseText;
	    },
	    failure: function(o)
	    {
	        //alert('Member Count Update Request failed: ' + o.statusText);
	    }
	});
*/
url = 'save_draft.php';
postData = 'id='+msg_id+'&subject='+sub+'&message='+msg+'&texthtml='+fmt;
var request = YAHOO.util.Connect.asyncRequest('POST', url, {
	    success: function(o)
	    {
	        document.getElementById('draft_response').innerHTML = o.responseText;
	    },
	    failure: function(o)
	    {
	        //alert('Member Count Update Request failed: ' + o.statusText);
	    }
	}, postData); 

	document.getElementById("sdbutton").disabled = true;
	warnleave=false;

	var request = YAHOO.util.Connect.asyncRequest('GET', 'draft_count.php', {
	    success: function(o)
	    {
	        document.getElementById('draft_count').innerHTML = o.responseText;
	    },
	    failure: function(o)
	    {
	        //alert('Member Count Update Request failed: ' + o.statusText);
	    }
	});
}

function drafttimer()
{
	warnleave=true;
	document.getElementById("sdbutton").disabled = false;
	clearTimeout(timerId);
	timerId = setTimeout(savedraft,120000);
}
</script>
</head>

<body class="yui-skin-sam" onbeforeunload="return leaving()">

<h1>Jade Palace Mailing List</h1>

<?
if($_POST[submit_send] And strlen($_POST[message]) > 0)
{
	// Send mail - if sent and archived, display confirmation

	$texthtml = ($_POST['format']) ? "html":"text";

	if( $_POST[shop] == 'All')
	{
		$result = get_confirmed_members();
		$sent_count = mysql_num_rows($result);
	}elseif ( $_POST[shop] == "St.Austell")
	{
		$result = get_confirmed_members_staustell();
		$sent_count = mysql_num_rows($result);
	}elseif ( $_POST[shop] == "Truro")
	{
		$result = get_confirmed_members_truro();
		$sent_count = mysql_num_rows($result);
	}elseif ( $_POST[shop] == "Roche")
	{
		$result = get_confirmed_members_roche();
		$sent_count = mysql_num_rows($result);
	}elseif ( $_POST[shop] == "Penzance")
	{
		$result = get_confirmed_members_penzance();
		$sent_count = mysql_num_rows($result);
	}else{
	echo "No members selected!";
	}

	if ($config['use_queue'])
	{
		$message = mysql_real_escape_string($message);
		$subject = mysql_real_escape_string($subject);
		$message_id = insert_message($subject,$message,time(),$send_time,$sent_count,$texthtml);
		
	if( $_POST[shop] == 'All')
	{
		$address_result = get_confirmed_members();
	}elseif ( $_POST[shop] == "St.Austell")
	{
		$address_result == get_confirmed_members_staustell();
	}elseif ( $_POST[shop] = "Truro")
	{
		$address_result == get_confirmed_members_truro();
	}elseif ( $_POST[shop] = "Roche")
	{
		$address_result == get_confirmed_members_roche();
	}elseif ( $_POST[shop] = "Penzance")
	{
		$address_result == get_confirmed_members_penzance();
	}else{
		$address_result = 0;
	}		
		
		while ($address_row = mysql_fetch_assoc($address_result))
		{
			insert_recipients_into_queue($message_id,$address_row[address],$send_time);
		}
		echo "<p><b><font color=Green>Your message has been queued for delivery and archived.</font></b> ";
		echo "You can view the delivery progress in the <a href=archives.php>Archives</a>. To send another message, ";
		echo "<a href=\"send.php\">click here</a></p>";
	}
	else // No queue - send immediately
	{
		$message_id = insert_message($subject,$message,time(),$send_time,$sent_count,$texthtml);
		// Build list of members and combine addresses to be used in the Bcc field
		$bcc = "";
		while ($row = mysql_fetch_assoc($result))
		{
			$bcc .= "$row[address],";
		}
		$subscribers = substr($bcc, 0, -1);
		$to = $config['owner_email'];

		$noqueue = new SMLmailer;
		$noqueue->mail_to = $to;
		$noqueue->mail_from = $config['owner_email'];
		$noqueue->mail_bcc = $subscribers;
		$noqueue->subject = $subject;
		$noqueue->message = stripslashes($message);
		$noqueue->is_HTML = ($_POST[format] == 1) ? true:false;
		$noqueue->use_SMTP = ($config[use_SMTP] == 1) ? true:false;
		$noqueue->send();

		if($noqueue->success)
		{
			echo "<p><b><font color=Green>Your message has been successfully sent and archived.</font></b> You can view the message in the <a href=archives.php>Archives</a>.</p>";
		}
		else
		{
			echo "<p><b><font color=Red>Unable to send message. Check your server's error log for details.</font></b></p>";
		}
	}
	// Delete the draft if one was used
	if(isset($_POST[draft_id]))
	{
		$delete_draft_query = "DELETE FROM mailinglist_drafts WHERE id='$_POST[draft_id]'";
		$delete_draft_result = mysql_query($delete_draft_query) or die("Query failed : " . mysql_error());
	}
}
$draft_query = "SELECT COUNT(*) FROM mailinglist_drafts";
$draft_result = mysql_query($draft_query) or die("Query failed : " . mysql_error());
$draft_count = mysql_fetch_row($draft_result);
?>

<div id="header">
	<ul id="primary">
		<li><span>Send</span></li>
			<ul id="secondary">
				<li><a href="javascript:loadtemplate();"><strong>Load A Template</strong></a></li>
				<li id="draft"><a href="javascript:loaddraft();"><strong>Load A Draft (<sml id="draft_count"><?=$draft_count[0]?></sml>)</strong></a></li>
			</ul>
		<li><a href="members.php">Members</a></li>
		<li><a href="archives.php">Archives</a></li>
	</ul>

</div>
<div id="main">			
	<div id="contents">
			<h2>Send A Message - Remember to Load Members Before Sending Email</h2>			
			<p class="note">Compose your message in plain text or HTML below. HTML messages are sent in <acronym title="Multipurpose Internet Mail Extensions">MIME</acronym>
			 format so that if a recipient cannot view the HTML email, they will see a plain text version automatically.</p>
			<div style="text-align:center">
				<center>
<?
if($draft_format === 1)
{
	$plain_selected = "";
	$html_selected = " selected";
	$config_default_format = "";
}
elseif($draft_format === 0)
{
	$plain_selected = " selected";
	$html_selected = "";
	$config_default_format = "none";
}
elseif($config['default_format'] == 1)
{
	$plain_selected = "";
	$html_selected = " selected";
	$config_default_format = "";
}
else
{
	$plain_selected = " selected";
	$html_selected = "";
	$config_default_format = "none";
}
?>

<script>setTimeout("updatemembercount()",10000);</script>
<form method="POST" action="send.php" name="form1" id="form1" onsubmit="return besure('<?=Date("T")?>');">
	<p class="message">All Members <span id="mc"><?=$current_member_count?></span>.
	St.Austell - <span id="mc"><?=$current_member_count_staustell?></span>.
	Roche - <span id="mc"><?=$current_member_count_roche?></span>.
	Truro - <span id="mc"><?=$current_member_count_truro?></span>.
	Penzance - <span id="mc"><?=$current_member_count_penzance?></span>.
	Send as 
	<select size="1" name="format" onchange="format_text(this.value)">
		<option value="0"<?=$plain_selected?>>Plain text</option>
		<option value="1"<?=$html_selected?>>HTML (plain text version will be created)</option>
	</select>
	Choose shop:
	<select name="shop">
	<?
	if( isset($_SESSION['rights']) & $_SESSION['rights'] > 1 )
	{
	echo ("
		<option>All</option>
		<option>St.Austell</option>
		<option>Roche</option>
		<option>Truro</option>
		<option>Penzance</option>
	");
	
	}else{
	echo ("
		<option>St.Austell</option>
		<option>Penzance</option>
	");
	}	
	?>
	</select>
	
	</p>
	<p></p>
	<p class="message" id="format_text" style="display:<?=$config_default_format?>">Type or paste your <strong>HTML</strong> in the message area below:</p>
<?
if ($_GET[t])
{
	// Used when loading a template
	$filename = "templates/" . $_GET[t];
	$handle = fopen($filename, "r");
	$template = fread($handle, filesize($filename));
	fclose($handle);
	$message = $template;
}
if($draft_message) $textarea_message = $draft_message;
if($message) $textarea_message = $message;
if($_POST) $textarea_message = '';
?>
	<p class="message">Subject <input type="text" name="subject" size="50" value="<?=$draft_subject?>"> 
	<button type="button" id="sdbutton" onclick="clearTimeout(timerId);savedraft()" disabled="true">Save Draft</button> 
	<span id="draft_response" style="position:absolute;margin-left:6px;"></span></p>
	<p class="message"><textarea rows="20" name="message" cols="75" id="msg_area" onkeypress="drafttimer()" onchange="msg_change()"><?=$textarea_message?></textarea></p>
<?
if ($config['use_queue'] And !$_POST[submit_send])
{
	echo "<script>setTimeout(\"updatedatetime()\",60000);</script>";
	echo "<p class=\"note\">Date/time on server: <span id=\"datetime\">";
	include('datetime.php');
	echo "</span> <a href=\"javascript:void(0)\" onmouseover=\"updatedatetime()\">(mouseover to refresh)</a></p>\n";
?>

	<table border="0" id="table1" cellpadding="2">
		<tr>
			<td rowspan="2"><img src="clock.jpg" align="absbottom" /></td>
			<td colspan="4">Schedule message to be delivered beginning on or about:</td>
		</tr>
		<tr>
			<td align="right">Date: </td>
			<td><select size="1" name="month" onchange="updatedays();">
<?
$months = array("1" => "January","2" => "February","3" => "March","4" => "April","5" => "May","6" => "June","7" => "July",
"8" => "August","9" => "September","10" => "October","11" => "November","12" => "December",);
$flag = false;
foreach ($months as $key => $val)
{
	if ($_POST[month] == $key)
	{
		echo "<option value=\"$key\" selected>$val</option>\n";
		$flag = true;
	}
	elseif ($today[mon] == $key And !$flag)
	{
		echo "<option value=\"$key\" selected>$val</option>\n";
	}
	else
	{
		echo "<option value=\"$key\">$val</option>\n";
	}
}
?>
			</select><select size="1" name="date">

			<?
			$flag = false;
			for($i=1;$i<=31;$i++)
			{
				if ($_POST[date] == $i)
				{
					echo "<option value=\"$i\" selected>$i</option>\n";
					$flag = true;
				}
				elseif ($today[mday] == $i And !$flag)
				{
					echo "<option value=\"$i\" selected>$i</option>\n";
				}
				else
				{
					echo "<option value=\"$i\">$i</option>\n";
				}
			}
			?>

			</select><select size="1" name="year">

			<?
			$flag = false;
			for($i=$today[year];$i<=$today[year]+5;$i++)
			{
				if ($_POST[year] == $i)
				{
					echo "<option value=\"$i\" selected>$i</option>\n";
					$flag = true;
				}
				elseif ($today[year] == $i And !$flag)
				{
					echo "<option value=\"$i\" selected>$i</option>\n";
				}
				else
				{
					echo "<option value=\"$i\">$i</option>\n";
				}
			}
			?>

			</select></td>
			<td align="right"> Time: </td>
			<td><select size="1" name="hour">

			<?
			$curr_hour = date("g");
			$flag = false;
			for($i=1;$i<=12;$i++)
			{
				if ($_POST[hour] == $i)
				{
					echo "<option value=\"$i\" selected>$i</option>\n";
					$flag = true;
				}
				elseif ($curr_hour == $i And !$flag)
				{
					echo "<option value=\"$i\" selected>$i</option>\n";
				}
				else
				{
					echo "<option value=\"$i\">$i</option>\n";
				}
			}
			?>

			</select><select size="1" name="minute">

			<?
			$flag = false;
			for($i=0;$i<=59;$i++)
			{
				if ($i < 10) $min = "0".$i; else $min = $i;
				if (isset($_POST[minute]) And $_POST[minute] == $i)
				{
					echo "<option value=\"$i\" selected>$min</option>\n";
					$flag = true;
				}
				elseif ($today[minutes] == $i And !$flag)
				{
					echo "<option value=\"$i\" selected>$min</option>\n";
				}
				else
				{
					echo "<option value=\"$i\">$min</option>\n";
				}
			}
			?>

			</select><select size="1" name="ampm">
			<?
			$flag = false;
			if ($_POST[ampm] == "AM")
			{
				echo "<option selected>AM</option>\n";
				echo "<option>PM</option>\n";
				$flag = true;
			}
			elseif ($_POST[ampm] == "PM")
			{
				echo "<option>AM</option>\n";
				echo "<option selected>PM</option>\n";
				$flag = true;
			}
			elseif (date("A") == "AM" And !$flag)
			{
				echo "<option selected>AM</option>\n";
				echo "<option>PM</option>\n";
			}
			else
			{
				echo "<option>AM</option>\n";
				echo "<option selected>PM</option>\n";
			}
			?>
			</select></td>
		</tr>
	</table>

<?
}

if (!$_POST[submit_send])
{
?>
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
		<tr>
			<td width="33%">&nbsp;</td>
			<td align="center" nowrap>
			<input type="button" value="Preview Message" name="preview" onclick="dopreview()" style="font-size:1.25em;" /> 
			<input type="submit" value="Send Message" name="submit_send" onclick="warnleave=false;" style="font-size:1.25em;" /></td>
			<td width="33%" align="right">
			<!-- <input type="button" value="Send Message To List Owner ONLY" name="owner_test" onclick="sendtoowner()"> -->
			<br /><span id="ownerreply"></span>
			</td>
		</tr>
	</table>
<?
}
if(isset($draft_id)) echo "<input type=\"hidden\" name=\"draft_id\" value=\"$draft_id\" />\n";
?>
</form>

			</center>
		</div>
	</div>
</div>

<p align="center" class="message"><a href="../../index.php">Back to Website</a></p>

</body>
</html>
<?
}else{
echo ("NO ACCESS - Log in as admin first");
echo ("<p><a href='../../index.php'>Back to Main Page</a></p>");
}

?>