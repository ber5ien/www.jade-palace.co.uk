<?
include('top_page.php');
include('middle.php');

$category = $_GET['cat'];
		
	include('config.php');
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
	echo "<div class=menu_table>";
	echo ("<table width=100% align=center style='empty-cells: hide;' cellpadding=0 cellspacing=0>");
	$result = $mysqli->query("select * from menus WHERE id_menu=".$category."");
	$data=$result->fetch_object();
	echo ("<tr><td width=100% style='border: none;' colspan='4'><center><h1>".$data->name."</h1></center></td><td></td></tr>");
	echo "<tr><td><h2>No.</h2></td><td><h2>Name of the Dish</h2></td><td><h2>Price</h2></td></tr>";
	
	$result = $mysqli->query("select * from dishes WHERE id_menu=".$category."");
	while ( $data = $result->fetch_object() )
	{	
		echo ("<tr >");
		echo ("<td width='10%'>".$data->sort_number."</td><td width=80%>".$data->name."</td><td width='10%'>&pound;".$data->price."</td>");
		echo ("</tr>");
		$max=0;					
	}
	echo ("</table>");
	echo "</div>";
include('footer.php');
?>
