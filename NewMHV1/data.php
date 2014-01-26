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


class DietInfo
{
	public $diet; 
	public $description; 
}

$diets = array(); // create an array of allergies

class assessment
{
	public $date; 
	public $time; 
	public $weight; 
	public $bp; 
	public $note; 
}

$a = array(); // array of assessments


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

 /*   //Predefined database 
    $dbhost = ":/Applications/MAMP/tmp/mysql/mysql.sock"; 
    $dbuser = "root";
    $dbpass = "root"; 
    $dbname = "residents";

    // 1. Create a database connection
    $connection = mysql_connect($dbhost, $dbuser, $dbpass) or die ("Unable to connect to MySQL"); 

    // select a database to work with
    $selected = mysql_select_db($dbname, $connection); 
    
    

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

       /*     //Predefined database 
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


	$result = mysql_query("SELECT * FROM resident WHERE resident_id = $selectedOption");
	if(!$result){echo mysql_error();}
	$row = mysql_fetch_array($result);
	// Test if there is a query fail!
	if(!$result)
	{
		die("Database query failed0."); 
	}

	//$row = mysql_fetch_array($result);
	
	global $resident; // reference
	global $doctor; // reference
	global $Emergency; // reference
	
	//Resident Info
	$resident->name = $row{'first_name'}." ".$row{'middle_name'}." " .$row{'last_name'};
	$resident->dob = $row{'date_of_birth'};
	$resident->homenumber = $row{'home_phone'};
	$resident->cellnumber = $row{'cell_phone'};
	$resident->address1 = $row{'address1'} . " " . $row{'address2'};
	$resident->address2 = $row{'city'} . ', ' . $row{'state'} ." ". $row{'zip_code'};


	$result2 = mysql_query("SELECT * FROM resident_to_doctor WHERE resident_id = $selectedOption");
	if(!$result2){echo mysql_error();}
	$row2 = mysql_fetch_array($result2);
	// Test if there is a query fail!
	if(!$result2)
	{
		die("Database query failed1."); 
	}
	
	$doctor->doc_id = $row2{'doctor_id'}; 
	//$d_id = $doctor->doc_id; 



	$result2_5 = mysql_query("SELECT * FROM doctor WHERE doctor_id = $doctor->doc_id");
	if(!$result2_5){echo mysql_error();}
	$row2_5 = mysql_fetch_array($result2_5);
	if(!$result2_5)
	{
		 
		die("Database query failed2."); 
	}
	
	//$row2_5 = mysql_fetch_array($result2_5);
	
	$doctor->specialty = $row2_5{'specialization'};
	$doctor->name = $row2_5{'first_name'}.' '.$row2_5{'last_name'} ;
	$doctor->number = $row2_5{'phone_number'}; 



	$result3 = mysql_query("SELECT * FROM physical WHERE resident_id =  $selectedOption");
	if(!$result3){echo mysql_error();}
	$row3 = mysql_fetch_array($result3);
	if(!$result3)
	{
		die("Database query failed3."); 
	}
	//$row3 = mysql_fetch_array($result3);
	global $Physical; // reference
	$Physical->lastPhysical = $row3{'physical_date'}; 



	$result4 = mysql_query("SELECT * FROM emergency_contact WHERE resident_id = $selectedOption");
	if(!$result4){echo mysql_error();}
	$row4 = mysql_fetch_array($result4);	
	if(!$result4)
	{
		die("Database query failed4."); 
	}
	
	//$row4 = mysql_fetch_array($result4);


	$Emergency->name = $row4{'first_name'} . " " . $row4{'middle_name'} . " " . $row4{'last_name'};
	//echo " <marquee> $emergencyname </marquee>" ;
	$Emergency->number = $row4{'phone_number'};
	$Emergency->address1 = $row4{'address1'};
	$Emergency->address2 = $row4{'address2'}. ', ' . $row4{'city'}.' '.$row4{'zip_code'};




	$result6 = mysql_query("SELECT * FROM allergy WHERE resident_id = $selectedOption");
	if(!$result6){echo mysql_error();}
	//$row6 = mysql_fetch_array($result6);	
	if(!$result6)
	{
		die("Database query failed6."); 
	}

	while ($row6 = mysql_fetch_array($result6))
	{
		$a = new AllergyInfo(); 
		// querying the database to pull the allergy information
		$a->allergy = $row6{'allergy_title'};
		$a->allergydiagnosis = $row6{'allergy_description'};
		
		array_push($GLOBALS["allergies"], $a); 	
	}
	
	global $a; // reference
	global $diets; // reference
	
	$result12 = mysql_query("SELECT * FROM diet WHERE resident_id = $selectedOption");
	if(!$result12){echo mysql_error();}	
	//$row12 = mysql_fetch_array($result12);			
	if (!$result12)
	{
		diet ("Database query failed12."); 
	}
	
	while ($row12 = mysql_fetch_array($result12))
	{
		$d = new DietInfo();
		$d->diet = $row12{'diet_title'};
		$d->description = $row12{'diet_description'}; 
		array_push($GLOBALS['diets'], $d); 
		// end diet table
	}	




	$result7 = mysql_query("SELECT * FROM assessment WHERE resident_id = $selectedOption");
	if(!$result7){echo mysql_error();}
	//$row7 = mysql_fetch_array($result7);			
	if (!$result7) 
	{
		die ("Database query failed7");
	}
	while ($row7 = mysql_fetch_array($result7))
	{
		$instance = new assessment();  
		$instance->date = $row7{'assessment_date'};
		$instance->weight = $row7{'weight'};
		$instance->bp = $row7{'blood_pressure'};
		$instance->note = $row7{'assess_notes'}; 
		
		array_push($GLOBALS['a'], $instance); 
		
		//End patient assessment table row
	}



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

 <title>Data</title>

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
			  
		  	echo "				<li class=\"current\"><a><span>Data</span></a></li>";
		  	echo "				<li><a href=\"medication.php?patient=$selectedOption\"><span>Medication</span></a></li>";
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
		
<?php

// Delete button form for allergys
echo"<div class = \"container\">";
echo"<div class = \"jumbotron\">";
echo"	<h3 class = \"\">Allergies</h3>";
echo"	<div style = \"overflow-y:scroll;\">";

echo" <td><form action=\"\" method=\"POST\" >";
echo" <table class = \"table table-hover\"> ";
echo"<th><input class = \"btn btn-primary\" name=\"delete\" type=\"submit\" id=\"delete\" value=\"Delete\"></th>";

echo"			<th style= \"text-align: center width: 25%;  \">Allergy</th> ";
echo"			<th style = \"text-align: center width: 55%; \">Medical Diagnosis</th>";



/*//Predefined database 
$dbhost = ":/Applications/MAMP/tmp/mysql/mysql.sock"; 
$dbuser = "root";
$dbpass = "root"; 
$dbname = "residents";

// 1. Create a database connection
$connection60 = mysql_connect($dbhost, $dbuser, $dbpass) or die ("Unable to connect to MySQL"); 

// select a database to work with
$selected = mysql_select_db($dbname, $connection61); 
*/
$connection60 = mysql_connect("localhost");
$sel= mysql_select_db("residents",$connection60)// Checking connection
		or die("I diied!!");
$result60 = mysql_query("SELECT * FROM allergy WHERE resident_id = $selectedOption");
$count60 = mysql_num_rows($result60);

if(!$result60){echo mysql_error();}

while ($row60 = mysql_fetch_array($result60))
{	
		$rId = $row60{'resident_id'};
		$aId = $row60{'allergy_id'};
		$entity1 = $row60{'allergy_title'};
		$entity2 = $row60{'allergy_description'};

	echo "				<tr>";

	echo "<td style=\"width:15%;\"><INPUT name=\"checkbox[]\" type=\"checkbox\" id=\"checkbox[]\" value=\"$aId\" /></td>";
				echo "					<td style=\"width:25%;\">$entity1</td>";
				echo "					<td style=\"width:60%;\">$entity2</td>";
				echo "				</tr>";//End allergy data table row		


}	


if(array_key_exists('delete',$_POST))
{
 for($i=0;$i<$count60;$i++)
 {
  //$di = $checkbox[$i];doesnt work
  $di=$_POST['checkbox'][$i];
 // $sql = "DELETE FROM allergy WHERE resident_id='$di'";
  $sql= "DELETE FROM allergy WHERE resident_id= '$rId' AND allergy_id = '$di' ";
  $result9 = mysql_query($sql);
 }
 // if successful redirect to delete_multiple.php 
 if($result9)
 {
 	echo "<meta http-equiv=\"refresh\" content=\"0;URL=data_copy.php\">";
 }

}
mysql_close($connection60);
echo" </table> ";	
echo "   </form>";

?>
			

<?php  // Insert button form for allergy	
		echo"	<h3 class = \"text-primary\"> Add Allergy</h3>";
   echo "<form class =\"form-inline\" action=\"data_allergy_send.php\" method=\"POST\"> ";
   echo " <tr>";
   echo " <td><INPUT type=\"text\" class=\"form-control\"  name=\"name\" style=\"width:30%; margin: 7px; \" autocomplete=\"on\" placeholder=\"Allergy\" required/></td>";
   echo " <td><INPUT type=\"text\" name=\"diag\" class=\"form-control\"  style=\"width:50%; margin: 7px; margin-right: 15px;  \" autocomplete=\"on\" placeholder=\"Medical Diagnosis\" required/></td>";
   echo " <input type=\"hidden\" name=\"ri\" value=\"$selectedOption\" />";
echo"<tr>";	
   echo "  <INPUT type=\"submit\"  class = \"btn  btn-primary\" value=\"Insert\" />"; //
	
echo "   </form>";

echo"	</div>";
echo"	</div>";
echo"	</div>";
?>



<?php

// Delete button form for diet
echo"<div class = \"container\">";
echo"<div class = \"jumbotron\">";
echo"	<h3 class = \"\">Diet</h3>";
echo"	<div style = \"overflow-y:scroll;\">";

echo" <td><form action=\"\" method=\"POST\" >";
echo" <table class = \"table table-hover\"> ";
echo"<th><input name=\"delete\"  class = \"btn  btn-primary\" type=\"submit\" id=\"delete\" value=\"Delete\"></th>";
echo"			<th style= \"text-align: center width: 35%;  \">Diet</th> ";
echo"			<th style = \"text-align: center width: 65%; \">Description</th>";

/*
//Predefined database 
$dbhost = ":/Applications/MAMP/tmp/mysql/mysql.sock"; 
$dbuser = "root";
$dbpass = "root"; 
$dbname = "residents";

// 1. Create a database connection
$connection61 = mysql_connect($dbhost, $dbuser, $dbpass) or die ("Unable to connect to MySQL"); 

// select a database to work with
$selected = mysql_select_db($dbname, $connection61); 
*/
$connection61 = mysql_connect("localhost");
$sel= mysql_select_db("residents",$connection61)// Checking connection
		or die("I diied!!");
$result61 = mysql_query("SELECT * FROM diet WHERE resident_id = $selectedOption");
$count61 = mysql_num_rows($result61);

if(!$result61){echo mysql_error();}
while ($row61 = mysql_fetch_array($result61))
{	
		$rId2 = $row61{'resident_id'};
		$dId = $row61{'diet_id'};
		$entity3 = $row61{'diet_title'};
		$entity4 = $row61{'diet_description'};

	echo "				<tr>";
	echo "<td style=\"width:20%;\"><INPUT name=\"checkbox[]\" type=\"checkbox\" id=\"checkbox[]\" value=\"$dId\" /></td>";
				echo "					<td>$entity3</td>";
				echo "					<td>$entity4</td>";
				echo "				</tr>";//End allergy data table row		
}

if(array_key_exists('delete',$_POST))
{
 for($i=0;$i<$count61;$i++)
 {
  $di2=$_POST['checkbox'][$i];
  $sql2= "DELETE FROM diet WHERE resident_id= '$rId2' AND diet_id = '$di2' ";
  $result10 = mysql_query($sql2);
 }
 // if successful redirect to delete_multiple.php 
 if($result10)
 {
 	echo "<meta http-equiv=\"refresh\" content=\"0;URL=homepage.php\">";
 }
}	
mysql_close($connection61);
echo" </table> ";	
echo "   </form>";
?>
	
<?php  // Diet Insert button form	
	echo"	<h3 class = \"text-primary\"> Add Diet</h3>";
   echo "<form  class =\"form-inline\" action=\"data_diet_send.php\" method=\"POST\"> ";
   echo " <tr>";
   echo " <td><INPUT type=\"text\" name=\"Diet\" style=\"width:20%; margin: 7px; \" class=\"form-control\" autocomplete=\"on\" placeholder=\"Diet\" required/></td>";
   echo " <td><INPUT type=\"text\" name=\"Descr\" style=\"width:50%; margin: 7px; margin-right: 15px;  \" class=\"form-control\" autocomplete=\"on\" placeholder=\"Description\" required/></td>";
   echo " <input type=\"hidden\" name=\"rid\" value=\"$selectedOption\" />";
echo"<tr>";	
   echo "  <INPUT type=\"submit\" class = \"btn  btn-primary\" value=\"Insert\" />"; //
	
echo "   </form>";

echo"	</div>";
echo"	</div>";
echo"	</div>";
?>





<div class = "container">
	<div class = "jumbotron">
		<h3>Assessment</h3>
		<div style = "overflow-y: scroll;">
			<table class = "table table-hover">
				<th style = "width: 2%;"> </th>
				<th style = "width: 25%;">Date</th>
				<th style = "width: 10%;">Weight</th>
				<th style = "width: 20%;">Blood Pressure</th>
				<th style = "width: 43%;">Note</th>
				
				<?php 	
				foreach ($GLOBALS['a'] as &$i)
				{
							echo "				<tr>";
							echo "					<td><input type=\"checkbox\" name=\"chk\"/></td>";
							echo "					<td>$i->date</td>";
							echo "					<td>$i->weight</td>";
							echo "					<td>$i->bp</td>";
							echo "					<td>$i->note</td>";
							echo "				</tr>";
			
						}
						?>
			</table>
			</div>
	
            
            <?php  // Assessment Insert button form	
            	echo"	<h3 class = \"text-primary\"> Add Assessment</h3>";
               echo "<form  class =\"form-inline\" action=\"data_assessment_send.php\" method=\"POST\"> ";
               echo " <tr>";
               echo " <td><INPUT type=\"text\" name=\"w\" style=\"width:10%; margin: 7px; \" class=\"form-control\" autocomplete=\"on\" placeholder=\"Weight\" required/></td>";
               echo " <td><INPUT type=\"text\" name=\"bp\" style=\"width:15%; margin: 7px; margin-right: 15px;  \" class=\"form-control\" autocomplete=\"on\" placeholder=\"Blood Pressure\" required/></td>";
                echo " <td><INPUT type=\"text\" name=\"note\" style=\"width:60%; margin: 7px; margin-right: 15px;  \" class=\"form-control\" autocomplete=\"on\" placeholder=\"Note\" required/></td>";
               echo " <input type=\"hidden\" name=\"rid\" value=\"$selectedOption\" />";
            echo"<tr>";	
               echo "  <INPUT type=\"submit\" class = \"btn  btn-primary\" value=\"Insert\" />"; //
	
            echo "   </form>";

            echo"	</div>";
            ?>
	</div>
</div>


	  </body>
	  

	  </html>
