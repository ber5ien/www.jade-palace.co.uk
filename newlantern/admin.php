<?
include('top_page.php');
include('middle.php');
include('admin_functions.php');
include('config.php');

if (isset($_SESSION['rights']) & $_SESSION['rights'] > 0)
{
if( isset($_GET['cat']))
 {
	admin_menu($_GET['cat']);
  }else{
  	admin_menu('home');
 }
}else{
echo ("<h1>YOU HAVE NO ACCESS TO THIS PAGE!!!</h1>");
}
include('footer.php');
?>

?>