<?
include('config.inc.php');
include('SMLmailer.class.php');

if (get_magic_quotes_gpc() Or get_magic_quotes_runtime) // Quotes in the message are automatically being escaped
{
	$message = stripslashes($_POST[message]);
	$subject = strip_tags(stripslashes($_POST[subject]));
}
else
{
	$message = $_POST[message];
	$subject = strip_tags($_POST[subject]);
}

$subject = "Simple Mailing List Test Message: " . $subject;

$ownertest = new SMLmailer;
$ownertest->mail_to = $config['owner_email'];
$ownertest->mail_from = $config['owner_email'];
$ownertest->subject = $subject;
$ownertest->message = $message;
$ownertest->is_HTML = ($_POST[format] == 1) ? true:false;
$ownertest->use_SMTP = ($config[use_SMTP] == 1) ? true:false;
$ownertest->send();

if($ownertest->success)
{
	$status = "<font color=Green>Your test message has been successfully sent to the list owner @ " .date('g:i A T n/j/Y'). "</font>";
}
else
{
	$status = "<font color=Red>Unable to send message. Check your server's error log for details.</font>";
}
echo $status;
?>