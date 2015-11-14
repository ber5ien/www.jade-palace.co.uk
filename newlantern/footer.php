</div>
<!-- finish of center column -->
<div id="columnRight">
<?
	if (isset($_SESSION['rights']) & $_SESSION['rights'] > 0 )
	{
		echo ("
			<h2>ADMIN PANEL</h2>
			<ul>
			<li><a href='admin.php?cat=home'>Accounts Info &raquo;</a></li>
			<li><a href='admin.php?cat=vouchers'>Vouchers &raquo;</a></li>
			<li><a href='vouchers_list.php'>Print Vouchers List &raquo;</a></li>	
			<li><a href='admin.php?cat=dishes'>Dishes &raquo;</a></li>
			<li><a href='admin.php?cat=delivery'>Delivery &raquo;</a></li>									
			<li><a href='sml15/admin/index.php'>Mailing List &raquo;</a></li>
		");
									
		if( isset($_SESSION['rights']) & $_SESSION['rights'] == 2 )
		{
			 echo ("<li><a href='phpmv2/index.php'>Statistics &raquo;</a></li>");
		}
		echo "</ul>";
	}
	#echo $_SESSION['userlogin'];

	if ( isset($_SESSION['userlogin']) && $_SESSION['userlogin']==1 )
	{
		echo "<h2 class='menu'>LOGIN</h2>";
		echo "You are log in as <b> ".$_SESSION['user']."</b>";
		echo "
			<form action='logout.php' method=post>
			<center><input class='button' type='submit' value='Logout'></center>
			</form>
		";
						
	}else{
	?>
	<h2 class="menu">LOGIN</h2>
	<form action='login.php' method=post>
		<label>	Email:</label>								
		<input class='input_field' size=20 type ='text' name='userid'>
<br>
		<label>	Password:</label>
		<input class='input_field' size=20 type ='password' name='password'>
		<input class='button' type='submit' value='Submit  '>
	</form>

	<form action='register.php' method='post'>
		<input class='button' type='submit' value='Register'>
	</form>
 <a href=recovery.php>Forgot your password?</a>
	<?
	}
?>
	<h2 class="menu">SET MENUS</h2>
		<ul><?menu_list();?></ul>
	<h2 class="menu">SPECIAL DISHES</h2>
		<ul><? special_list(); ?></ul>
	<h2 class="menu">DRINKS</h2>
		<ul><? drinks_list(); ?></ul>
</div>			
<div id="footer">
<p>Website design by</p><br>
<a href="http://www.amidev.co.uk">aMiDeV</a>
<p><a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="Valid CSS!"></a> 
<a href="http://validator.w3.org/check?uri=referer"><img style="border:0;" src="http://www.w3.org/Icons/valid-html401" alt="Valid HTML 4.01 Transitional" height="31" width="88"></a></p>
</div>
<!-- phpmyvisites -->
<a style="color: #85bbe9;" href="http://www.phpmyvisites.us/" title="Free web analytics, website statistics"
onclick="window.open(this.href);return(false);">
<script type="text/javascript">
<!--
var a_vars = Array();
var pagename='';

var phpmyvisitesSite = 2;
var phpmyvisitesURL = "http://jade-palace.co.uk/phpmv2/phpmyvisites.php";
//-->
</script>
<script language="javascript" src="http://jade-palace.co.uk/phpmv2/phpmyvisites.js" type="text/javascript"></script>
<object><noscript><p style="color: #85bbe9">Free web analytics, website statistics
<img src="http://jade-palace.co.uk/phpmv2/phpmyvisites.php" alt="Statistics" style="border:0" >
</p></noscript></object></a>
<!-- /phpmyvisites -->
</body>
</html>
