<?
include('config.inc.php'); 

if ($_POST)
{
	$insert_query = "INSERT INTO mailinglist_blacklist VALUES ('$_POST[rule]')";
	$insert_result = mysql_query($insert_query) or die("Query failed : " . mysql_error());

	$delete_query = "DELETE FROM mailinglist_subscribers WHERE address LIKE '%$_POST[rule]%'";
	$delete_result = mysql_query($delete_query) or die("Query failed : " . mysql_error());
}

if ($_GET[r])
{
	$delete_query = "DELETE FROM mailinglist_blacklist WHERE rule = '$_GET[r]'";
	$delete_result = mysql_query($delete_query) or die("Query failed : " . mysql_error());
}

$query = "SELECT * FROM mailinglist_blacklist";
$result = mysql_query($query) or die("Query failed : " . mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Blacklist</title>
<script>
function besure(action)
{
	if (action == 'd')
	{
		return confirm('Are you SURE you want to delete this rule?');
	}
	else
	{
		return confirm('The blacklist rule you are about to add may affect existing users. Are you SURE you want to continue?');
	}
}

var url = "checkblacklist.php?q="; // The server-side script

function handleHttpResponse()
{
	if (http.readyState == 4)
	{
		results = http.responseText.split(",");	// Split the comma delimited response into an array

		mystring = '<b>Affected address(es):</b><p class="help">';
		for(var cnt=0; cnt<results.length-1; cnt++)
		{
			mystring = mystring + ' ' + results[cnt] + '<br />\n';
		}
		if (results.length == 1) mystring = mystring + 'None';
		mystring = mystring + '</p>';

		document.getElementById('affected').innerHTML = mystring;
	}
}

function checkaffected()
{
	var ruleValue = document.getElementById("rule_input").value;
	http.open("GET", url + escape(ruleValue), true);
	http.onreadystatechange = handleHttpResponse;
	http.send(null);
}

function getHTTPObject()
{
	var xmlhttp;
	/*@cc_on
	@if (@_jscript_version >= 5)
	try
	{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch (e)
	{
		try
		{
        		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch (E)
		{
			xmlhttp = false;
		}
	}
	@else
	xmlhttp = false;
	@end @*/
	if (!xmlhttp && typeof XMLHttpRequest != 'undefined')
	{
		try
		{
			xmlhttp = new XMLHttpRequest();
		}
		catch (e)
		{
			xmlhttp = false;
		}
	}
	return xmlhttp;
}

var http = getHTTPObject(); // We create the HTTP Object

</script>
<style type="text/css" media="screen">@import "css/basic.css";</style>
<style type="text/css" media="screen">@import "css/tabs.css";</style>
</head>
<body>

<h1>Simple Mailing List</h1>

<div id="header">
	<ul id="primary">
		<li><a href="send.php">Send Message</a></li>
		<li><a href="members.php">Members</a></li>
		<li><a href="archives.php">Archives</a></li>
		<li><span>Blacklist</span></li>
		<li><a href="help.php">Help</a></li>
	</ul>
</div>
<div id="main">
	<div id="contents">
			<h2>Blacklist</h2>			
			<p class="note">Blacklist rules are used to prevent specific addresses, or groups of addresses, from signing up for your list. 
			New blacklist rules may affect existing members and can potentially remove them from your list. It is strongly recommended 
			that you test your new rule first via the 'Check Rule' button before adding it to see if it will impact any existing members.</p>
			<h3>Current blacklist rules:</h3>
<?
if(mysql_num_rows($result) == 0)
{
	echo "<p class=\"help\">You currently have no blacklist rules.</p>";
}
else
{
	echo "<p class=\"help\"><table border=\"0\">";
	while($row = mysql_fetch_assoc($result))
	{
		echo "<tr><td>$row[rule]</td><td><a onclick=\"return besure('d');\" href=\"blacklist.php?r=$row[rule]\">Delete?</a></td></tr>";
	}
	echo "</table></p>";
}
?>
			<h3>Add a blacklist rule:</h3>
			<form method="POST" action="blacklist.php">
				<p class="help">To prevent a specific user from signing up, enter their email address. 
				You can also prevent an entire domain from signing up by entering their 
				domain name (e.g. @aol.com, @yahoo.com), or even an entire <acronym title="Top Level Domain">TLD</acronym> (e.g. 
				.com, .net, .org). Use the 'Check Rule' button to see if the rule you want to create will effect any existing members.</p>
				<p class="help"><input type="text" id="rule_input" name="rule" size="20"> <input onclick="checkaffected()" type="button" value="Check Rule" name="testrule">
				<input type="submit" value="Add Rule" name="submit" onclick="return besure();"></p>
			</form>
			<div style="font-family: tahoma,verdana; font-size: 8pt; width: 300; max-height: 250px; overflow: auto;" id="affected"></div>
	</div>
</div>

<p align="center" class="message"><a href="http://www.notonebit.com">&copy; NotOneBit.com</a></p>

</body>
</html>