<?
include('top_page.php');
include('middle.php');
?>

<center><h1>LOGOUT</h1></center>
<font color=white size=4>
<?
$_SESSION = array();
$flag=session_destroy(); 
if ( isset($flag) )
{
echo "You have been logged out. Thank you for your visit!<br><br> Please check our website offen we may suprise you one day.";

}
?>
</font>

<?
include('footer.php');
?>