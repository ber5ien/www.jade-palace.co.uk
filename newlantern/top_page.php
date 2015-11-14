<? session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
  <title>Chinese Lantern Penzance - Chinese Food Take Away in Cornwall </title>
    <meta name="author" content="aMiGa-aMiDEV">
    <meta name="keywords" content="Chinese Lantern, chinese food, chinese, penzance, cantonese, meals, take, away, food, st austell, Roche, Truro, Cornwall, takeaway">
    <meta name="description" content="Chinese Lantern, Chinese, Take Away, Cornwall">
    <meta name="copyright" content="Rafal Zdziech" >
    <meta name="ROBOTS" content="INDEX, FOLLOW">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
    <meta http-equiv="content-style-type" content="text/css">
    <meta name="generator" content="vim">
    <meta name="HandheldFriendly" content="true" >
    <meta name="MobileOptimized" content="width" >
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" >
    
    <link rel="shortcut icon" href="graphics/favicon.ico">
    <link rel="stylesheet" href="css/chinese.css" type="text/css" media="screen" >
    <link rel="stylesheet" href="css/ui.all.css" type="text/css" media="screen" >
    <!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="css/iehacks.css" >
	<![endif]-->
    
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js"></script>
	  <script type="text/javascript" src="lib/jquery.validate.js"></script>
		<style type="text/css">
      label.error {float: inherit; color: red; font-size: 0.5em; }
      option.error {color: #FF0000; font-size: 0.5em;  }
		</style>
  <script type="text/javascript"> $(document).ready(function(){$("#register_form").validate(); }); </script>
  <script type="text/javascript"> $(document).ready(function(){- $("#date").datepicker({ showOn: 'button', dateFormat: 'yy-mm-dd'}); }); </script>
</head>

<body>
<? 
include_once('dishes_function.php'); 
?>
<div id="banner"> 
<H1>TELEPHONE ORDERS WELCOME</H1>
<H2>01736 351 466</H2>
</div>
<div id="food">
<H3>Monday to Friday    5.00pm - 11.00pm
<br>
Saturday to Sunday  4.30pm - 11.00pm</H3>
</div>
<div id="header">
</div>
<div id="navsite">
	<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="free.php">Free Dishes &amp; Vouchers</a></li>
	<li><a href="contact-us.php">Contact Us</a></li>
	<li><a href="penzance.php">Delivery Charges</a></li>
	</ul>
</div>

<div id="columnLeft">
<?
	dishes_menu_list(); 
?>
</div>
