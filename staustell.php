<?
session_start();
include('top_page.php');
include('middle.php');
?>

<center><h1>St. Austell Take Away</h1></center>
<div class="main_content">
<center><img src="graphics/address/st_austell.png" border="0" alt=""></center>
<center><img src="graphics/maps/st_austell.png" border="0" alt=""></center>
<center><h3>Delivery Charges (Minimum Order &pound;9)</h3></center>
<?
	include('config.php');
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
	$result = $mysqli->query("SELECT * FROM delivery WHERE takeaway=\"staustell\"");
	echo("<table width=100%>");
	while($data = $result->fetch_object())
	{
		echo "<tr>";
		echo "<td>&pound;".$data->price."</td>";
		echo "<td>&nbsp;".$data->name."</td>";
		echo "</tr>";
	}
	echo("</table>");
	echo("<center><h3>(Will be happy to quote for any other areas)</h3></center></div>");
	include('footer.php');
?>
