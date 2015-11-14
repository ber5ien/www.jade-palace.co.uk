<?
//class.account.php

class Account {

private $email;
private $password;
private $name;
private $surname;
private $number;
public $checkemailflag=0;

function __construct(){
}

	public function setEmail($email){
		$this->email = $email;
	}

	public function setPassword($password){
		$this->password = $password;
	}
	
	public function setName($name){
		$this->name=$name;
	}
	
	public function setSurname($surname){
		$this->surname = $surname;
	}
	
	public function  setNumber($number){
		$this->number = $number;
	}
	
	public function showVariable(){
		echo $this->email;
		echo $this->password;
		echo $this->name;
		echo $this->surname;
		echo $this->number;
	}
	public function checkemail($email){
		include('config.php');
		$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
		$result = $mysqli->query("select * from users where email='$email'");
		
		if ($mysqli->affected_rows > 0)
		{
			$this->checkemailflag=1;
			echo '<br><p>This email: <b>'.$email.'</b> already exist.</p><br>';	
		}
		//echo $this->checkemailflag;
	}	
		
	public function addAccount($checkemailflag,$email,$password1,$name,$surname,$number,$region){
		if($checkemailflag==0)
		{	
			include('config.php');
			//echo $region;
			$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
			$result = $mysqli->query("INSERT INTO users(email,password,name,surname,number,region) VALUES('$email','$password1','$name','$surname','$number','$region')");
			 		 
			if($mysqli->affected_rows > 0 )
			{
				echo "<p>You account has now been created and you are ready to login.</p>";
				$message = "
				Welcome on Chinese Lantern Website. You are now able to get exclusive offers and discounts throught our website.
				These are the details you have provided to us:
				Your email: ".$email."
				Your password: ".$password1."
				Your Name: ".$name."
				Your Surname: ".$surname."
				Your Phone Number: ".$number."
				Your Shop: ".$region."
				
				Enjoy!
				";
				$result=mail($email,'Chinese Lantern account confirmation.',$message);
				if($result)
				{
				echo "<br><p>We have sent an email to your email account with your detail.</p>";
				}else{
				echo "<br><p> Due error we haven't sent email to you.</p>";
				}	
			}	 
		
		}else{
			echo "<p>Your account has not been created</p>";
		}
	}
	

}
?>
