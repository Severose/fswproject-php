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

//$today = getdate();// this doesnt work but I found this:)
$today = date("Y-m-d");


$wV = mysql_real_escape_string(stripslashes($_POST['w']));
$dwV = doubleval($wV); 
$bpV = mysql_real_escape_string(stripslashes($_POST['bp']));
$noteV = mysql_real_escape_string(stripslashes($_POST['note']));
$riV = mysql_real_escape_string(stripslashes($_POST['rid']));

//$sql="INSERT INTO assessment (assessment_id, resident_id, weight,assessment_date ,blood_pressure, assess_notes) VALUES(NULL,'$riV','$dwV','$today','$bpV', '$noteV')";

$sql="INSERT INTO assessment ( resident_id, weight,assessment_date ,blood_pressure, assess_notes) VALUES('$riV','$dwV','$today','$bpV', '$noteV')";


if (!mysql_query($sql))
 {
 die('Error: ' . mysql_error());
 }


mysql_close($connection);
//header('Location: data_copy.php?patient=$riV');// shoudlnt it be data.php 
header('Location: homepage.php'); 

?>
