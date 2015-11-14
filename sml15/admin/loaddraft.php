<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Message Drafts</title>
<style type="text/css" media="screen">@import "css/basic.css";</style>
<style>
td {
	border-right: 1px dotted #DDD;
	border-bottom: 1px solid #C0C0C0;
	border-left: 1px dotted #DDD;
	padding: 4px 8px;
}
th {
	font: bold .7em Tahoma, Verdana, Trebuchet MS, Arial;
	color: #FFFFFF;
	border: 1px solid #808080;
	background-color: #999999;
	padding: 0 8px;
}
.lastrow {
	border:0;
}
</style>
<script>
function toggle_all()
{
	var cb = document.getElementsByTagName("input");
	var toggle = document.getElementById("toggle");
	for(i=1;i<cb.length-1;i++)
	{
		cb[i].checked = (toggle.checked) ? true:false;
		cb[i].parentNode.parentNode.style.backgroundColor = (toggle.checked) ? '#F99':'';
	}
}

function toggle_check(abox)
{
	var cb = document.getElementsByTagName("input");
	var toggle = document.getElementById("toggle");
	if(!abox.checked)
	{
		toggle.checked = false;
		abox.parentNode.parentNode.style.backgroundColor='';
	}
	else
	{
		abox.parentNode.parentNode.style.backgroundColor='#F99';
		for(i=1;i<cb.length-1;i++)
		{
			if(cb[i].checked==false)
			{
				toggle.checked = false;
				break;
			}
			else
			{
				toggle.checked = true;
			}
		}
	}
}
</script>
</head>

<body>

<?
include('config.inc.php');
if($_POST)
{
	foreach($_POST['purge'] as $draft)
	{
		$query = "DELETE FROM mailinglist_drafts WHERE id='$draft'";
		$result = mysql_query($query) or die("Query failed : " . mysql_error());
	}
}
$query = "SELECT * FROM mailinglist_drafts";
$result = mysql_query($query) or die("Query failed : " . mysql_error());
$draft_count = mysql_num_rows($result);
echo "<script>window.opener.document.getElementById('draft_count').innerHTML='$draft_count';</script>";
if($draft_count > 0)
{
?>

<p><b>Select a draft below by clicking a draft's LOAD button.</b> Note that selecting a template will overwrite any text you have 
entered in the send message window.</p>

<form action="loaddraft.php" method="post" onsubmit="return confirm('Are you sure you want to PERMANENTLY delete these drafts?')">
<table border="0" cellspacing="0">
	<tr>
		<th>Load</th>
		<th>Subject</th>
		<th>Message (first 50 characters)</th>
		<th>Text or HTML</th>
		<th>Last Saved</th>
		<th>Delete [All<input id="toggle" name="toggle" onclick="toggle_all()" type="checkbox" />]</th>
	</tr>
<?
while($row = mysql_fetch_assoc($result))
{
	echo "<tr><td><button type=\"button\" onclick=\"window.opener.location='send.php?draftid=$row[id]';window.close();\">Load</button></td>";
	echo (empty($row[subject])) ? "<td>&lt;no subject&gt;</td>":"<td>$row[subject]</td>";
	echo "<td>".htmlspecialchars(substr($row[message],0,50))."</td>";
	echo ($row[texthtml]) ? "<td>HTML</td>":"<td>Plain text</td>";
	echo "<td>".date("n/j/Y @ g:i a",$row[lastsaved])."</td>";
	echo "<td><input name=\"purge[]\" value=\"$row[id]\" onclick=\"toggle_check(this)\" type=\"checkbox\" /></td></tr>\n";
}
?>
	<tr>
		<td class="lastrow" colspan="5"></td>
		<td class="lastrow"><input type="submit" value="Delete" /></td>
	</tr>
</table>
</form>
<?
}
else
{
	echo "No drafts found. <button onclick=\"window.close();\">Close</button>";
}
?>

</body>
</html>
