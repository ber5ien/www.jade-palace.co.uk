<?
include('top_page.php');
include('middle.php');
?>

<center><h1>LOGIN</h1></center>
<div class="main_content">
<?
$user = $_POST['userid'];
$pass = $_POST['password'];

		include('config.php');
		$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
		$result = $mysqli->query("select * from users where email='$user'");
		$data = $result->fetch_object();
		if ( $pass == $data->password && $user == $data->email && !empty($user) && !empty($pass) )
		{
		
			$_SESSION['userlogin']=1;
			$_SESSION['user']=$user;
			$_SESSION['rights']=$data->rights;
			echo "<h3>Welcome ".$user."</h3><p>To print your vouchers</p> 
			<a href='free.php'><h3>CLICK HERE</h3></a>";
		}else{
			$_SESSION['userlogin']=0;
			echo "Wrong password or user doesn't exist. Please try again.";
		}
	//	echo $_SESSION['rights'];
?>
</div>

<?
include('footer.php');
?>