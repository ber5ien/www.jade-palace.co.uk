<?
include('config.inc.php'); 

$pattern = $_REQUEST[q];
$response = "";

$query = "SELECT * FROM mailinglist_subscribers WHERE address LIKE '%$pattern%' ORDER BY address ASC";
$result = mysql_query($query) or die("Query failed : " . mysql_error());
$num_rows = mysql_num_rows($result);

if (!empty($pattern))
{
	while($row = mysql_fetch_assoc($result))
	{
		$response .= $row[address] . ",";
	}
}

echo $response;
?>