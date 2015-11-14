<?
include('config.inc.php'); 

if ($_GET[m])
{
	$query = "SELECT message, format FROM mailinglist_messages WHERE id = '$_GET[m]'";
	$result = mysql_query($query) or die("Query failed : " . mysql_error());
	$row = mysql_fetch_assoc($result);
}

if ($row[format] == "html") echo $row[message];
if ($row[format] == "text") echo "<html><head><title></title></head><body><xmp>$row[message]</xmp></body></html>\n";
?>
