<?
session_start();
if( isset($_SESSION['rights'] ) & $_SESSION['rights'] > 0 )
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Member Management</title>

<SCRIPT LANGUAGE="JavaScript">
var scr_w = screen.availWidth;
var scr_h = screen.availHeight;
function doimport()
{
	leftPos = (scr_w-625)/2;
	topPos = (scr_h-400)/2;
	window.open("import.php", "importer", 'toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=0,resizable=1,width=625,height=400,left='+leftPos+',top='+topPos+'');
}

function doimport_chinese()
{
	leftPos = (scr_w-625)/2;
	topPos = (scr_h-400)/2;
	window.open("import_chinese.php", "importer", 'toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=0,resizable=1,width=625,height=400,left='+leftPos+',top='+topPos+'');
}


function unconfirmed()
{
	leftPos = (scr_w-400)/2;
	topPos = (scr_h-200)/2;
	window.open("unconfirmed.php", "unconfirmed", 'toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=0,resizable=1,width=400,height=200,left='+leftPos+',top='+topPos+'');
}

function besure()
{
	return confirm('You are about to permanently delete the selected subscribers. Are you SURE you want to continue?');
}

function CheckALL(ALL_checkbox)
{

// This function iterates through all checkboxes in a form and if the checkbox named 'allbox' is checked,
// then it will check each individual checkbox. Otherwise if 'allbox' is unchecked, then it will uncheck
// each indivudual checkbox.

   for (i=0; i < document.myform.elements.length; i++)
   {
      var form_element = document.myform.elements[i];
      
      if ((form_element.name != 'allbox') && (form_element.type == 'checkbox'))
      {
         if (ALL_checkbox != 1) // If the ALL checkbox is OFF, set all checkboxes to OFF (and vice-versa)
            form_element.checked = document.myform.allbox.checked;
      }
   }
}

function CheckboxCheck()
{

// This function iterates through all checkboxes in a form and counts up the total number of checkboxes,
// and the total number of those checkboxes that are checked (not including the 'allbox'). If they are equal,
// then the checkbox named 'allbox' is then checked, otherwise 'allbox' is unchecked.

   var total_checkboxes = 0;
   var checked_checkboxes = 0;
   
   for (i=0; i < document.myform.elements.length; i++)
   {
      var form_element = document.myform.elements[i];
      if ((form_element.name != 'allbox') && (form_element.type == 'checkbox'))
      {
         total_checkboxes++; // If the form element is a checkbox and it's not the 'ALL' checkbox, increment the total_checkboxes counter
         if (form_element.checked)
            checked_checkboxes++; // If the checkbox we're on is checked, add it to the checked_checkboxes total
      }
   }
   
   // If the total number of checkboxes checked equals the total number of checkboxes, put a check
   // in the ALL checkbox. Otherwise don't put a check in the ALL checkbox
   
   document.myform.allbox.checked = (checked_checkboxes == total_checkboxes) ? true : false;
}

var url = "search.php?q="; // The server-side script

function handleHttpResponse()
{
	if (http.readyState == 4)
	{
		results = http.responseText.split(",");	// Split the comma delimited response into an array

		mystring = '<input type="submit" value="Remove Member(s)" name="submit" onclick="return besure();"><br />';
		for(var cnt=0; cnt<results.length-1; cnt++)
		{
			mystring = mystring + '<input type="checkbox" name="delete[]" value="' + results[cnt] + '">' + results[cnt] + '<br />\n';
		}

		document.getElementById('foo').innerHTML = mystring;

		//document.getElementById('addy').value = results[0];
	}
}

function lookitup()
{
	var addyValue = document.getElementById("addy").value;
	http.open("GET", url + escape(addyValue), true);
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

<?

include('config.inc.php');

if($config['check_bounces'])
{
	$mbox = imap_open("{localhost:143}", $config[bounce_mailbox], $config[bounce_password]);

	$headers = imap_sort($mbox,SORTDATE,1);

	while (list ($key, $val) = each ($headers))
	{
		$body = imap_body ($mbox, $val);
		preg_match("/[A-z0-9][\w.-]*@[A-z0-9][\w\-\.]+\.[A-z0-9]{2,6}/i",$body,$matches);

		$bounce_query = "UPDATE mailinglist_subscribers SET bounce_count = bounce_count + 1 WHERE address = '$matches[0]'";
		$bounce_result = mysql_query($bounce_query) or die("Query failed : " . mysql_error());

		imap_delete($mbox,$val);
	}

	imap_expunge($mbox);
	imap_close($mbox);
}

if ($_POST)
{
	if($_POST[delete])
	{
		echo "The following addresses have been removed from the database: \n";

		foreach($_POST[delete] as $addy)
		{
			$query = "DELETE FROM mailinglist_subscribers WHERE address = '$addy'";
			$result = mysql_query($query) or die("Query failed : " . mysql_error());
			echo "$addy ";
		}
	}
	if($_POST[remove_bounce])
	{
		echo "Remove addresses with $_POST[bounce] or more bounces.";
		$query = "DELETE FROM mailinglist_subscribers WHERE bounce_count >= '$_POST[bounce]'";
		$result = mysql_query($query) or die("Query failed : " . mysql_error());
	}
}

$query = "SELECT * FROM mailinglist_subscribers ORDER BY confirmed ASC, address ASC";
$result = mysql_query($query) or die("Query failed : " . mysql_error());
$num_rows = mysql_num_rows($result); 

?>

<h1>Jade Palace Mailing List</h1>

<div id="header">
	<ul id="primary">
		<li><a href="send.php">Send Message</a></li>
		<li><span>Members</span></li>
			<ul id="secondary">
				<li><a href="javascript:doimport();"><strong>Import Email Addresses</strong></a></li>
				<li><a href="export.php"><strong>Export Addresses to CSV</strong></a></li>
				<li><a href="javascript:doimport_chinese();"><strong>Load All Email Accounts from Jade Palace</strong></a></li>		
			</ul>
		<li><a href="archives.php">Archives</a></li>
	</ul>
</div>
<div id="main">			
	<div id="contents">
			<h2>Members</h2>			
			<p class="note">The 'All Members' table lists everyone that has created account on the Jade Palace Website. Use the search feature below 
			the member lists to look for or remove members.</p>
			<div align="center">
<?
$confirmed_query = "SELECT COUNT(*) FROM mailinglist_subscribers WHERE confirmed = '1'";
$confirmed_result = mysql_query($confirmed_query) or die("Query failed : " . mysql_error());
$num_rows_confirmed = mysql_fetch_row($confirmed_result);
?>

<form method="POST" action="members.php" name="myform">
<table align="center" border="1" bordercolor="#EEEEEE" cellpadding="4" cellspacing="0" style="border-collapse: collapse">
	<tr><th>All Members (<?=$num_rows?>)</th><th colspan="4">Confirmed Members (<?=$num_rows_confirmed[0]?>)</th></tr>
	<tr><td>Jade Palace Members</td>
		<td align="center" width="125"><b>A-F</b></td><td align="center" width="125"><b>G-L</b></td>
		<td align="center" width="125"><b>M-Q</b></td><td align="center" width="125"><b>R-Z</b></td></tr>
	<tr><td><div style="height: 280px; overflow: auto;"><table border="0" cellpadding="0" cellspacing="0">

<?
$counter = 0;
while ($row = mysql_fetch_assoc($result))
{
	$time_diff = floor((time() - $row['last_sub_req_date'])/86400);
	
	echo "<tr><td width=\"100%\"><label for=\"$row[address]\"><input type=\"checkbox\" name=\"delete[]\" value=\"$row[address]\" id=\"$row[address]\" onclick=\"CheckboxCheck()\">";
	if($row['confirmed'] == 1)
	{
		echo "$row[address]</label></td></tr>\n";
	}
	else
	{
		echo "<font color=Red>$row[address] ($time_diff)</font></label></td></tr>\n";
	}

	$counter++;
}
?>
</table></div></td>
<td valign="top"><div style="font-family: tahoma,verdana; font-size: 8pt; height: 280px; overflow: auto;">
<?
$query = "SELECT * FROM mailinglist_subscribers WHERE confirmed = '1' And address <= 'g%' ORDER BY address ASC";
$result = mysql_query($query) or die("Query failed : " . mysql_error());
while ($row = mysql_fetch_assoc($result))
{
	echo "$row[address]";
	if ($row['bounce_count'] > 0 And $config['check_bounces']) echo " ($row[bounce_count])";
	echo "<br />\n";
}
?>
</div></td>
<td valign="top"><div style="font-family: tahoma,verdana; font-size: 8pt; height: 280px; overflow: auto;">
<?
$query = "SELECT * FROM mailinglist_subscribers WHERE confirmed = '1' And address BETWEEN 'g%' AND 'm%' ORDER BY address ASC";
$result = mysql_query($query) or die("Query failed : " . mysql_error());
while ($row = mysql_fetch_assoc($result))
{
	echo "$row[address]";
	if ($row[bounce_count] > 0 And $config['check_bounces']) echo " ($row[bounce_count])";
	echo "<br />\n";
}
?>
</div></td>
<td valign="top"><div style="font-family: tahoma,verdana; font-size: 8pt; height: 280px; overflow: auto;">
<?
$query = "SELECT * FROM mailinglist_subscribers WHERE confirmed = '1' And address BETWEEN 'm%' AND 'r%' ORDER BY address ASC";
$result = mysql_query($query) or die("Query failed : " . mysql_error());
while ($row = mysql_fetch_assoc($result))
{
	echo "$row[address]";
	if ($row[bounce_count] > 0 And $config['check_bounces']) echo " ($row[bounce_count])";
	echo "<br />\n";
}
?>
</div></td>
<td valign="top"><div style="font-family: tahoma,verdana; font-size: 8pt; height: 280px; overflow: auto;">
<?
$query = "SELECT * FROM mailinglist_subscribers WHERE confirmed = '1' And address >= 'r%' ORDER BY address ASC";
$result = mysql_query($query) or die("Query failed : " . mysql_error());
while ($row = mysql_fetch_assoc($result))
{
	echo "$row[address]";
	if ($row[bounce_count] > 0 And $config['check_bounces']) echo " ($row[bounce_count])";
	echo "<br />\n";
}
?>
</div></td></tr>
<tr>
	<td>
	<input type="checkbox" name="allbox" value="ON" onclick="CheckALL(this)">Select All
	<input type="submit" value="Remove Member(s)" name="submit" onclick="return besure();">
	</td>
	<td colspan="4" align="center">
<?
if ($config['check_bounces'])
{
	echo "Bounces shown next to address in parenthesis. <form action=\"\" method=\"\">Remove members with ";
	echo "<select size=\"1\" name=\"bounce\"><option>1</option><option>2</option><option>3</option>";
	echo "<option>4</option><option>5</option><option>6</option><option>7</option><option>8</option>";
	echo "<option>9</option><option>10</option></select> or more bounces.";
	echo "<input type=\"submit\" name=\"remove_bounce\" value=\"Remove Member(s)\" onclick=\"return besure();\"></form>\n";
}
?>
	</td>
</tr>
</table>
</form>

<form method="POST" action="members.php" name="searchform">
	<p align="center" class="message">
	Search <input type="text" id="addy" name="q" size="20" autocomplete="off" onkeyup="lookitup();"><br />
	Possible matches:<br />
	<table width="200">
		<tr>
			<td>
			<div style="font-family: tahoma,verdana; font-size: 8pt; max-height: 250px; overflow: auto;" id="foo"></div>
			</td>
		</tr>
	</table>
	</p>
</form>
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