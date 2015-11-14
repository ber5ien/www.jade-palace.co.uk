<?
include('top_page.php');
include('middle.php');

$category = $_GET['cat'];
		
	include('config.php');
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
	echo ("<table style='empty-cells: hide'>");
	echo ("<tr><td></td><td><center><h2>Drinks</h2></center></td><td></td></tr>");
	echo "<tr><td><b>No.</b></td><td><b>Name of the Drink</b></td><td><b>Price</b></td></tr>";
	
	$result = $mysqli->query("select * from dishes WHERE id_menu=\"".$category."\"");
	while ( $data = $result->fetch_object() )
	{	
		echo ("<tr>");
		echo ("<td width=10%><font size=4 color=#C80006>".$data->sort_number."</font></td><td>".$data->name."</td><td width=10%>&pound;".$data->price."</td>");
		echo ("</tr>");					
	}
	echo ("</table>");
include('footer.php');
?>
