<html>
<head>
<title></title>
<style>
body, div, td {
	font: .8em Verdana,Arial,Helvetica;
}

#results {
	margin: 6px;
	padding: 6px;
	border: 1px solid #CCC;
}
</style>
</head>
<body>
<h3>Mailbox peeker</h3>
<p>This utility allows you to test the settings needed to open a mailbox, either locally or remotely.</p>
<form method="POST" action="<?$_SERVER[PHP_SELF]?>">
	<table border="0" cellpadding="2" cellspacing="0">
		<tr>
			<td>hostname</td>
			<td><input type="text" name="host" size="20" value="<?=$_POST[host]?>"> 
			(e.g. localhost, pop.myserver.org)</td>
		</tr>
		<tr>
			<td>username</td>
			<td><input type="text" name="username" size="20" value="<?=$_POST[username]?>"></td>
		</tr>
		<tr>
			<td>password</td>
			<td><input type="text" name="password" size="20" value="<?=$_POST[password]?>"></td>
		</tr>
		<tr>
			<td>port</td>
			<td><input type="text" name="port" size="4" value="<?=$_POST[port]?>"> (typical 
			settings are: POP3=110, IMAP=143, SSL=993, SSL no-validation=995)</td>
		</tr>
		<tr>
			<td>mailbox</td>
			<td><input type="text" name="mailbox" size="20" value="INBOX"> 
			(typically INBOX or *)</td>
		</tr>
		<tr>
			<td>flags</td>
			<td><select size="10" name="flags[]" multiple>
			<option value="/imap">/imap</option>
			<option value="/pop3">/pop3</option>
			<option value="/ssl">/ssl</option>
			<option value="/readonly">/readonly</option>
			<option value="/tls">/tls</option>
			<option value="/notls">/notls</option>
			<option value="/novalidate-cert">/novalidate-cert</option>
			<option value="/secure">/secure</option>
			<option value="/user">/user</option>
			<option value="/authuser">/authuser</option>
			</select> Optional. Use only if the above setting do not work.</td>
		</tr>
	</table>
	<p><input type="submit" value="Test Mailbox Connection" name="submit"></p>
</form>

<?php
// Bounce handler setup check
// Need: server (typically localhost), port (imap:143,pop:110,ssl:993,ssl no cert:995), username, password, flags, mailbox name (typically INBOX))

// LP = port 143, localhost, email address/password
// OO = port 110, mail.optonline.net, /pop3 email address/password
// AOL = port 143, imap.aol.com, email address/password

if($_POST)
{
	$flags = '';
	if($_POST[flags])
	{
		$flags = $_POST[flags]; // copy flag values into a new array
		$flag_user = array_search('/user', $flags);
		$flag_authuser = array_search('/authuser', $flags);
		if($flag_user !== FALSE) $flags[$flag_user] = '/user' . "=$_POST[username]";
		if($flag_authuser !== FALSE) $flags[$flag_authuser] = '/authuser' . "=$_POST[username]";
		$flags = implode("",$flags);
	}
	$mbox = @imap_open("{" . $_POST[host] . ":" . $_POST[port] . "$flags}$_POST[mailbox]", "$_POST[username]", "$_POST[password]") or die("Couldn't connect: " . imap_last_error());

	echo "<div id=\"results\" style=\"width:650;height:200;overflow:auto;\">\n";
	echo "<span style=\"color:Green;font-weight:bold\">Mailbox connection successful</span>\n";

	echo "<h3>Mailboxes</h3>\n";
	$folders = imap_listmailbox($mbox, "{" . $_POST[host] . ":" . $_POST[port] . "}", "*");

	if ($folders == false)
	{
		echo "Mailbox call failed<br />\n";
	}
	else
	{
		foreach ($folders as $val)
		{
			echo $val . "<br />\n";
		}
	}

	echo "<h3>Headers in $_POST[mailbox]</h3>\n";
	$headers = imap_headers($mbox);

	if ($headers == false)
	{
		echo "Get mail headers failed - no messages found<br />\n";
	}
	else
	{
		foreach ($headers as $val)
		{
			echo $val . "<br />\n";
		}
	}

/*
	echo "<h3>Mailbox Status</h3>\n";
	$status = imap_status($mbox, "{" . $_POST[host] . ":" . $_POST[port] . "}INBOX", SA_ALL);
	if ($status)
	{
		echo "Messages:   " . $status->messages    . "<br />\n";
		echo "Recent:     " . $status->recent      . "<br />\n";
		echo "Unseen:     " . $status->unseen      . "<br />\n";
		echo "UIDnext:    " . $status->uidnext     . "<br />\n";
		echo "UIDvalidity:" . $status->uidvalidity . "<br />\n";
	}
	else
	{
		echo "imap_status failed: " . imap_last_error() . "\n";
	}
*/

	echo "</div>";
	imap_close($mbox);
}
?>

</body>
</html>