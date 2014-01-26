<?php
// If allowed, unlimited script execution time
   set_time_limit(0);


  

/* Patient information struct */
class PatientStruct
{
	public $id; // patient id
	public $firstName; //first name
	public $lastName; // last name
}


$patients = array(); // array of patient structs


// Resident info 
class ResidentInfo
{
	public $name; 
	public $dob; 
	public $homenumber; 
	public $cellnumber; 
	public $address1; 
	public $address2; 
}

$resident = new ResidentInfo(); // create one resident info struct

// Doctor info
class DoctorInfo
{
	public $doc_id; 
	public $specialty; 
	public $name; 
	public $number; 
}

$doctor = new DoctorInfo(); // create one doctor info struct

// Physical Info
class physicalInfo 
{
	public $lastPhysical; 
}

$Physical = new physicalInfo(); // create one physical instance


//Emergency Contact
class EmergencyContactInfo
{
	public $name; 
	public $number; 
	public $address1; 
	public $address2; 
}

$Emergency = new EmergencyContactInfo();  // create one emergency contact info

class AllergyInfo
{
	public $allergy; 
	public $allergydiagnosis; 
}

$allergies = array(); // create an array of allergies

class medication
{
	public $name; 
	public $generic; 
	public $prescribed; 
	public $expire; 
	public $dose;
	public $freq;
	public $purpose; 
	public $note;  
}

$m = array(); // array of assessments


/* Generate a page based on the selected patient */

    
   $selectedOption = $_GET['patient']; 
   if($selectedOption != '') 
   {
   	itemSelected($selectedOption);
   }//End if
   else
		{
		}


function getDropDownBoxData()
{

    /*Predefined database 
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
		die("Database query failed. :)"); 
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
	mysql_close($connection);  
	*/
// Jaime link and connect to the database 
	$connection11=mysql_connect("localhost");

	$sel= mysql_select_db("residents",$connection11)// Checking connection
		or die("I diied!!");

	$result22 = mysql_query("SELECT * FROM resident");

	if(!$result22){echo mysql_error();}

	while ($row = mysql_fetch_array($result22))
	{
		$p =  new PatientStruct();
		$p->id = $row{'resident_id'};
		$p->firstName = $row{'first_name'};
		$p->lastName = $row{'last_name'};
		// Push the populated node into the array
		array_push($GLOBALS["patients"], $p);		
	}
	mysql_close($connection11);

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





/* Function which generates the webpage; called when a patient is selected from the dropdown box
 * @param selectedOption - current patient ID */
function itemSelected($selectedOption)
{

    /*Predefined database 
    $dbhost = ":/Applications/MAMP/tmp/mysql/mysql.sock"; 
    $dbuser = "root";
    $dbpass = "root"; 
    $dbname = "residents";

    // 1. Create a database connection
    $connection = mysql_connect($dbhost, $dbuser, $dbpass) or die ("Unable to connect to MySQL"); 

    // select a database to work with
    $selected = mysql_select_db($dbname, $connection); 
    */
    // Jaime link and connect to the database 
	$connection=mysql_connect("localhost");

	$sel= mysql_select_db("residents",$connection)// Checking connection
		or die("I diied!!");

	// Query from database
	$queryx = "SELECT * FROM resident WHERE resident_id =" .$selectedOption; 
	$result = mysql_query($queryx);
	
	// Test if there is a query fail!
	if(!$result)
	{
		die("Database query failed.n:)"); 
	}

	$row = mysql_fetch_array($result);
	
	global $resident; // reference
	global $doctor; // reference
	global $Emergency; // reference
	
	//Resident Info
	$resident->name = $row{'first_name'} . " " . $row{'middle_name'} . " " . $row{'last_name'};
	$resident->dob = $row{'date_of_birth'};
	$resident->homenumber = $row{'home_phone'};
	$resident->cellnumber = $row{'cell_phone'};
	$resident->address1 = $row{'address1'} . " " . $row{'address2'};
	$resident->address2 = $row{'city'} . ', ' . $row{'state'} . " ". $row{'zip_code'};


	// Doctor info 
	$queryy = "SELECT * FROM resident_to_doctor WHERE resident_id =" .$selectedOption;
	$result2 = mysql_query($queryy);
	
	if(!$result2)
	{
		die("Database query failed."); 
	}
	
	
	$row2 = mysql_fetch_array($result2);

	$doctor->doc_id = $row2{'doctor_id'}; 
	//$d_id = $doctor->doc_id; 

	$queryw = "SELECT * FROM doctor WHERE doctor_id =" .$doctor->doc_id; 
	$result2_5 = mysql_query( $queryw );
	
	if(!$result2_5)
	{
		 
		die("Database query failed."); 
	}
	
	$row2_5 = mysql_fetch_array($result2_5);
	
	$doctor->specialty = $row2_5{'specialization'};
	$doctor->name = $row2_5{'first_name'}.' '.$row2_5{'last_name'} ;
	$doctor->number = $row2_5{'phone_number'}; 


	//Physical Info
	$query2 = "SELECT * FROM physical WHERE resident_id = " . $selectedOption; 
	$result3 = mysql_query($query2);
	
	if(!$result3)
	{
		die("Database query failed."); 
	}
	$row3 = mysql_fetch_array($result3);
	
	
	global $Physical; // reference
	$Physical->lastPhysical = $row3{'physical_date'}; 


	//Lesson learned: I cant replace the same variable result 's.
	$query1 = "SELECT * FROM emergency_contact WHERE resident_id = " . $selectedOption;  
	$result4 = mysql_query( $query1);
	
	
	if(!$result4)
	{
		die("Database query failed."); 
	}
	
	$row4 = mysql_fetch_array($result4);


	$Emergency->name = $row4{'first_name'} . " " . $row4{'middle_name'} . " " . $row4{'last_name'};
	//echo " <marquee> $emergencyname </marquee>" ;
	$Emergency->number = $row4{'phone_number'};
	$Emergency->address1 = $row4{'address1'};
	$Emergency->address2 = $row4{'address2'}. ', ' . $row4{'city'}.' '.$row4{'zip_code'};


	// Allergy information
	$queryu = "SELECT * FROM allergic_medication WHERE resident_id = ". $selectedOption; 
	$result6 = mysql_query($queryu);
	
	if(!$result6)
	{
		die("Database query failed."); 
	}

	while ($row6 = mysql_fetch_array($result6))
	{
		$a = new AllergyInfo(); 
		// querying the database to pull the allergy information
		$a->allergy = $row6{'medication_name'};
		$a->allergydiagnosis = $row6{'allergic_diagnosis'};
		
		array_push($GLOBALS["allergies"], $a); 	
	}
	
	global $m; // reference
	
	$queryxx = "SELECT * FROM medication WHERE resident_id =" . $selectedOption; 
	$result7 = mysql_query($queryxx );
	if (!$result7) 
	{
		die ("Database query failed");
	}
	while ($row7 = mysql_fetch_array($result7))
	{
		$instance = new medication(); 
		$instance->name = $row7{'medication_name'};
		$instance->generic = $row7{'generic_name'};
		$instance->prescribed =$row7{'med_prescribed'};
		$instance->expire = $row7{'med_expire'};
		$instance->dose =$row7{'med_dose(mg)'};
		$instance->freq = $row7{'med_freq'};
		$instance->purpose = $row7{'med_purpose'};
		$instance->note = $row7{'note'};
		
		array_push($GLOBALS['m'], $instance); 
		
		//End patient assessment table row
	}
	 
	// 4. Release returned data
	//mysqli_free_result($result); 


	// 5. Close database
	mysql_close($connection);
	
}


/* Get each patient's data from the database */
getDropDownBoxData();



	




?>

<!DOCTYPE html>  
<html lang="en"> 
<head>  
	<meta charset="utf-8"> 
	<meta  http-equiv="X-UA-Compatible" content="IE=edge">
	<meta  name="viewport"  content="width=device-width,  initial-scale=1.0"> <meta  name="description"  content="">  	  <meta name="author" content=""> <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

 <title>Medication</title>

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
      <div class="navbar navbar-default container" role="navigation">
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
			  <?php
			  
		  	echo "				<li><a href=\"data.php?patient=$selectedOption\"><span>Data</span></a></li>";
		  	echo "				<li class=\"current\"><a><span>Medication</span></a></li>";
		  	echo "				<li><a href=\"prescriptions.php?patient=$selectedOption\"><span>Prescriptions</span></a></li>";
		  	echo "				<li><a href=\"hospitalization.php?patient=$selectedOption\"><span>Hospitalization</span></a></li>";
		  	echo "				<li><a href=\"medicationhistory.php?patient=$selectedOption\"><span>Medication History</span></a></li>";
		  	echo "				<li><a href=\"index.html\"><span>SignOut</span></a></li>";
			?>
			  	
			  
          </ul>
        </div>
      </div>
	 <div class = "container">
		 <div>
      <!-- Main component for a primary marketing message or call to action -->
	  <div class="jumbotron" style ="height: 200px;  " >
		  <div>
        	<h3>Search for Resident </h3>
		
			<!--Drop down thing -->

			<?php 
				generateDropDownBox(); 
			?>	
			</div>
	</div>
</div>
</div>


<div class = "container">
<div>
		<div class = "jumbotron" style = "float: left; width:35%;">
			
			<div>
				
				<?php
				// patient info
				echo "					<h2 class =\"text-info emphasis" . " style=\"font-size:24px; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;\"><strong>".$resident->name."</strong></h2>";
				echo "					<h4 style=\"color:black\"><strong> Date of Birth:</strong> ".$resident->dob."</h4>";
				echo "					<h4 style=\"overflow:hidden; white-space:nowrap; text-overflow:ellipsis;\"><strong>Home Phone:</strong> $resident->homenumber</h4>";
				echo "					<h4 style=\"overflow:hidden; white-space:nowrap; text-overflow:ellipsis;\" ><strong>Cell Phone:</strong> $resident->cellnumber</h4>";

				echo "					<h4 style=\"overflow:hidden; white-space:nowrap; text-overflow:ellipsis;\" >$resident->address1</h4>";
				echo "					<h4 style=\"overflow:hidden; white-space:nowrap; text-overflow:ellipsis;\" >$resident->address2</h4>";
				?>
			
			</div>
			
		</div>


	</div>
		
	<div>
		<div class = "jumbotron" style = "float: left;  height: 300px; width: 30%;">
			<div>
				<?php
				//doctor info
				echo "					<h3 class =\"text-info emphasis" . "style=\" color:Green;\">Doctor</h3>";
				echo "					<h4 style=\" color:black; overflow:hidden; white-space:nowrap; text-overflow:ellipsis; margin-top:-2px; margin-bottom:-2px;\" >".$doctor->specialty."</h4>";
				echo "					<h4 style=\" overflow:hidden; white-space:nowrap; text-overflow:ellipsis;\" >Dr.  $doctor->name</h4>";
				echo "					<h4 style=\"overflow:hidden; white-space:nowrap; text-overflow:ellipsis;\" >$doctor->number</h4>";
				echo "					<h4 style=\"overflow:hidden; white-space:nowrap; text-overflow:ellipsis;\" >$doctor->address1</h4>";
				echo "					<h4 style=\"overflow:hidden; white-space:nowrap; text-overflow:ellipsis;\" >$doctor->address2</h4>";
				echo "					<h3 class =\"text-info \">Last Physical</h3>";
				echo "					<h4>$Physical->lastPhysical</h4>";
				?>
			</div>
		</div>
	</div>


	<div>
		<div class = "jumbotron" style = "float: left;  height: 300px; width:35%;">
			<div>
				<?php
				//emergency
				echo "					<h3 class =\"text-info emphasis" . "style=\"color:Green;\">Emergency Contact</h3>";
				echo "					<h4 style=\" overflow:hidden; white-space:nowrap; text-overflow:ellipsis;\" contenteditable><strong>$Emergency->name</strong></h4>";
				echo "					<h4 style=\"overflow:hidden; white-space:nowrap; text-overflow:ellipsis;\" contenteditable>$Emergency->number</h4>";
				echo "					<h4 style=\"overflow:hidden; white-space:nowrap; text-overflow:ellipsis;\" contenteditable>$Emergency->address1</h4>";
				echo "					<h4 style=\"overflow:hidden; white-space:nowrap; text-overflow:ellipsis;\" contenteditable>$Emergency->address2</h4></center>";

				?>
			</div>
		</div>
	</div>

</div>
		

<div class = "container">
<div class = "jumbotron">
	<h3 class = "">Allergic Medication</h3>
	<div style = "overflow-y:scroll;">
		<table class = "table table-hover">
			<th style = "width:2%;"> </th>
			<th style="text-align: center width: 35%;  ">Medication Name</th>
			<th style = "text-align: center width: 65%; ">Medical Diagnosis</th>
			<?php
			
			foreach ($GLOBALS['allergies'] as &$entity)
			{
				echo "				<tr>";
						echo "					<td><input type=\"checkbox\" name=\"chk\"/></td>";
						echo "					<td>$entity->allergy</td>";
						echo "					<td>$entity->allergydiagnosis</td>";
						echo "				</tr>";//End allergy data table row		
					
			}
			?>
			
		</table>
		<div>
			<center><input class = "btn btn-primary"  style = "margin-right: 30px; "type="button" value="Add Allergy" onclick="">
			<input class = "btn btn-primary" style = "margin-left: 30px; " type="button" value="Delete Allergy" onclick=""></center>
		</div>
	</div>
</div>
</div>


<div class = "container">
	<div class = "jumbotron">
		<h3>Medications</h3>
		<div style = "overflow-y: scroll;">
			<table class = "table table-hover">
				<th style = "width: 2%;"> </th>
				<th style = "width: 15%;">Medication</th>
				<th style = "width: 15%;">Generic</th>
				<th style = "width: 15%;">Prescribed</th>
				<th style = "width: 15%;">Expires</th>
				<th style = "width: 10%;">Dosage</th>
				<th style = "width: 10%;">Frequency</th>
				<th style = "width: 10%;">Purpose</th>
				<th style = "width: 10%">Note</th>
				
				<?php 	
				foreach ($GLOBALS['m'] as &$i)
				{
							echo "				<tr>";
							echo "					<td><input type=\"checkbox\" name=\"chk\"/></td>";
							echo "					<td>$i->name</td>";
							echo "					<td>$i->generic</td>";
							echo "					<td>$i->prescribed</td>";
							echo "					<td>$i->expire</td>";
							echo "					<td>$i->dose</td>";
							echo "					<td>$i->freq</td>";
							echo "					<td>$i->purpose</td>";
							echo "					<td>$i->note</td>";
							echo "				</tr>";
			
						}
						?>
			</table>
			</div>
			<div>
				<center><input class = "btn btn-primary"  style = "margin-right: 30px; "type="button" value="Add Assessment" onclick="">
				<input class = "btn btn-primary" style = "margin-left: 30px; " type="button" value="Delete Assessment" onclick=""></center>
			</div>
	</div>
</div>


	  </body>
	  

	  </html>
