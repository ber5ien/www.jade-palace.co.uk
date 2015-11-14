<?
if ($_POST)
{
	include('config.inc.php');

	$days = $_POST['days'];

	$remove_query = "SELECT * FROM mailinglist_subscribers WHERE confirmed=0";
	$remove_result = mysql_query($remove_query) or die("Query failed : " . mysql_error());

	while ($remove_row = mysql_fetch_assoc($remove_result))
	{
		$time_diff = floor((time() - $remove_row[last_sub_req_date])/86400);
		if ($time_diff >= $days)
		{
			// delete record from subscriber table
			$delete_query = "DELETE FROM mailinglist_subscribers WHERE address='$remove_row[address]'";
			$delete_result = mysql_query($delete_query) or die("Query failed : " . mysql_error());
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
<script>
function besure()
{
	var choice = document.forms[0].days.value;
	return confirm('You are about to permanently delete email addresses that have not confirmed in ' +choice + ' or more days. Are you SURE you want to continue?');
}
</script>
</head>

<body>

<?
if ($_POST)
{
	echo "<script>window.opener.location='members.php';</script><a href=\"javascript:window.close()\">Close window</a>";
}
?>

<div style="width: 350px">
<form method="POST" action="unconfirmed.php">
	<p>Remove email addresses of members that signed up&nbsp; <select size="1" name="days">
	<option value="180">180 Days (6 months)</option>
	<option value="90">90 Days (3 months)</option>
	<option value="21">21 Days (3 weeks)</option>
	<option value="14">14 Days (2 weeks)</option>
	<option value="7">7 Days (1 week)</option>
	</select> ago or more that have not confirmed their subscription.</p>
	<p><input type="submit" value="Remove Member(s)" name="submit" onclick="return besure();"></p>

</form>
</div>

</body>
</html>