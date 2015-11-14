<?
session_start();
if( $_SESSION['rights'] > 0 )
{ 
	include('config.php');
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
	$result = $mysqli->query("SELECT * FROM `vouchers` WHERE STATUS = 'active' AND valid > CURDATE() ORDER BY id_discount"); 
	while ( $data = $result->fetch_object() ) 
	{
	echo ("<ul>");
	echo ("<li><p style='font-size: 100%; line-height:100%;'><u>{$data->offer}</u></p>");
	echo ("<p style='font-size: 70%; line-height:20%;'>{$data->description}</p>");
	echo ("<p style='font-size: 70%; line-height:20%;'>Valid until: {$data->valid}</p>");
	echo ("<p style='font-size: 100%; line-height:20%;'><u>{$data->restrict}</u></p></li></ul><hr>");		
	}
	
}else{
	echo "You have no rights to view the page";
}

?>

<a href=index.php>Back to Main Page</a><br><br>
<input type='button'	onClick='window.print()' value='Print This List'/>