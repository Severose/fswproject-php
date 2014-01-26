<?php
    // If allowed, unlimited script execution time
   set_time_limit(0);

/* Patient information struct */
class PatientStruct
{
	public $id;            // patient id
	public $firstName;     // first name
	public $lastName;      // last name
}

$patients = array(); // array of patient structs

function getDropDownBoxData()
{/*
    //Predefined database 
    $dbhost = ":/Applications/MAMP/tmp/mysql/mysql.sock"; 
    $dbuser = "root";
    $dbpass = "root"; 
    $dbname = "residents";

    // 1. Create a database connection
    $connection = mysql_connect($dbhost, $dbuser, $dbpass) or die ("Unable to connect to MySQL"); 

    // select a database to work with
    $selected = mysql_select_db($dbname, $connection); 

	// Perform database query
	$query = "SELECT * FROM resident"; 
	$result = mysql_query($query); 
	
	// Test if there is a query fail!
	if(!$result)
	{
		die("Database query failed."); 
	}
	
	// Use returned data (populate patients array)
	while ($row = mysql_fetch_array($result))
	{
		//echo "i am in"; 
		// populate patient struct
		$p = new PatientStruct(); // create one instance of a patient struct
		
		$p->id = $row{'resident_id'}; 
		 
		$p->firstName = $row{'first_name'}; 
		
		$p->lastName = $row{'last_name'}; 
		//push istance into the array of patients
		array_push($GLOBALS["patients"], $p); 
	}
    
	// 4. Release returned data
	mysql_free_result($result); 

	// 5. Close database
	mysql_close($connection);*/ 
	// Jaime link and connect to the database 
	$connection=mysql_connect("localhost");

	$sel= mysql_select_db("residents",$connection)// Checking connection
		or die("I diied!!");

	$result = mysql_query("SELECT * FROM resident");

	if(!$result){echo mysql_error();}

	while ($row = mysql_fetch_array($result))
	{
		$p =  new PatientStruct();
		$p->id = $row{'resident_id'};
		$p->firstName = $row{'first_name'};
		$p->lastName = $row{'last_name'};
		// Push the populated node into the array
		array_push($GLOBALS["patients"], $p);		
	}
	mysql_close($connection);
}

//Generate the patient dropdown box
function generateDropDownBox()
{
		echo '<FORM method="GET" action="data.php" >';
		echo '<select name="patient" class = "btn btn-primary btn-lg box " ONCHANGE="this.form.submit();">';
	
		echo "<option value = 0></option>";

		/* Place each patient in the dropdown box */
		foreach ($GLOBALS["patients"] as &$person) 
		{
			echo "<option value = ".$person->id.">".$person->lastName.", ".$person->firstName." ".$person->id."</option>";
		}//End foreach
	
		echo "</select>";
		echo '</FORM>';		
}

?>

<!DOCTYPE html>  
<html lang="en"> 
<head>  
	<meta charset="utf-8"> 
	<meta  http-equiv="X-UA-Compatible" content="IE=edge">
	<meta  name="viewport"  content="width=device-width,  initial-scale=1.0"> <meta  name="description"  content="">  	  <meta name="author" content=""> <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

 <title>HomePage</title>

    <!-- Bootstrap core CSS -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">
	 <link href="homepage.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <h1 class="sr-only">Home Page</h1>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h class="navbar-brand text-success"><a href = "homepage.php">Maple House</a></h>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="#">Data</a></li>
            <li><a href="#">Medications</a></li>
            <li><a href="#">Prescriptions</a></li>
              <li><a href="#">Hospitalizations</a></li>
              <li><a href="#">Medication History</a></li>
              <li><a  href = "index.html">Sign out</a></li>
          </ul>
        </div>
      </div>

	<div class="jumbotron">	
		<h3>Search for Resident</h3> 
		<!--Drop down thing -->
		<div>
            <?php
			getDropDownBoxData();
			generateDropDownBox();
			?>
		</div>
	</div>

    <div class="jumbotron">
		<h3>Add Resident</h3>
    		<a href="insert.php" class="btn btn-primary btn-md box active" role="button">Insert</a>
		</div>
	</div>
  </div> <!-- /container -->	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
  </body>
</html>
