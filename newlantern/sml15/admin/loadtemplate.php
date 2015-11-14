<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Select a template</title>
<style type="text/css" media="screen">@import "css/basic.css";</style>
<style>
td {
	border-right: 1px dotted #DDD;
	border-bottom: 1px solid #C0C0C0;
	border-left: 1px dotted #DDD;
	padding: 4px 8px;
}
th {
	font: bold .7em Tahoma, Verdana, Trebuchet MS, Arial;
	color: #FFFFFF;
	border: 1px solid #808080;
	background-color: #999999;
	padding: 0 8px;
}
</style>
</head>

<body>
<p><b>Select a template below.</b> Note that selecting a template will overwrite any text you have entered in the send message window. Be sure
to check the message type (plain text/HTML) after loading your template.</p>
<?
$template_count = 0;
if ($handle = @opendir('templates'))
{
	echo "<table cellspacing=\"0\"><tr><th>File name</th><th>File size</th><th>Last modified</th></tr>\n";
	while (false !== ($file = readdir($handle)))
	{
		if ($file != "." && $file != "..")
		{
			echo "<tr><td><a href=\"javascript:void(0);\" onclick=\"window.opener.location='send.php?t=$file';self.close();\">$file</a></td>\n";
			echo "<td>" . filesize("templates/".$file)/1000 . "k</td><td>" . date("F j, Y @ g:i a",filemtime("templates/".$file)) . "</td></tr>\n";
			$template_count++;
		}
	}
	echo "</table>\n";
	closedir($handle);
}

if (!$template_count)
{
	echo "<p><b>No files found in template folder.</b></p>";
}
?>

</body>
</html>
