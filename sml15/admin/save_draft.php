<?
include('config.inc.php');

if (get_magic_quotes_gpc()) // Quotes in the message are automatically being escaped
{
	$message = stripslashes($_POST[message]);
	$subject = strip_tags(stripslashes($_POST[subject]));
}
else
{
	$message = $_POST[message];
	$subject = strip_tags($_POST[subject]);
}

// do a select to see if the id exists (could use INSERT ... ON DUPLICATE KEY UPDATE w/MySQL 4.1.0 and later)
// if it does, update, else insert

$message = addslashes($message);

$query = "SELECT id FROM mailinglist_drafts WHERE id = '$_POST[id]'";
$result = mysql_query($query) or die("Query failed : " . mysql_error());
$num_rows = mysql_fetch_row($result);

$query = ($num_rows) ? "UPDATE mailinglist_drafts SET subject='$_POST[subject]',message='$message',texthtml='$_POST[texthtml]',lastsaved='".time()."' WHERE id='$_POST[id]'":"INSERT INTO mailinglist_drafts (id,subject,message,texthtml,lastsaved) VALUES ('$_POST[id]','$_POST[subject]','$message','$_POST[texthtml]','".time()."')";
$result = mysql_query($query) or die("Query failed : " . mysql_error());

echo ($result) ? "<font color=\"Green\"><strong>Draft saved at ".date("g:i a")."</strong></font>":"Error: unable to save draft";
?>