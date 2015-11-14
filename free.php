<?
include('top_page.php');
include('middle.php');
?>
<h1>Free Dishes and Food Vouchers</h1>
<br>
<script type="text/javascript">
var pagename = "Vouchers";
</script>
<?

if ( isset($_SESSION['userlogin']) && $_SESSION['userlogin'] == 1 )
{
  
	include('config.php');
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
echo ("<div class='main_content'>");
	echo "YOU MUST MENTION YOU WISH TO USE VOUCHER WHEN PLACING YOUR ORDER. 
	<ul class='vouchers'>
	";
	$result = $mysqli->query("SELECT * FROM `vouchers` WHERE STATUS = 'active' AND valid > CURDATE() ORDER BY id_discount"); 
	while ( $data = $result->fetch_object() )
	{
		echo "<li class='vouchers'><a class='vouchers' href=voucher.php?id=".$data->id_discount.">".$data->offer."</a></li>";
	}
   echo "</ul>
	<p><u>VOUCHER CAN NOT BE USED ON SATURDAYS.</u></p>
	";
echo ("</div>");
}else{
	echo ("<div class='main_content'>");
	echo "
			You must log in to be able to get exclusive vouchers and free dishes.
			
			<h4>STEP 1</h4>
			Create your account.
		
			<h4>STEP 2</h4>
			Return to this page once you login.		
				
			<a href=register.php><h3>CLICK HERE TO REGISTER</h3></a>			
		";
	echo "</div>";
}

include('footer.php');
?>
