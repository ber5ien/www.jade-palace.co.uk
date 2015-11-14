<?
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
  "http://www.w3.org/TR/html4/loose.dtd">
<?
if( isset($_SESSION['userlogin']) && $_SESSION['userlogin']==1)
{
include('config.php');

$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
$result = $mysqli->query("select * from users WHERE email=\"".$_SESSION['user']."\"");
$data = $result->fetch_object();
$email=$data->email;

$code=$_SESSION['user'];
$code=md5($code);
$code=mb_strcut($code,0,5);
	
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
	$result = $mysqli->query("select * from vouchers WHERE id_discount=\"".$_GET['id']."\"");
	$data = $result->fetch_object();
?>	
<html>
<title>Your Take Away Voucher</title>
<body>
<table border=0 cellpadding=0 cellspacing=0 style="height=414; width=950" ><tr>
		<td>
		<!--- <td background='graphics/vouchers/jade.jpg'< style='width=950px; height=414px;'> -->
		<img src='graphics/vouchers/golden.jpg' width=950 height=414>	
		<DIV STYLE='position:absolute; top:230px; left:30px; width: 500px; height:35px'>
		<CENTER><FONT SIZE='+1' COLOR='black'><? echo $data->description;?></FONT></CENTER>
		</DIV>
		<DIV STYLE='position:absolute; top:95px; left:430px; width: 495px; height:35px'>
		<CENTER><FONT SIZE='+1' COLOR='black'><b><? echo $data->offer;?></b></FONT></CENTER>
		</DIV>
		<DIV STYLE='position:absolute; top:310px; left:250px; width: 950px; height:35px'>
		<CENTER><FONT SIZE='+1'><b><?echo $email?></b></FONT></CENTER>
		</DIV>
		<DIV STYLE='position:absolute; top:340px; left:250px; width: 900px; height:35px'>
		<CENTER><FONT SIZE='+1'><b><?echo $code?></b></FONT></CENTER>
		</DIV>
		<DIV STYLE='position:absolute; top:390px; left:390px; width: 950px; height:35px'>
		<CENTER><FONT SIZE='3'><b><?echo $data->valid;?></b></FONT></CENTER>
		</DIV>
		
		<DIV STYLE='position:absolute; top:387px; left:50px; width: 950px; height:35px'>
		<CENTER><FONT SIZE='2'><b><u><?echo $data->restrict;?></u></b></FONT></CENTER>
		</DIV>					
						
		</td>		
		</tr>
		</table>
		<br>
		<center>
		<a href=free.php>Back to Vouchers</a><br><br>
		<input type='button'
  		onClick='window.print()'
  		value='Print This Voucher'/>
  		</center>
  		
<?
}else{

echo "<h1>YOU MUST BE LOGGED IN TO BE ABLE TO ACCESS THIS PAGE!</h1>";
}

?>
</body>
</html>