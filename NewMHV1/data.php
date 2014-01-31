<?php
include('includes/base.functions.php');
include('includes/base.header.php');
?>

<!DOCTYPE html>  
<html lang="en"> 
<head>  
	<meta charset="utf-8"> 
	<meta  http-equiv="X-UA-Compatible" content="IE=edge">
	<meta  name="viewport"  content="width=device-width,  initial-scale=1.0"> <meta  name="description"  content="">  	  <meta name="author" content=""> <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

 <title>Data</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">

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
	  <div class = "jumbotron" style = "float: left; width:100%;">
		  <div>
        	<h3>Search for Resident </h3>

		
			<!--Drop down thing -->

			<?php 
				generateDropDownBox($patients); 
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
				if ($resident->imgurl == null){$patient_img = "images/download.jpeg";}else{$patient_img = $resident->imgurl;}
				echo "<img src=\"".$patient_img."\" alt=\"".$resident->name."\" style=\"overflow:hidden; white-space:nowrap; text-overflow:ellipsis;\" class=\"img-rounded\" width=\"126\" height=\"144\">";
			?>
				
				<?php
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
		<div class = "jumbotron" style = "float: left;  height: 447px; width: 30%;">
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
		<div class = "jumbotron" style = "float: left;  height: 447px; width:35%;">
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
