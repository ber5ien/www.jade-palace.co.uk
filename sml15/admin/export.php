<?
@ob_start();

$export_data = "";

include('config.inc.php'); 

$query = 'SELECT * FROM mailinglist_subscribers';
$result = mysql_query($query) or die("Query failed : " . mysql_error());

while($row = mysql_fetch_array($result))
{
	$export_data .= $row['address'] . "\r\n";
}

$output_file = 'sml_addresses.csv';
@ob_end_clean();

header('Pragma: no-cache"');
header('Expires: 0'); 
header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: pre-check=0, post-check=0, max-age=0');
header('Content-Transfer-Encoding: none');

//This should work for IE & Opera
header('Content-Type: application/octetstream; name="' . $output_file . '"');
//This should work for the rest
header('Content-Type: application/octet-stream; name="' . $output_file . '"');

header('Content-Disposition: inline; filename="' . $output_file . '"');

echo $export_data;
exit();
?>

