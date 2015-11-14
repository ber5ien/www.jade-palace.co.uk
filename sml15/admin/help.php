<?
include('config.inc.php');
include('SMLmailer.class.php');

$enabled = $config['use_queue'] ? "enabled":"disabled";
$config_contents = "For security, passwords are not dispayed here. See config.inc.php for password variables.<br /><br />";
$config_contents .= "<strong>Database Server</strong>: $config[db_server]<br />";
$config_contents .= "<strong>Database Name</strong>: $config[db_name]<br />";
$config_contents .= "<strong>Database User</strong>: $config[db_user]<br />";
$config_contents .= "<strong>List Name</strong>: $config[list_name]<br />";
$config_contents .= "<strong>Owner Email</strong>: $config[owner_email]<br />";
$config_contents .= "<strong>Notify List Owner Upon Subscription Confirmation</strong>: ";
$config_contents .= ($config[notify_on_confirm]) ? "Yes<br />":"No<br />";
$config_contents .= "<strong>Notify List Owner Upon Unsubscription</strong>: ";
$config_contents .= ($config[notify_on_unsub]) ? "Yes<br />":"No<br />";
$config_contents .= "<strong>Notify User Upon Subscription Confirmation</strong>: ";
$config_contents .= ($config[notify_user_on_confirm]) ? "Yes<br />":"No<br />";
$config_contents .= "<strong>Notify User Owner Upon Unsubscription</strong>: ";
$config_contents .= ($config[notify_user_on_unsub]) ? "Yes<br />":"No<br />";
$config_contents .= "<strong>Default message format</strong>: ";
$config_contents .= ($config[default_format]) ? "HTML<br />":"Plain text<br />";
$config_contents .= "<strong>Unsubscribe URL</strong>: <a href=\"$config[unsub_url]\">$config[unsub_url]</a><br />";
$config_contents .= "<strong>Queue Size</strong>: $config[queue_size] (";
$config_contents .= ($config[use_queue]) ? "enabled)<br />":"disabled)<br />";
$config_contents .= "<strong>Check for bounced messages</strong>: ";
$config_contents .= ($config[check_bounces]) ? "Yes ($config[bounce_mailbox])<br />":"No<br />";
$config_contents .= "<strong>Enable relay?</strong>: ";
$config_contents .= ($config[allow_relay]) ? "Yes<br />":"No<br />";
$config_contents .= "<strong>Relay mailbox</strong>: $config[relay_mailbox]<br />";
$config_contents .= "<strong>Allow relay from</strong>: ";
$config_contents .= (count($config[allow_relay_from]) == 0) ? "Any email address<br />":implode($config[allow_relay_from]) ."<br />";
$config_contents .= "<strong>Use SMTP?</strong>: ";
$config_contents .= ($config[use_SMTP]) ? "Yes<br />":"No<br />";
$config_contents .= "<strong>SMTP server</strong>: $config[smtp_server]<br />";
$config_contents .= "<strong>SMTP domain</strong> (used when logging into a SMTP server): $config[smtp_domain]<br />";
$config_contents .= "<strong>SMTP email address</strong>: $config[smtp_from_address]<br />";
$config_contents .= "<strong>SMTP username</strong>: $config[smtp_username]<br />";
$config_contents .= "<strong>SMTP port</strong>: $config[smtp_port]<br />";

if ($_POST)
{
	$friends = array("friend1","friend2","friend3","friend4","friend5");
	$message = "Check out this great FREE PHP mailing list script I found, Simple Mailing List.\n";
	$message .= "You can download it from http://www.notonebit.com/projects/mailinglist.\n";
	$message .= "It's easy to setup, fast, has loads of features, and best of all, easy to use.\n";
	foreach($friends as $friend)
	{
		if (!empty($_POST[$friend]))
		{
			$tellfriend = new SMLmailer;
			$tellfriend->mail_to = $_POST[$friend];
			$tellfriend->mail_from = $config['owner_email'];
			$tellfriend->subject = "Check out this script: Simple Mailing List";
			$tellfriend->message = $message;
			$tellfriend->is_HTML = ($_POST[format] == 1) ? true:false;
			$tellfriend->use_SMTP = ($config[use_SMTP] == 1) ? true:false;
			$tellfriend->unsub_message = "";
			$tellfriend->send();
		}
	}
}

$path = substr($_SERVER['PHP_SELF'],0,-14) . "process.php";
$form_code = <<<EOT
<form method="POST" action="$path">
	<input type="text" name="address" size="20">
	<input type="submit" value="Submit" name="submit"><br>
	<font face="Tahoma" size="1">All subscribe/unsubscribe requests must be 
	confirmed via email.</font>
</form>
EOT;
$form_code = "<pre>" . htmlentities($form_code) . "</pre>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Help</title>
<style type="text/css" media="screen">@import "css/basic.css";</style>
<style type="text/css" media="screen">@import "css/tabs.css";</style>
<script>
function swap()
{
	if (document.getElementById('formcode').style.display == 'none')
	{
		document.getElementById('formcode').style.display = ''
	}
	else
	{
		document.getElementById('formcode').style.display = 'none'
	}
}
function showconfig()
{
	if (document.getElementById('configcode').style.display == 'none')
	{
		document.getElementById('configcode').style.display = ''
	}
	else
	{
		document.getElementById('configcode').style.display = 'none'
	}
}
function updatecheck()
{
	window.open("http://www.notonebit.com/projects/mailinglist/simpleupdatecheck.php?1.5.1", "updatecheck", 'toolbar=0,scrollbars=1,location=0,statusbar=1,menubar=0,resizable=1,width=425,height=240,left=390,top=262');
}
</script>
</head>
<body>
<h1>Simple Mailing List</h1>

<div id="header">
	<ul id="primary">
		<li><a href="send.php">Send Message</a></li>
		<li><a href="members.php">Members</a></li>
		<li><a href="archives.php">Archives</a></li>
		<li><a href="blacklist.php">Blacklist</a></li>
		<li><span>Help</span>
			<ul id="secondary">
				<li><a href="#using">Using Simple Mailing List</a></li>
				<li><a href="#faq">FAQ</a></li>
				<li><a href="#taf">Tell A Friend</a></li>
				<li><a href="http://www.notonebit.com/forum/" target="_blank">NotOneBit.com Forum</a></li>
				<li><a href="javascript:updatecheck();">Check For Update</a></li>
			</ul>
		</li>
	</ul>
</div>
<div id="main">
	<div id="contents">
			<h2>Help</h2>			
			<p class="note">You've got questions. We've got answers.</p>
			<h3>Using Simple Mailing List</h3>
				<p class="help">The NotOneBit.com Simple Mailing List is an open source application 
				and is available free of charge with no warranty or support. You may use the forum 
				at NotOneBit.com to seek assistance from others.</p>
				<p class="help"><b>Setup.</b> If you&#39;ve made it to this page, odds are that you&#39;ve 
				successfully installed the mailing list. Simple Mailing List has no automated install 
				script. Instead, you should create two folders to store the files; one main folder (named anything you want) 
				and one subfolder (called admin). The main folder 
				should simply contain process.php (and optionally an index page to put a subscribe/unsubscribe form). 
				If you decide to change the name of the admin folder, make sure you edit the frist line of process.php to point to the 
				path of your config.inc.php file (which is in the admin subfolder). You can place the HTML code for the 
				subscribe/unsubscribe form on as many or as few pages of your site as you like. You can also (and it's recommended 
				) add code above and below process.php. Its job is to process subscribe/unsubscribe requests and display the signup 
				form and all subscribe/unsubscribe forms need to point to this page. To see your form code, 
				<a href="javascript:void(0)" onclick="swap()">click here</a>. 
				<span id="formcode" style="display: none;"><table><tr><td style="border: 1px solid #C0C0C0; background-color: #FFFFFF; padding: 8px;"><?=$form_code?></td></tr></table></span>
				It&#39;s suggested that the remainder of the files be placed in an admin subfolder (following the structure of the files 
				in the zip file you downloaded) and <span style="font-weight:bold;color:#A00">protected</span> (with htaccess if using Apache). You should either upload the tables.sql 
				file or paste the contents into phpmyadmin to create the proper tables. Finally 
				you&#39;ll need to edit the config.inc.php file to match your server&#39;s settings as well 
				as your list&#39;s options. The following variables are in config.inc.php:</p>
				<ul>
					<li class="message">$config[db_server] - Your database server </li>
					<li class="message">$config[db_user] - The user that has access to your database </li>
					<li class="message">$config[db_password] - The password for the user that has access to your database</li>
					<li class="message">$config[db_name] - The name of the database</li>
					<li class="message">$config[list_name] - The name of your list. This will appear in the confirmation 
					email body and subject line.</li>
					<li class="message">$config[owner_email] - The email address of the list owner. Messages will be sent 
					from this address.</li>
					<li class="message">$config[notify_on_confirm] - 0 or 1. Make this a 1 if you would like to receive 
					an email every time someone confirms their subscription. </li>
					<li class="message">$config[notify_on_unsub] - 0 or 1. Make this a 1 if you would like to receive an 
					email every time someone unsubscribes.</li>
					<li class="message">$config[notify_user_on_confirm] - 0 or 1. Make this a 1 if you would like the user 
					to receive an email after they confirm their subscription.</li>
					<li class="message">$config[notify_user_on_unsub] - 0 or 1. Make this a 1 if you would like the user to 
					receive an email after they unsubscribe.</li>
					<li class="message">$config[unsub_url] - URL to a page that contains your subscribe/unsubscribe form.</li>
					<li class="message">$config[queue_size] - Set this variable if you want to use a queue. This should 
					be the number of messages to send each time you run the consume.php script via 
					cron.</li>
					<li class="message">$config[check_bounces] - 0 or 1. Set to zero to 
					disable bounce checking, 1 to enable.</li>
					<li class="message">$config[bounce_mailbox] - Email address 
					(account) of mailbox to check for bounces.</li>
					<li class="message">$config[bounce_password] - Password for above 
					mailbox (account)</li>
					<li class="message">$config['default_format'] - The default message format (0=text, 1=html)
					<li class="message">$config['use_queue'] - Whether or not you would like to use the queue feature (true or false). Be sure to run consume.php to process your queue!</li>
					<li class="message">$config['allow_relay'] - Whether or not you want to enable the relay feature. Set to 0 to disable remote relay or 1 to enable.</li>
					<li class="message">$config['allow_relay_from'] - An array of email addresses from which SML will relay messages. Leave empty to accept from any address.</li>
					<li class="message">$config['relay_mailbox'] - The email address of a mailbox on your web server used to check for messages to relay.</li>
					<li class="message">$config['relay_password'] - Password for above mailbox (account).</li>
					<li class="message">$config['use_SMTP'] - Whether to use SMTP or sendmail. The default is sendmail (0), set to 1 for SMTP.</li>
					<li class="message">$config['smtp_server'] - The SMTP server address (e.g. mail.myhost.com). For secure connections use the format ssl://smtp.gmail.com</li>
					<li class="message">$config['smtp_domain'] - The domain used when logging into the SMTP server. Localhost is usually fine.</li>
					<li class="message">$config['smtp_from_address'] - The email address associated with the SMTP account</li>
					<li class="message">$config['smtp_username'] - The SMTP username. Commonly the same as the email address.</li>
					<li class="message">$config['smtp_password'] - The SMTP password.</li>
					<li class="message">$config['smtp_port'] - The port to connect to your SMTP server on. Usually 25, 465, or 587</li>	
				</ul>
				<p class="help"><a href="javascript:void(0)" onclick="showconfig()">View your config file</a><span id="configcode" style="display: none;">
				<table><tr><td style="border: 1px solid #C0C0C0; background-color: #FFFFFF; padding: 8px;"><?=$config_contents?></td></tr></table></span></p>
				<p class="help"><strong>POP, IMAP, and SMTP.</strong> Bounce checking and relaying need to be able to read and write to a POP or IMAP mailbox. Some users need to change the settings within SML in 
				order to be able to make a connection to their mailboxes. Included in SML is a basic POP/IMAP mailbox connection utlity called <a href="peektest.php">peektest.php</a>. Peektest is included
				to allow you to try different setting in case you are having trouble with bounce checking or relaying. Always consult your administrator or host first if you have questions on your
				server's setting as they may be able to give you an answer more quickly than by using this utility. By default, SML uses sendmail to send messages, however you can use SMTP instead. 
				SMTP users should consult their administrator or host with questions on their SMTP settings when configuring SML. Some popular ISP SMTP settings will be posted in the <a href="http://www.notonebit.com/forum/">forum</a> at NotOneBit.com.
				<p class="help"><strong>Use.</strong> In an attempt to stay true to the name of the program, 
				using the Simple Mailing List is simple. The Send Message tab is where you can compose 
				or paste your message in either plain text or HTML. If you&#39;ve enabled the queue 
				you&#39;ll also see the option to schedule the delivery of your message (by default 
				the message defaults to immediate delivery). The Members tab allows you to view, 
				search, and delete members to your list. The Archives tab allows you to view or 
				delete messages that you&#39;ve sent, and displays then in the order that they were 
				created. The Blacklist tab allows you to prevent one or more 
				users from subscribing to your list.</p>
				<a name="faq"><h3>FAQ</h3></a>
				<ul id="help">

					<li><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<b>Why is this excellent script free?</b><br />
					Why not? When I was looking for a simple, easy to use mailing list manager that 
					was free, I couldn&#39;t find one, so I wrote one. I gave 
					it to some friends and they liked it so much I thought I&#39;d let others benefit 
					from it. There are also plenty of features absent from this script that other 
					commercial scripts have (such as an automated install routine, multiple list 
					management, attachments, etc.). However if you feel compelled to help the further development 
					of the Simple Mailing List, donations are always welcome.<p>
<input type="hidden" name="cmd" value="_s-xclick">
<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but04.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" align="right">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
"></p>
</form>
					</li>

					<li>
					<b>How do I get help with the script?</b><br />
					Since the Simple Mailing List is free, you&#39;re on your own if you have issues 
					using it. Sort of. The <a href="http://www.notonebit.com/forum/">forum</a> at NotOneBit.com is your best bet for getting help.<br />
					&nbsp;
					</li>
					<li>
					<b>Why doesn&#39;t the script come with the ability to do &lt;insert feature here&gt;?</b><br/ >

									Because I either didn&#39;t think of it or it would&#39;ve taken too 
					much time and effort to implement and I would&#39;ve had to change the name of the 
					script from the Simple Mailing List to the Pretty Easy to Use Mailing List and 
					that just doesn&#39;t roll off the tongue as easily.<br />
					&nbsp;
					</li>
					<li>
					<b>How do I enable queuing/throttling of email messages so my host doesn&#39;t get 
					angry with me?</b><br />

					Some web hosts (typically in shared environments) prefer that you not send out 
					100,000 email messages every few hours. This can obviously place undue strain 
					on the web server, and in some cases can result in having your account suspended 
					or even closed. To work around that you can setup the Simple Mailing List to 
					out the messages in queue where only X emails are sent out every Y minutes. 
					For example, if your hosts limits you to sending 500 emails per hour, you can 
					setup the Simple Mailing List to only deliver email up to this limit. The only 
					real requirement is that your server supports cron (or some sort of repeated 
					job scheduling). If you don&#39;t have cron on your server, there are some sites 
					that will run cron jobs for you (how thoughtful). You&#39;ll typically want to schedule 
					your cron jobs to run a few times per hour (every 15 is recommended). The typical 
					cron path to the file that runs the queue is &quot;php /path/to/sml/consume.php &gt;&gt; 
					/dev/null 2&gt;&amp;1&quot; Once your cron job is setup, you just need to open the config.inc.php 
					file and set the number of messages to deliver each time the cron job kicks 
					off. For example, if you run the queue script every 15 minutes and you want 
					to limit yourself to 500 emails per hour, set $queue_size to 125. You could 
					also set the cron job to run every half hour and the queue size variable to 
					250; either way you&#39;d get the same result. Queuing messages also allows you 
					to schedule delivery. If you want to create your message now, but send it two 
					weeks later, you can do this as long as you have your queue setup. Without utilizing 
					the queue feature, your email messages are sent as soon as you submit them to 
					all confirmed members.<br />
					&nbsp;
					</li>
					<li><a name="zeropct"></a>
					<b>Why is my progress bar stuck at 0%? Why aren't my messages being sent?</b><br />
					There are three possible reasons why a message's sent progress would be stuck at 0%<ol>
					<li>You sent your message when your list had no confirmed subscribers. While 
					this is unlikely, it's possible. But more than likely its the next reason...</li>
					<li>You're setup to use the queue feature but you're not processing the 
					queue with consume.php. When you use the queue, your messages are kept in a 
					secret far away land. In order for those messages to get delivered to the 
					intended recipients, a magical fairy has to go and retrieve them and send them on 
					their merry way -- messages just don't send themselves once they're tucked 
					away in the queue. That magical fairy's name is consume.php. Consume.php is 
					part of the Simple Mailing List and can be run via your browser (not 
					recommended) or via a scheduler like <a href="http://en.wikipedia.org/wiki/Crontab">cron</a> (recommended). Consume.php's lone 
					job is to process your queue. It sits around all day just waiting to sent 
					mail. It needs a life. If you're not familiar with cron or setting up a 
					script to be run automatically, Google the term 'cron' or 'crontab,' or ask your web 
					host's support about it.</li>
					<li>The messages was queued for a future date/time that hasn't arrived yet. This can happen if you accidentally set the wrong 
					delivery time or if your web server is set to a different time zone than you're in.</li>
					<li>Something went seriously wrong. I can't even imagine what happened. If 
					you're not using the queue and you had confirmed members on your list then 
					you might as well pack it up and go home.</li>
					</ol>
					&nbsp;
					</li>
					<li><b>Why is there a php.ini file included?</b><br />
					Some hosts allow you to edit/create your own php.ini 
					file. This enables you to set the return-path variable for 
					sendmail which in turns allows you to setup an email address 
					to receive message bounces. Without this there's no way to 
					force bounces to go to a specific email address since the 
					reply to field on an email isn't used for that.<br />
					&nbsp;
					</li>
					<li><b>How does the SML relay work?</b><br />
					SML allows you to send messages to your confirmed members without having to login to the SML admin interface. Sending messages using SML is possible from anywhere that you have access to email. That means you could use your cell phone to send a message to your relay mailbox and SML will handle the rest. Using the SML relay, you can send an email from any email account to a mailbox you setup on your web site. SML will periodically check the relay mailbox for messages waiting to be sent, and will either queue or send messages automatically depending on how you have setup SML. You can send either plain text or HTML email to the relay where it will detect the type automatically and email the message to your members. In the SML configuration file you can setup the relay to accept messages from any address (not recommended) or only accept messages from specific addresses (recommended). It is suggested that you create the mailbox you intend to use for relaying with a hard to guess address and not something like 					relay@mydomain.com. If you are using the queue feature of SML, you have the choice to use the queue with relayed messages. To use the queue with relayed messages, simply add the following to the subject of your message after the subject itself: [q]YYYY-MM-DD-HH-MM[/q] where YYYY = the four digit year, MM =  the two digit month, DD = the two digit day, HH = the two digit hour in 24 hour time format, and MM = the two digit minute. For example, if my message subject was "New Software Release Coming Wednesday" and I wanted to relay and queue it, I would alter the subject to be the following, "New Software Release Coming Wednesday [q]2007-09-22-08-30[/q]" which would queue the message to be delivered on or after September 22, 2007 at 8:30am. The queue information in the subject is removed before the message is delivered. Once the relay processes a message it is deleted from the relay mailbox. Relayed messages will display in your archives just like any message sent by SML. In order for relaying to check for w					aiting messages, it must be setup via a scheduler like cron to periodically check the relay mailbox in the same way users using the queue must setup consume.php to check the queue for pending messages. Note: Do not use the same mailbox for both the bounce checking and relay features of SML.
					<br />
					&nbsp;
					</li>
					<li><b>Drafts</b><br />
					SML now supports saving a draft copy of a message while you work on it. If you've ever working on a mailing and had something bad happen to your browser or computer and ended up losing your work, then you'll understand why the drafts feature was added. Drafts are auto-saved every X minutes or they can be saved at any time by clicking the save draft button whenever you like. Auto-save will only kick in after a message has been first created or changed, so if you save a draft and then don't change the message, the auto-save feature won't repeatedly kick in every X minutes since nothing has changed. To retrieve a draft of a message, use the Load Draft link at the top of the Send page and select the draft to load. To delete drafts use the same Load Draft link and select the draft(s) to delete. If you are working on a new message, or on a draft that was loaded, after sending the message, the corresponding draft will automatically be deleted.
					<br />
					&nbsp;
					</li>
					<li><b>I have a lot of members but my email isn&#39;t getting delivered to them. Oh 
					yeah and I forgot to mention, I&#39;m not using the queue.<br />
					</b>When you don&#39;t use the queue, all your recipients are added to the
					<acronym title="Blind Carbon Copy">Bcc</acronym> field of the message. It&#39;s possible 
					to exceed the limits of the Bcc field with too many addresses and either some or 
					all of your recipients won&#39;t receive your message. To get around this there are 
					two solutions. First, use the queue. By using the queue feature email messages are 
					sent directly to each member individually. The other option is a hack of the code 
					resulting in messages being sent to members individually. The only real downside to 
					this is that your browser window needs to stay open the entire time your mailing 
					is in progress, because if you close it, you effectively stop the mailing process. 
					You may also need to edit your&nbsp; PHP configuration setting and change the max_execution_time 
					setting to something high enough to allow the mailing to complete.
					</li>
				</ul>

			<a name="taf"><h3>Tell A Friend</h3></a>
				<p class="help">Like the Simple Mailing List? Why not spread the word and tell your other webmaster friends?</p>
				<form method="POST" action="help.php">
					<p class="help">Email: <input type="text" name="friend1" size="20"><br />
					Email: <input type="text" name="friend2" size="20"><br />
					Email: <input type="text" name="friend3" size="20"><br />
					Email: <input type="text" name="friend4" size="20"><br />
					Email: <input type="text" name="friend5" size="20"></p>
					<p class="help"><input type="submit" value="Submit" name="submit"></p>
				</form>
			<h3>NotOneBit.com</h3>
				<p class="help">The NotOneBit.com Forum is the primary source of support for the Simple Mailing List and is
				available at <a href="http://www.notonebit.com/forum/">http://www.notonebit.com/forum/</a>.</p>
	</div>
</div>

<p align="center" class="message"><a href="http://www.notonebit.com">&copy; NotOneBit.com</a></p>

</body>
</html>