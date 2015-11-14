<?
include('config.inc.php'); 

$email = $_REQUEST[q];
$response = "";

$query = "SELECT * FROM mailinglist_subscribers WHERE address LIKE '%$email%'";
$result = mysql_query($query) or die("Query failed : " . mysql_error());
$num_rows = mysql_num_rows($result);
while($row = mysql_fetch_assoc($result))
{
	$response .= $row[address] . ",";
}
echo $response;
?>