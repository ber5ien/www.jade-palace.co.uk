<? session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>

<title>JADE PALACE - Chinese Food Take Away in Cornwall </title>
	<meta name="author" content="aMiGa">
	<meta name="keywords" content="Golden Dragon, chinese food, chinese, cantonese, meals, take, away, food, st austell, Roche, Truro, Cornwall, takeaway">
	<meta name="description" content="Golden Dragon, Chinese, Take Away, Cornwall">
	<meta name="copyright" content="Rafal Zdziech" >
	<meta name="ROBOTS" content="INDEX, FOLLOW">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
	<meta http-equiv="content-style-type" content="text/css">
	<meta name="generator" content="Bluefish 1.0.7">
	<meta name="HandheldFriendly" content="true" />
   <meta name="viewport" content="width=1024px, height=400px, user-scalable=yes" />
	<link rel="shortcut icon" href="graphics/favicon.ico">
	<link rel="stylesheet" href="css/standard.css" type="text/css" media="screen" >
	<link rel="stylesheet" href="css/ui.all.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" media="handheld" href="css/mobile.css" />
	
	<!--[if gte IE 6]>
	<link rel="stylesheet" href="css/iestyle.css" type="text/css" media="screen" >
	<![endif]-->   
	<!--[if IE 7]>
	<link rel="stylesheet" href="css/ie7style.css" type="text/css" media="screen" >
	<![endif]-->  
	
	<!-- <STYLE type="text/css">BODY { background: url("graphics/background/background.jpg") no-repeat; background-position: center; background-attachment:fixed; }</STYLE> -->

 <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js"></script>
 <script type="text/javascript" src="lib/jquery.validate.js"></script>
 
		<style type="text/css">
		label.error {float: inherit; color: yellow; font-size: 0.5em; }
		option.error {color: yellow; font-size: 0.5em;  }
		</style>
  <script type="text/javascript">
  $(document).ready(function(){
    $("#register_form").validate();
  });
  </script>
  <script type="text/javascript">
		$(document).ready(function(){-
    			$("#date").datepicker({ showOn: 'button', dateFormat: 'yy-mm-dd'});
  		});
	</script>
  
</head>
<?
include_once('dishes_function.php');
?>
<body>
<div id="bg">
    <div>
        <table cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <img src="graphics/background/background.jpg" alt=""/>
                </td>

            </tr>
        </table>
    </div>
</div>
   <!-- end -->
<div id="cont">
    <div class="box">

<!-- top banner -->
<table border="0" style="width: 1000px;" align="center" cellpadding="0" cellspacing="0">
 <tr><td align="center"><table style="width: 1000px; background-image:url(graphics/banner.png); height: 122px"><tr><td></td></tr></table></td></tr>
</table> 
<!-- end of top banner -->

<!-- center table with sides-->
<table border="0" style="width: 1000px;" align="center" cellpadding="0" cellspacing="0" >
 <tr>
 	<td align="center">
 	 <!--  center without side graphics -->
 		<table style="width: 1000px; background-image:url(graphics/middle.png)" cellpadding="0" cellspacing="0">
 			<tr>
 				<td>
 				<!-- center table containt left middle and rigt sides -->
				 <table border="0" align="center" style="width: 950px; margin-left: 20px"  cellpadding="0" cellspacing="0">
					<tr>
						<!--left menu-->	
						<td width="200" valign="top">
														
								<div class="content"><center><h2>JADE PALACE</h2></center></div>
		
				  					 <div class="subbox">
										<ul>
											<li><a href="index.php">Home &raquo;</a></li>
											<li><a href="free.php"><u>Free Dishes &amp; Vouchers &raquo;</u></a></li>	
											<!--<li><a href="about-us.php">About Us &raquo;</a></li>-->
											<li><a href="contact-us.php">Contact Us &raquo;</a></li>
										</ul>									
									 </div>
								 			<div class="bottom_menu"><img src="graphics/buttons/button2.jpg"></div>						 									 
			
								<div class="content"><center><h2>MENU</h2></center></div>
									<div class="subbox">
									<ul><? dishes_menu_list();	?></ul>
									</div>
									<div class="bottom_menu"><img src="graphics/buttons/button2.jpg"></div>
						</td>