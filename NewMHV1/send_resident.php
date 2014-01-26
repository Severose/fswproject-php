<?php
// If allowed, unlimited script execution time
  // set_time_limit(0);

	// Jaime link and connect to the database 
$connection=mysql_connect("localhost");

$sel= mysql_select_db("residents",$connection)// Checking connection
		or die("I diied!!");

$firstV = mysql_real_escape_string(stripslashes($_POST['first']));
$middleV = mysql_real_escape_string(stripslashes($_POST['middle']));
$lastV = mysql_real_escape_string(stripslashes($_POST['last']));
$homeV = mysql_real_escape_string(stripslashes($_POST['home']));
$cellV = mysql_real_escape_string(stripslashes($_POST['cell']));
$address1V = mysql_real_escape_string(stripslashes($_POST['address1']));
$address2V = mysql_real_escape_string(stripslashes($_POST['adddress2']));
$cityV = mysql_real_escape_string(stripslashes($_POST['city']));
$stateV = mysql_real_escape_string(stripslashes($_POST['state']));
$zipV = mysql_real_escape_string(stripslashes($_POST['zip']));
$dbV = mysql_real_escape_string(stripslashes($_POST['db']));

$sql="INSERT INTO resident ( resident_id, first_name, middle_name, last_name, address1, address2, city, state, zip_code, 	home_phone, cell_phone,date_of_birth )
 VALUES
 ('','$firstV','$middleV','$lastV','$address1V','$address2V', '$cityV' ,'$stateV', '$zipV','$homeV','$cellV','$dbV')";

if (!mysql_query($sql,$connection))
{
	 die('Error:' . mysql_error());
}



//making a resident_to_doctor
$rV = mysql_query("SELECT * FROM resident ORDER BY resident_id DESC LIMIT 0 , 1");
if(!$rV){echo mysql_error();}
$row = mysql_fetch_array($rV);
// Test if there is a query fail!
	
$resID = $row{'resident_id'}; 

$sql1="INSERT INTO resident_to_doctor ( resident_id,doctor_id) VALUES ('$resID','')";

if (!mysql_query($sql1,$connection))
{
	 die('Error:' . mysql_error());
}


//inserting into doctor
$docV = mysql_query("SELECT * FROM resident_to_doctor ORDER BY doctor_id DESC LIMIT 0 , 1");
if(!$docV){echo mysql_error();}
$row2 = mysql_fetch_array($docV);
// Test if there is a query fail!
	
$docID = $row2{'doctor_id'}; 

$dnV = mysql_real_escape_string(stripslashes($_POST['dname']));
$dlV = mysql_real_escape_string(stripslashes($_POST['dlast']));
$dsV = mysql_real_escape_string(stripslashes($_POST['ds']));
$dphV = mysql_real_escape_string(stripslashes($_POST['dph']));

$sql2="INSERT INTO doctor ( doctor_id,  first_name, last_name, specialization, phone_number )
 VALUES ('$docID','$dnV','$dlV','$dsV','$dphV')";

if (!mysql_query($sql2,$connection))
{
	 die('Error:' . mysql_error());
}


/*
*/
//inserting into the homies
$contfirstV = mysql_real_escape_string(stripslashes($_POST['cfirst']));
$contmiddleV = mysql_real_escape_string(stripslashes($_POST['cmiddle']));
$contlastV = mysql_real_escape_string(stripslashes($_POST['clast']));
$conthomeV = mysql_real_escape_string(stripslashes($_POST['chome']));
$contaddress1V = mysql_real_escape_string(stripslashes($_POST['caddress1']));
$contaddress2V = mysql_real_escape_string(stripslashes($_POST['cadddress2']));
$contcityV = mysql_real_escape_string(stripslashes($_POST['ccity']));
$contzipV = mysql_real_escape_string(stripslashes($_POST['czip']));
$contrelV = mysql_real_escape_string(stripslashes($_POST['crelation']));
$sql3="INSERT INTO emergency_contact ( resident_id, first_name, middle_name, last_name,phone_number,address1, address2, city, zip_code,relationship)
VALUES
('$resID','$contfirstV','$contmiddleV','$contlastV','$conthomeV','$contaddress1V','$contaddress2V', '$contcityV' , '$contzipV','$contrelV')";

if (!mysql_query($sql3,$connection))
{
	 die('Error:' . mysql_error());
}


echo"Resident Added. I like turtles!";
mysql_close($connection);
header('Location:homepage.php');

?>
