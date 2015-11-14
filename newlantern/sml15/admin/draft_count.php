<?
include('config.inc.php');

$query = "SELECT COUNT(*) FROM mailinglist_drafts";
$result = mysql_query($query) or die("Query failed : " . mysql_error());
$num_rows = mysql_fetch_row($result);

echo $num_rows[0];
?>