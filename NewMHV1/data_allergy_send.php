<?php
/*
//Predefined database 
$dbhost = ":/Applications/MAMP/tmp/mysql/mysql.sock"; 
$dbuser = "root";
$dbpass = "root"; 
$dbname = "residents";

// 1. Create a database connection
$connection = mysql_connect($dbhost, $dbuser, $dbpass) or die ("Unable to connect to MySQL"); 

// select a database to work with
$selected = mysql_select_db($dbname, $connection); 
*/
/* Open the patient database */
$connection=mysql_connect("localhost");
mysql_select_db("residents",$connection)// Checking connection
	or die("I diied!!");

$nameV = mysql_real_escape_string(stripslashes($_POST['name']));
$diagV = mysql_real_escape_string(stripslashes($_POST['diag']));
$riV = mysql_real_escape_string(stripslashes($_POST['ri']));

$sql="INSERT INTO allergy (resident_id, allergy_title,allergy_description) VALUES('$riV','$nameV','$diagV')";

if (!mysql_query($sql))
 {
 die('Error: ' . mysql_error());
 }


mysql_close($connection);
//header('Location: data.php'); 
header('Location: homepage.php'); 
?>
