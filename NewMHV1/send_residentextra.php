<?php
// If allowed, unlimited script execution time
   set_time_limit(0);

	
	/*Predefined database 
	$dbhost = "127.0.0.1"; 
	$dbuser = "root";
	$dbpass = "password"; 
	$dbname = "residents";
	
	// 1. Create a database connection
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname); 
	
	// Test if connection occurred
	if (mysqli_connect_errno())
	{
		die("Database connection failed: ". mysqli_connect_error() . "(" . mysqli_connect_errno() . ")"); 
	}
	*/
	// Jaime link and connect to the database 
$connection=mysql_connect("localhost");

$sel= mysql_select_db("residents",$connection)// Checking connection
		or die("I diied!!");

	//$idV = 7; 
	$firstV = $_POST['first'];
	$middleV=$_POST['middle'];
	$lastV=$_POST['last'];
	$address1V=$_POST['address1'];
	$address2V=$_POST['address2'];
	$cityV=$_POST['city'];
	$stateV=$_POST['state'];
	$zipcodeV=$_POST['zip'];
	$homeV=$_POST['home'];
	$cellV=$_POST['cell'];
	$bdayV=$_POST['bday'];
	
	$query = "INSERT INTO resident (first_name, middle_name, last_name, address1, address2, city, state, zipcode, home_phone, cell_phone ,date_of_birth) VALUES ('$firstV', '$middleV', '$lastV', '$address1V', '$address2V', '$cityV', '$stateV', '$zipcodeV', '$homeV', '$cellV' , '$bdayV')"; 
	
	
if (!mysql_query($sql,$connection))
{
	 die('Error:' . mysql_error());
}
else
{
	echo"Resident Added. I like turtles!";
}


mysql_close($connection);


header('Location:homepage.php');
	 
	 
	/*$result = mysqli_query($connection, $query); 
	
	// Test if there is a query fail!
	if(!$result)
	{
		die("Database query failed.:)"); 
	}
// 5. Close database
mysqli_close($connection); 
*/ // this doesnt work dont use



?>
