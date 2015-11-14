<?
include_once ("class.emailer.php");

function admin_menu ($i) {
switch ($i) {

    case "home":
					echo ("<center><h1 style='text-align: center;'>ACCOUNTS STATISTICS</h1></center>");
					home_summary();        
        break;     
   case "vouchers":
				vouchers_update();
		    	break;
		    		
	case "delivery":
				delivery_update();
		break;
		
	case "dishes":
				dishes_update();
		break;		    		    	
	case "voucher_list":
				voucher_list();
		break;		    		    	
	}
};

function voucher_list()
{
echo lol;
}

function vouchers_update()
{
	if( isset($_GET['action']) && $_GET['action']=='add')
	{
	include('config.php');
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
	$result = $mysqli->query("INSERT INTO `vouchers` (`id_discount`, `offer`, `description`, `status`, `scale`, `valid`, `restrict`) VALUES (NULL, '', '', '', '', '', '')");
	if( $mysqli->affected_rows > 0 )
	{
		echo "<h1>NEW VOUCHERS HAS BEEN ADDED PRESS AMEND BUTTON TO FILL IT OUT.</h1>";
	}
	}

	if( isset($_GET['action']) && $_GET['action']=='del')
	{
	include('config.php');
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
	$result = $mysqli->query("DELETE from vouchers WHERE id_discount=".$_POST['id_delete']."");
	if ($mysqli->affected_rows > 0)
	{
 		echo "<h1>Vouchers has been removed</h1>";
	}else{
		echo "<h1>This voucher doesn't exist</h1>";
	}
	
	} 	

	if( isset($_GET['action']) && $_GET['action']=='update' )
	{
	include('config.php');
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
	$str=$_POST['offer'];
	$offer=htmlentities($str, ENT_QUOTES,'UTF-8');
		 
	$result = $mysqli->query("UPDATE vouchers SET 	
	`offer` = \"{$offer}\",
	`description` =\"{$_POST['desc']}\",
	`valid` =\"{$_POST['valid']}\",
	`status` =\"{$_POST['status']}\",
	`restrict` =\"{$_POST['rest']}\"
	WHERE id_discount=\"{$_GET['id']}\" ; 
	");
	echo $mysqli->query;
		
		//valid = \"{$_POST['valid']}\",  
	//restrict = \"{$_POST['restrict']}\"
	}

	include('config.php');
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
	$result = $mysqli->query("select * from vouchers ORDER BY id_discount");

	echo ("<div id='admin'>");
	echo ("<table id='admin>'");
	echo ("<tr><td>ID</td><td>Offer</td><td>Description</td><td>Valid *</td><td>Status<td>Restrict</td><td>Action</td></tr>");
	while( $data=$result->fetch_object() )
	{
			
		if(isset($_GET['action']) && $_GET['action']=='amend' && $_GET['id'] == $data->id_discount)
		{
			echo("<form action=admin.php?cat=vouchers&action=update&id=".$data->id_discount." method=post>");	
			echo('<tr>');
			echo ('<td>'.$data->id_discount.'</td>');
			echo ("<td><textarea id=admin name=offer rows=2 cols=16>{$data->offer}</textarea></td>");
			echo ("<td><textarea id=admin name=desc rows=2 cols=16>{$data->description}</textarea></td>");
			echo ("<td><input name=valid size=7 type='text' id='date' value='".$data->valid."'></td>");
			if($data->status =="active")
			{
			echo ("<td><select name=status><option selected>active</option><option>inactive</option></select></td>");
			}else{
			echo ("<td><select name=status><option>active</option><option selected>inactive</option></select></td>");
			}
			
			echo ("<td><textarea id=admin name=rest>{$data->restrict}</textarea></td>");
			echo ("<td><input type=submit value=OK></td>");
			echo "</form>";		
		
		}else{	
			echo('<tr>');
			echo ('<td>'.$data->id_discount.'</td>');
			echo ('<td>'.$data->offer.'</td>');
			echo ('<td>'.$data->description.'</td>');
			echo ('<td>'.$data->valid.'</td>');
			echo ('<td>'.$data->status.'</td>');
			echo ('<td>'.$data->restrict.'</td>');
			echo ("<td><form action=admin.php?cat=vouchers&action=amend&id=".$data->id_discount." method=post>		
			<input type=submit value=E>
			</form>			
			</td>");
		};
			echo('</tr>');
			
	};

	echo ("</table>");
	echo ("</div>");
	echo ("<br>");
	
echo "<h5>*DATE FORMAT MUST BE IN FORMAT YYYY-MM-DD</h5>";
	
echo("Press 'E-Edit' Button in order to change then press 'OK' to confirm you changes.");
echo("Only Vouchers with Valid date and Status Set Up as Active will be displaed for customers.");
echo "<br><br>
			<form action=admin.php?cat=vouchers&action=del method=post>
			Type ID from table and press DELETE to remove voucher 
			ID: <input name=id_delete type=text size=10>
			<input type=submit value=DELETE>
			</form>			
";

echo "<br>
			<form action=admin.php?cat=vouchers&action=add method=post> 
			<input type=submit value='CLICK HERE TO ADD NEW VOUCHER'>
			</form>			
";


}

function home_summary() 
{
	include('config.php');
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
	$result = $mysqli->query("SELECT * FROM `users");
	$count=$result->num_rows;
	echo "<center><h1>All accounts: ".$count."</h1>";
}

function delivery_update()
{
	if( isset($_GET['action']) && $_GET['action']=='add')
	{
		include('config.php');
		$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
		$result = $mysqli->query("INSERT INTO `delivery` (`id_delivery`, `name`, `price`, `takeaway`) VALUES (NULL,'','','')");
		if( $mysqli->affected_rows > 0 )
		{
			echo "<h1>NEW Delivery HAS BEEN ADDED PRESS Edit BUTTON TO FILL IT OUT.</h1>";
		}
	}

	if( isset($_GET['action']) && $_GET['action']=='del')
	{
		include('config.php');
		$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
		$result = $mysqli->query("DELETE from delivery WHERE id_delivery=".$_POST['id_delete']."");
		if ($mysqli->affected_rows > 0)
		{
 			echo "<h1>Delivery has been removed</h1>";
		}else{
			echo "<h1>This delivery doesn't exist</h1>";
		}
	} 	

	if( isset($_GET['action']) && $_GET['action']=='update' )
	{
		include('config.php');
		$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
		 
		$result = $mysqli->query("UPDATE delivery SET 	
		`name` = \"{$_POST['name']}\",
		`price` =\"{$_POST['price']}\",
		`takeaway` =\"{$_POST['takeaway']}\"
		WHERE id_delivery=\"{$_GET['id']}\" ; 
		");
		echo $mysqli->query;
	}

	include('config.php');
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
	$result = $mysqli->query("select * from delivery ORDER BY id_delivery");

	echo ("<div id='admin'>");
	echo ("<table id='admin>'");
	echo ("<tr><td>ID</td><td>Name</td><td>Price</td><td>Takeaway</td></tr>");
	while( $data=$result->fetch_object() )
	{
		if(isset($_GET['action']) && $_GET['action']=='amend' && $_GET['id'] == $data->id_delivery)
		{
			echo("<form action=admin.php?cat=delivery&action=update&id=".$data->id_delivery." method=post>");	
			echo('<tr>');
			echo ('<td>'.$data->id_delivery.'</td>');
			echo ("<td><textarea id=admin name=name rows=2 cols=16>{$data->name}</textarea></td>");
			echo ("<td><textarea id=admin name=price rows=2 cols=16>{$data->price}</textarea></td>");
			echo ("<td><select name=takeaway><option>penzance</option></select></td>");
						
			echo ("<td><input type=submit value=OK></td>");
			echo "</form>";		
		
		}else{	
			echo('<tr>');
			echo ('<td>'.$data->id_delivery.'</td>');
			echo ('<td>'.$data->name.'</td>');
			echo ('<td>'.$data->price.'</td>');
			echo ('<td>'.$data->takeaway.'</td>');
			echo ("<td><form action=admin.php?cat=delivery&action=amend&id=".$data->id_delivery." method=post>		
			<input type=submit value=E>
			</form>			
			</td>");
		};
			echo('</tr>');
			
	};

	echo ("</table>");
	echo ("</div>");
	echo ("<br>");
	
echo("Press 'E-Edit' Button in order to change then press 'OK' to confirm changes.");
echo "<br><br>
			<form action=admin.php?cat=delivery&action=del method=post>
			Type ID from table and press DELETE to remove delivery 
			ID: <input name=id_delete type=text size=10>
			<input type=submit value=DELETE>
			</form>			
";

echo "<br>
			<form action=admin.php?cat=delivery&action=add method=post> 
			<input type=submit value='CLICK HERE TO ADD NEW Delivery'>
			</form>			
";
}

function dishes_update()
{
	if( isset($_GET['action']) && $_GET['action']=='add')
	{
		include('config.php');
		$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
		$result = $mysqli->query("INSERT INTO `dishes` (`id_dish`, `sort_number`, `name`, `price`, `id_menu`) VALUES (NULL,'','','','')");
		if( $mysqli->affected_rows > 0 )
		{
			echo "<h1>New DISH has been creaed pres EDIT button to fill it out.</h1>";
		}
	}

	if( isset($_GET['action']) && $_GET['action']=='del')
	{
		include('config.php');
		$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
		$result = $mysqli->query("DELETE from dishes WHERE id_dish=".$_POST['id_delete']."");
		if ($mysqli->affected_rows > 0)
		{
 			echo "<h1>Dish has been removed</h1>";
		}else{
			echo "<h1>This dish doesn't exist</h1>";
		}
	} 	

	if( isset($_GET['action']) && $_GET['action']=='update' )
	{
		include('config.php');
		$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
		 
		$result = $mysqli->query("UPDATE dishes SET 	
		`sort_number` = \"{$_POST['sort_number']}\",
		`name` =\"{$_POST['name']}\",
		`id_menu` =\"{$_POST['id_menu']}\",
		`price` =\"{$_POST['price']}\"
		WHERE id_dish=\"{$_GET['id']}\" ; 
		");
		echo $mysqli->query;
	}

	include('config.php');
	$mysqli = new mysqli($address,$dbuser,$dbpassword,$dbname);
	$result = $mysqli->query("select * from dishes ORDER BY id_dish");

	echo ("<div id='admin'>");
	echo ("<table id='admin>'");
	echo ("<tr><td>ID</td><td>Sort</td><td>Name</td><td>Price</td><td>ID_MENU</td></tr>");
	while( $data=$result->fetch_object() )
	{
		if(isset($_GET['action']) && $_GET['action']=='amend' && $_GET['id'] == $data->id_dish)
		{
			echo("<form action=admin.php?cat=dishes&action=update&id=".$data->id_dish." method=post>");	
			echo('<tr>');
			echo ('<td>'.$data->id_dish.'</td>');
			echo ("<td><textarea id=admin name=sort_number rows=2 cols=16>{$data->sort_number}</textarea></td>");
			echo ("<td><textarea id=admin name=name rows=2 cols=16>{$data->name}</textarea></td>");
			echo ("<td><textarea id=admin name=price rows=2 cols=16>{$data->price}</textarea></td>");
			echo ("<td><textarea id=admin name=id_menu rows=2 cols=16>{$data->id_menu}</textarea></td>");		
			
			echo ("<td><input type=submit value=OK></input></td>");
			echo "</form>";		
		
		}else{	
			echo('<tr>');
			echo ('<td>'.$data->id_dish.'</td>');
			echo ('<td>'.$data->sort_number.'</td>');
			echo ('<td>'.$data->name.'</td>');
			echo ('<td>'.$data->price.'</td>');
			echo ('<td>'.$data->id_menu.'</td>');
			echo ("<td><form action=admin.php?cat=dishes&action=amend&id=".$data->id_dish." method=post>		
			<input type=submit value=E>
			</form>			
			</td>");
		};
			echo('</tr>');
			
	};

	echo ("</table>");
	echo ("</div>");
	echo ("<br>");
	
echo("Press 'E-Edit' Button in order to change then press 'OK' to confirm changes.\n\n");
echo("ID_MENU is a number of category displayed on the left hand side: eg. \n \r STARTERS - 1,\n \r Chicken Dishes - 2 \n \n");

echo "<br><br>
			<form action=admin.php?cat=dishes&action=del method=post>
			Type ID from table and press DELETE to remove delivery 
			ID: <input name=id_delete type=text size=10>
			<input type=submit value=DELETE>
			</form>			
";

echo "<br>
			<form action=admin.php?cat=dishes&action=add method=post> 
			<input type=submit value='CLICK HERE TO ADD NEW DISH'>
			</form>			
";
}

?>