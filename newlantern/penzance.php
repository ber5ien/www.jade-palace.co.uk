<?
session_start();
include('top_page.php');
include('middle.php');
?>

<center><h2>PENZANCE TAKE AWAY</h2></center>

<center><img src="graphics/maps/penzance.png" border="0" alt=""></center>
<center><h3>Delivery Charges (Minimum Order &pound;9)</h3></center>
<?
	include('config.php');
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
	$result = $mysqli->query("SELECT * FROM delivery WHERE takeaway=\"penzance\" ORDER BY id_delivery");
	echo("<table align=center>");
	while($data = $result->fetch_object())
	{
		echo "<tr>";
		echo "<td><b>".$data->price."</b></td>";
		echo "<td><b>&nbsp;".$data->name."</b></td>";
		echo "</tr>";
	}
	echo("</table>");
	echo("<center><h3>(Will be happy to quote for any other areas)</h3></center>");
	include('footer.php');
?>
