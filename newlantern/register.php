<?
include('top_page.php');
include('middle.php');
include_once("class.account.php");

if ( isset($_GET['create']) && $_GET['create']==1)
{
	if( $_POST['region']=="1" )
	{
		 echo "
	 	<font size=4>You must choose your shop region. Press back button in your browser.</font><br>
	 ";
	}elseif( strlen($_POST['password'])<= 0 )
	{
			 echo "
	 		<font size=4>You must fill out all your detail. Press back button in your browser.</font><br>
	 		";
	 }elseif( $_POST['password'] != $_POST['repassword'] )
	 {
		 echo "
		 	<font size=4>Your password doesn't match. Type passwords again and click button again.</font><br><br>
	 	";
	 
	 	echo "
	 	<font size=4>
	 	<table border=0>
	 	<form name=account method=post action='register.php?create=1'>
		<tr><td>Email:</td><td>		<input size=20 type=text name=email value=".$_POST['email']."><br></td></tr>
		<tr><td>Password:</td><td>	<input size=20 type=text name=password ><br></td></tr>
		<tr><td>Re-type Password:</td><td>	<input size=20 type=text name=repassword><br></td></tr>
		<tr><td>Name:</td><td>		<input size=20 type=text name=name value=".$_POST['name']."><br></td></tr>
		<tr><td>Surname:</td><td>	<input size=20 type=text name=surname value=".$_POST['surname']."><br></td></tr>
		<tr><td>Phone Number:</td><td>	<input type=text name=number value=".$_POST['number']."><br></td></tr>
		<tr><td>Region:</td><td>	<input type=text name=region value=".$_POST['region']."><br></td></tr>
		<tr><td></td><td><input type=submit value='Register'></td></tr>
		</form>
		</table>
		</font>
	 	";
	}elseif( $_POST['password'] == $_POST['repassword'] && strlen($_POST['password'])>0 )
	{
		//account creation
		$account = new Account();
		$account->setEmail($_POST['email']);
		$account->setPassword($_POST['password']);
		$account->setName($_POST['name']);
		$account->setSurname($_POST['surname']);
		$account->setNumber($_POST['number']);
		//$account->showVariable(); //this is for debugger
		//echo $_POST['email'];
		$account->checkemail($_POST['email']);
		$account->addAccount( $account->checkemailflag,$_POST['email'],$_POST['password'],$_POST['name'],$_POST['surname'],$_POST['number'],$_POST['region'] );
	//password didn't match
	}else{
	echo " <font size=4>Your account has not been created. Please fill out the form correctly.</font><br>";
	}

}else{
?>
<center><h2>SIGN UP</h2></center>
<font size=4>

<p>Fill out the form below in order to create your account.</p>
<center><br></center>

<br>
<form id="register_form" name=account method=post action="register.php?create=1">
<table border=0>
<tr><td>Email:</td><td>		<input class="required email" size=17 type=text name=email><br></td></tr>
<tr><td>Password:</td><td>	<input class="required" minlength="4" size=10 type=password name=password><br></td></tr>
<tr><td>Re-type Password:</td><td>	<input class="required" minlength="4" size=10 type=password name=repassword><br></td></tr>
<tr><td>Name:</td><td>		<input size=15 type=text name=name><br></td></tr>
<tr><td>Surname:</td><td>	<input size=15 type=text name=surname><br></td></tr>
<tr><td>Phone Number:</td><td>	<input size=15 class="required" minlength="5" type=text name=number><br></td></tr>
<tr><td>Shop Region:</td><td>	
<select class="required" name=region><option>Penzance</option></select><br></td></tr>
<tr><td></td><td><input type=submit value="CLICK ME TO COMPLETE ME."></td></tr>
</form>

</table>
</font>
<?
};
include('footer.php');
?>
