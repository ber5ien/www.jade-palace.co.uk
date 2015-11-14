<?
include('top_page.php');
include('middle.php');
?>

<center><h1>Truro Take Away</h1></center>
<div class="main_content">
<center><img src="graphics/address/truro.png" border="0" alt=""></center>
<center><img src="graphics/maps/truro.png" border="0" alt=""></center>
<center><h3>Delivery Charges</h3></center>
<?
	include('config.php');
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
	$result = $mysqli->query("SELECT * FROM delivery WHERE takeaway=\"truro\"");
	echo("<table width=100%>");
	while($data = $result->fetch_object())
	{
		echo "<tr>";
		echo "<td><font color=white>&pound;".$data->price."</font></td>";
		echo "<td><font color=white>&nbsp;".$data->name."</font></td>";
		echo "</tr>";
	}
	echo("</table>");
	echo("<center><h3>(Will be happy to quote for any other areas)</h3></center>");
?>
</div>
<?
include('footer.php');
?>