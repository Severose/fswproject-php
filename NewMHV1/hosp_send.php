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
$riV = mysql_real_escape_string(stripslashes($_POST['rid']));
$D1V = mysql_real_escape_string(stripslashes($_POST['date']));
$D2V = mysql_real_escape_string(stripslashes($_POST['loc']));
$D3V = mysql_real_escape_string(stripslashes($_POST['dur']));
$D4V = mysql_real_escape_string(stripslashes($_POST['reas']));
$D5V = mysql_real_escape_string(stripslashes($_POST['med']));
$D6V = mysql_real_escape_string(stripslashes($_POST['dis']));
$D7V = mysql_real_escape_string(stripslashes($_POST['not']));


$sql="INSERT INTO hospitalization (hospitalization_id, resident_id,hospitalization_date, hospitalization_location, duration_of_stay,reason,medication_changes,diagnosis,notes) VALUES('','$riV','$D1V','$D2V','$D3V','$D4V','$D5V','$D6V','$D7V')";

if (!mysql_query($sql,$connection))
 {
 die('Error: ' . mysql_error());
 }
 echo "1 record added";
header('Location: homepage.php');
//header('Location: miscellaneous.php');
//mysql_close($connection);

?>
