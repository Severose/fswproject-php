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

 <title>Medication</title>

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
