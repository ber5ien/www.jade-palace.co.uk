<?
//dishes funtion

function dishes_menu_list()
{
	include('config.php');
	
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
	$result = $mysqli->query("select * from menus");
	
	while ( $data = $result->fetch_object() )
	{
						
		echo ("<li><a href='menu.php?cat=".$data->id_menu."'>".$data->name."</a></li>");	
	}
}

function menu_list()
{
		echo ("<li><a href='sets.php?cat=chinese'>Chinese Meals for 1-5</a></li>");	
		echo ("<li><a href='sets.php?cat=cantonese'>Cantonese Meals for 1-5</a></li>");
}

function special_list()
{
	echo ("<li><a href='special.php?cat=special'>Full list of special dishes.</a></li>");
}
function drinks_list()
{
	echo ("<li><a href='drinks.php?cat=drinks'>Various drinks available.</a></li>");
}
?>