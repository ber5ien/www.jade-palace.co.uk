<?
include('config.inc.php'); 
//	$query = "SELECT * from mailinglist_subscribers WHERE address = '$address'";
//	$result = mysql_query($query) or die("Query failed : " . mysql_error());
//	$num_rows = mysql_num_rows($result);
//	$key = md5(time());
//	$req_time = time();
//	$insert_query = "INSERT INTO mailinglist_subscribers (address,userkey,confirmed,last_sub_req_date,bounce_count)VALUES ('$address', '$key', '1', '$req_time', '0')";
	
$result= mysql_query("select * from users");
$a=0;
while( $row = mysql_fetch_row($result) ){

	$result_mail= mysql_query("SELECT * FROM mailinglist_subscribers WHERE address =\"".$row[1]."\"");
	$num_rows = mysql_num_rows($result_mail);
	if( $num_rows > 0 )
	{
	
	}else{
		$address=$row[1];
		$shop=$row[6];
		$key = md5(time());
		$req_time = time();
		$result_mailing = mysql_query("INSERT INTO mailinglist_subscribers(address,userkey,confirmed, last_sub_req_date, bounce_count, shop) VALUES('$address', '$key', '1', '$req_time', '0','$shop') ");
		$a = $a + 1;
	}
}
echo ("".$a." new emails have been added.");
	
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Import Email Addresses</title>
<style type="text/css" media="screen">@import "css/basic.css";</style>
<style type="text/css" media="screen">@import "css/tabs.css";</style>
</head>

<body>


</body>
</html>