<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JADE PALACE ADMIN PANEL</title>
</head>
<body>
<table width=100% border=0>
<tr>
  <td width=100% bgcolor=#19A349><center><h1>JADE PALACE ADMIN PANEL</h1></center></td>
  </tr>
<tr><td>
  <hr/>
  
<?
include ("admin_functions.php");
include ('config.php');
admin_menu("news");
echo "</table>";
?>
<center><p>Administrator Panel Created by <a href=mailo:rafal.zdziech@gmail.com>aMiGa</a></p></center>
</td></tr> 