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
$connection=mysql_connect("localhost");
mysql_select_db("residents",$connection)// Checking connection
	or die("I diied!!");

$DiV = mysql_real_escape_string(stripslashes($_POST['Diet']));
$DeV = mysql_real_escape_string(stripslashes($_POST['Descr']));
$riV = mysql_real_escape_string(stripslashes($_POST['rid']));

$sql="INSERT INTO diet (resident_id, diet_title, diet_description) VALUES('$riV','$DiV','$DeV')";

if (!mysql_query($sql,$connection))
 {
 die('Error: ' . mysql_error());
 }
 echo "1 record added";
header('Location: homepage.php');
//header('Location: miscellaneous.php');
//mysql_close($connection);

?>
