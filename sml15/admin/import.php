<?
if ($_POST)
{
	include('config.inc.php'); 

	function validate_email($email)
	{
		// Create the syntactical validation regular expression
		$regexp = "^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$";

		// Presume that the email is invalid
		$valid = 0;

		// Validate the syntax
		if (eregi($regexp, $email))
		{
			$valid = 1;
		}
		else
		{
			$valid = 0;
		}
	
		return $valid;
	}

	function blacklist($email)
	{
		// If address fits a blacklist pattern, return true
		if ($_POST[bypass])
		{
			return false;
		}
		else
		{
			$blacklist_query = "SELECT * FROM mailinglist_blacklist";
			$blacklist_result = mysql_query($blacklist_query) or die("Query failed : " . mysql_error());

			$blacklisted = false;
			while ($blacklist_row = mysql_fetch_assoc($blacklist_result))
			{
				$pos = strpos($email, $blacklist_row[rule]);
				if ($pos !== false)
				{
					$blacklisted = true;
				}
			}
			return $blacklisted;
		}
	}

	if (!empty($_POST[addresses]))
	{
		$addresses = array();
		$import = "delimit";
		$bad_addresses = array();
		$good_addresses = array();

		if (!empty($_POST[delimiter])) $addresses_delimit = explode($_POST[delimiter],$_POST[addresses]);

		$addresses_comma = explode(",",$_POST[addresses]);

		$addresses_newline = explode("\n",$_POST[addresses]);

		$addresses_space = explode(" ",$_POST[addresses]);

		if (count($addresses_comma) > count($addresses_delimit)) $import = "comma";
		if (count($addresses_newline) > count($addresses_comma)) $import = "newline";
		if (count($addresses_space) > count($addresses_newline)) $import = "space";

		//echo $import;

		switch ($import)
		{
		case "delimit":
			foreach($addresses_delimit as $address)
			{
				$query = "SELECT * from mailinglist_subscribers WHERE address = '$address'";
				$result = mysql_query($query) or die("Query failed : " . mysql_error());
				$num_rows = mysql_num_rows($result);
				if ($num_rows == 0 And validate_email($address) And !blacklist($address))
				{
					$key = md5(time());
					$req_time = time();
					$insert_query = "INSERT INTO mailinglist_subscribers (address,userkey,confirmed,last_sub_req_date,bounce_count)VALUES ('$address', '$key', '1', '$req_time', '0')";
					$insert_result = mysql_query($insert_query) or die("Query failed : " . mysql_error());
					$good_addresses[] = $address;
				}
				else
				{
					$bad_addresses[] = $address;
				}
			}
			break;
		case "comma":
			foreach($addresses_comma as $address)
			{
				$query = "SELECT * from mailinglist_subscribers WHERE address = '$address'";
				$result = mysql_query($query) or die("Query failed : " . mysql_error());
				$num_rows = mysql_num_rows($result);
				if ($num_rows == 0 And validate_email($address) And !blacklist($address))
				{
					$key = md5(time());
					$req_time = time();
					$insert_query = "INSERT INTO mailinglist_subscribers (address,userkey,confirmed,last_sub_req_date,bounce_count)VALUES ('$address', '$key', '1', '$req_time', '0')";
					$insert_result = mysql_query($insert_query) or die("Query failed : " . mysql_error());
					$good_addresses[] = $address;
				}
				else
				{
					$bad_addresses[] = $address;
				}
			}
			break;
		case "newline":
			foreach($addresses_newline as $address)
			{
				$address = trim($address);
				$query = "SELECT * from mailinglist_subscribers WHERE address = '$address'";
				$result = mysql_query($query) or die("Query failed : " . mysql_error());
				$num_rows = mysql_num_rows($result);
				$address = trim($address);
				if ($num_rows == 0 And validate_email($address) And !blacklist($address))
				{
					$key = md5(time());
					$req_time = time();
					$insert_query = "INSERT INTO mailinglist_subscribers (address,userkey,confirmed,last_sub_req_date,bounce_count)VALUES ('$address', '$key', '1', '$req_time', '0')";
					$insert_result = mysql_query($insert_query) or die("Query failed : " . mysql_error());
					$good_addresses[] = $address;
				}
				else
				{
					$bad_addresses[] = $address;
				}
			}
			break;
		case "space":
			foreach($addresses_space as $address)
			{
				$query = "SELECT * from mailinglist_subscribers WHERE address = '$address'";
				$result = mysql_query($query) or die("Query failed : " . mysql_error());
				$num_rows = mysql_num_rows($result);
				$address = str_replace(",", "", $address);
				if ($num_rows == 0 And validate_email($address) And !blacklist($address))
				{
					$key = md5(time());
					$req_time = time();
					$insert_query = "INSERT INTO mailinglist_subscribers (address,userkey,confirmed,last_sub_req_date,bounce_count)VALUES ('$address', '$key', '1', '$req_time', '0')";
					$insert_result = mysql_query($insert_query) or die("Query failed : " . mysql_error());
					$good_addresses[] = $address;
				}
				else
				{
					$bad_addresses[] = $address;
				}
			}
			break;
		}
	}
}
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

<?
if ($_POST)
{
	if (count($good_addresses) > 0)
	{
		echo "<p class=\"message\"><b>The following addresses have been successfully imported into the database:</b><br />\n";
		foreach($good_addresses as $address)
		{
			echo "$address<br />\n";
		}
		echo "</p>\n";
	}

	if (count($bad_addresses) > 0)
	{
		echo "<p class=\"message\"><b>The following addresses were either invalid, conflict with your ";
		echo "blacklist rules, or are already in the database, and have not been imported:</b><br />\n";
		foreach($bad_addresses as $address)
		{
			echo "$address<br />\n";
		}
		echo "</p>\n";
	}

	if (count($bad_addresses) == 0 And count($good_addresses) == 0) echo "<p class=\"message\"><b>No email addresses imported.</b></p>";

	echo "<script>window.opener.location='members.php';</script><a href=\"javascript:window.close()\">Close window</a>";
}
?>

<form method="POST" action="import.php">
	<p>Enter email addresses to import below, separated by carriage returns, commas, spaces, or your own delimiter. 
	<input type="hidden" name="bypass" value="bypass"></p>
	<p><textarea rows="10" name="addresses" cols="50"></textarea><br>
	Custom delimiter <input type="text" name="delimiter" size="1">
	<input type="submit" value="Import Addresses" name="submit"></p>
</form>

</body>
</html>