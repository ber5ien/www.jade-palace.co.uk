<?

include('top_page.php');
include('middle.php');
if ($_GET['check']==1)
{
  $email=$_POST['email'];
  include('config.php');
  $mysqli = new mysqli($address, $dbuser,$dbpassword,$dbname);
  $result= $mysqli->query("select * from users where email='$email'");
  $data = $result->fetch_object();
  if($email == $data->email && !empty($email))
  {
    $message="Hi,
      
     This is to confirm that you have tried to recover your password on chineselanternpenzance.co.uk website. If you haven't done it please contact us by email so we can investigate it.

     Your password is: ".$data->password."

     Best Regards
     Chinese Lantern Website Team";
    $result=mail($email,'Chinese Lantern Password Recovery', $message);
    if($result)
    {
      echo ('Your password has now been sent.');
    }else{
      echo ('Your password has not been sent.');
    }
      
  }else{
    echo ("This email has not been found. Please enter correct email.");
  }
}else{
?>
<p>Please enter your email in order to recover your password.</p>
<p>Once checked your password will be sent to the email provided.</p>
<form action='recovery.php?check=1' method='post'>
  <input type="text" name="email">
  <input type="submit" name="Submit" value="Submit">
  </form>
<?
}
include('footer.php');
?>
