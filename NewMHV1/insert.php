<?php
include('includes/base.functions.php');
?>
<!DOCTYPE html>  
<html lang="en"> 
<head>  
	<meta charset="utf-8"> 
	<meta  http-equiv="X-UA-Compatible" content="IE=edge">
	<meta  name="viewport"  content="width=device-width,  initial-scale=1.0"> <meta  name="description"  content="">  	  <meta name="author" content=""> <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

 <title>HomePage</title>

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

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2>Insert Resident </h2>

<?php
if(isset($_POST['edit'])){
	//get patient data based on edit number
	$selectedOption = $_POST['edit']; 
	if($selectedOption != '') {
		itemSelected($selectedOption,$resident,$doctor,$Emergency,$allergies,$diets,$Physical,$a,$m,$pre,$h);
		//split the name again
		$split_name = explode(" ",$resident->name);
		$first_name = $split_name[0];
		if(count($split_name)>2){
			$middle_name = $split_name[1];
			$last_name = $split_name[2];
		}else{
			$middle_name = "";
			$last_name = $split_name[1];
		};
		//split address1
		//$result['address1'] . " " . $result['address2'];
		$split_addr1 = explode(" ",$resident->address1);
		$address_street_number = $split_addr1[0];
		$address_street_name = $split_addr1[1];
		$address_street_type = $split_addr1[2];
		if(count($split_addr1)>3){
			$address_type = $split_addr1[3];
			$address_type_number = $split_addr1[4];
		}else{
			$address_type = "";
			$address_type_number = "";
		};
		//split the second address line again
		//$result['city'] . ', ' . $result['state'] ." ". $result['zip_code']
		$split_addr2 = explode(" ",$resident->address2);
		$city = substr($split_addr2[0],0,(strlen($split_addr2[0])-1));
		$state = $split_addr2[1];
		$zip_code = $split_addr2[2];
		//split Dr. name
		$split_dr_name = explode(" ",$doctor->name);
		$dr_first_name = $split_dr_name[0];
		if(count($split_dr_name)>2){
			$dr_middle_name = $split_dr_name[1];
			$dr_last_name = $split_dr_name[2];
		}else{
			$dr_middle_name = "";
			$dr_last_name = $split_dr_name[1];
		};
		//split emergency name
		$split_emergency_name = explode(" ",$Emergency->name);
		$emergency_first_name = $split_emergency_name[0];
		if(count($split_emergency_name)>2){
			$emergency_middle_name = $split_emergency_name[1];
			$emergency_last_name = $split_emergency_name[2];
		}else{
			$emergency_middle_name = "";
			$emergency_last_name = $split_emergency_name[1];
		};
		//split emergency address
		$split_emergency_addr2 = explode(" ",$Emergency->address2);
		$emergency_addr2 = $split_emergency_addr[0];
		$emergency_city = $split_emergency_addr2[1];
		//$emergency_state = $split_emergency_addr2[2];
		$emergency_zip_code = $split_emergency_addr2[2];
		echo "<form role='form' action='includes/send.data.php' method = 'post' enctype='multipart/form-data'>";
	}else{
		echo "<form role='form' action='send_resident.php' method = 'post' enctype='multipart/form-data'>";
	};
};
?>

		  <div class="form-group">
		    <label >First Name</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='first' name = 'first' value='". $first_name ."'>";
				}else{
					echo"<input type='text' class='form-control' id='first' name = 'first' placeholder='Enter first name'>";
				};
			?>
		  </div>
		  <div class="form-group">
		    <label >Middle Name</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='middle' name = 'middle' value='". $middle_name ."'>";
				}else{
					echo"<input type='text' class='form-control' id='middle' name = 'middle' placeholder='Enter middle name'>";
				};
			?>
		  </div>
		  <div class="form-group">
		    <label >Last Name</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='last' name = 'last' value='". $last_name ."'>";
				}else{
					echo"<input type='text' class='form-control' id='last' name = 'last' placeholder='Enter last name'>";
				};
			?>
		  </div>
		  <div class="form-group">
		    <label >Home Phone</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='home' name = 'home' value='" . $resident->homenumber . "'>";
				}else{
					echo"<input type='text' class='form-control' id='home' name = 'home' placeholder='Enter Home Phone'>";
				};
			?>
		  </div>
		  <div class="form-group">
		    <label >Cell Phone</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='cell' name = 'cell' value='".$resident->cellnumber."'>";
				}else{
					echo"<input type='text' class='form-control' id='cell' name = 'cell' placeholder='Enter Cell Phone'>";
				};
			?>
		  </div>
		  <div class="form-group">
		    <label >Address 1</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='address1' name = 'address1' value='" . $address_street_number . " " . $address_street_name . " " . $address_street_type . "'>";
				}else{
					echo"<input type='text' class='form-control' id='address1' name = 'address1' placeholder='Enter Address'>";
				};
			?>
		  </div>
		  <div class="form-group">
		    <label >Address 2</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='address2' name = 'address2' value='" . $address_type ." " . $address_type_number . "'>";
				}else{
					echo"<input type='text' class='form-control' id='address2' name = 'address2' placeholder='Enter Address'>";
				};
			?>
		  </div>
		  <div class="form-group">
		    <label >City</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='city' name = 'city' value='".$city."'>";
				}else{
					echo"<input type='text' class='form-control' id='city' name = 'city' placeholder='Enter City'>";
				};
			?>
		  </div>
		  <div class="form-group">
		    <label >State</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='state' name = 'state' value='".$state."'>";
				}else{
					echo"<input type='text' class='form-control' id='state' name = 'state' placeholder='Enter State'>";
				};
			?>
		  </div>
		  <div class="form-group">
		    <label >Zipcode</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='zip' name = 'zip' value='".$zip_code."'>";
				}else{
					echo"<input type='text' class='form-control' id='zip' name = 'zip' placeholder='Enter ZipCode'>";
				};
			?>
		  </div>
		  <div class="form-group">
		    <label >DB</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='db' name = 'db' value='".$resident->dob."'>";
				}else{
					echo"<input type='text' class='form-control' id='db' name = 'db' placeholder='Enter birth'>";
				};
			?>
		  </div>
		  <div class="form-group">
		  	<label >Photo</label>
			<input type="file" class="form-control" id="imgurl" name="imgurl" size="400">
		  </div>
        </div>
	
 
<!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2>Doctor Information </h2>
		  <div class="form-group">
		    <label >Doctor First Name</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='dname' name = 'dname' value='" . $dr_first_name . "'>";
				}else{
					echo"<input type='text' class='form-control' id='dname' name = 'dname' placeholder='Enter Name'>";
				};
			?>
		  </div>
		<div class="form-group">
		    <label >Doctor Last Name</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='dlast' name = 'dlast' value='" . $dr_last_name . "'>";
				}else{
					echo"<input type='text' class='form-control' id='dlast' name = 'dlast' placeholder='Enter Name'>";
				};
			?>
		  </div>
		  <div class="form-group">
		    <label >Specialty</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='ds' name = 'ds' value='" . $doctor->specialty . "'>";
				}else{
					echo"<input type='text' class='form-control' id='ds' name = 'ds' placeholder='Enter Specialty'>";
				};
			?>
		  </div>
		  
		  <div class="form-group">
		    <label >Phone Number</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='dph' name = 'dph' value='" . $doctor->number . "'>";
				}else{
					echo"<input type='text' class='form-control' id='dph' name = 'dph' placeholder='Enter Phone Number'>";
				};
			?>
		  </div>
	  </div>

<!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2>Emergency Contact Information </h2>
		

		  <div class="form-group">
		    <label >First Name</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='cfirst' name = 'cfirst' value='" . $emergency_first_name . "'>";
				}else{
					echo"<input type='text' class='form-control' id='cfirst' name = 'cfirst' placeholder='Enter first name'>";
				};
			?>		
		  </div>
		  <div class="form-group">
		    <label >Middle Name</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='cmiddle' name = 'cmiddle' value='" . $emergency_middle_name . "'>";
				}else{
					echo"<input type='text' class='form-control' id='cmiddle' name = 'cmiddle' placeholder='Enter middle name'>";
				};
			?>
		  </div>
		  <div class="form-group">
		    <label >Last Name</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='clast' name = 'clast' value='" . $emergency_last_name . "'>";
				}else{
					echo"<input type='text' class='form-control' id='clast' name = 'clast' placeholder='Enter last name'>";
				};
			?>
		  </div>

		  <div class="form-group">
		    <label >Phone Number</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='chome' name = 'chome' value='" . $Emergency->number . "'>";
				}else{
					echo"<input type='text' class='form-control' id='chome' name = 'chome' placeholder='Enter Phone Number'>";
				};
			?>
		  </div>

		  <div class="form-group">
		    <label >Address 1</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='caddress1' name = 'caddress1' value='" . $Emergency->address1 . "'>";
				}else{
					echo"<input type='text' class='form-control' id='caddress1' name = 'caddress1' placeholder='Enter Address'>";
				};
			?>
		  </div>
		  <div class="form-group">
		    <label >Address 2</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='caddress2' name = 'caddress2' value='" . $emergency_addr2 . "'>";
				}else{
					echo"<input type='text' class='form-control' id='caddress2' name = 'caddress2' placeholder='Enter Address'>";
				};
			?>
		  </div>
		  <div class="form-group">
		    <label >City</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='ccity' name = 'ccity' value='" . $emergency_city . "'>";
				}else{
					echo"<input type='text' class='form-control' id='ccity' name = 'ccity' placeholder='Enter City'>";
				};
			?>
		  </div>
		  <div class="form-group">
		    <label >Zipcode</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='czip' name = 'czip' value='" . $emergency_zip_code . "'>";
				}else{
					echo"<input type='text' class='form-control' id='czip' name = 'czip' placeholder='Enter ZipCode'>";
				};
			?>
		  </div>
		  <div class="form-group">
		    <label >Relation</label>
			<?php
				if($selectedOption != ''){
					echo"<input type='text' class='form-control' id='crelation' name = 'crelation' value='" . $Emergency->relationship . "'>";
				}else{
					echo"<input type='text' class='form-control' id='crelation' name = 'crelation' placeholder='Enter Relationship'>";
				};
			?>
		  </div>
<?php
		if($selectedOption != '') {
			echo "<input type='hidden' id='resident_id' name='resident_id' value='" . $selectedOption . "'>";
			echo "<input type='hidden' id='doctor_id' name='doctor_id' value='" . $doctor->doc_id . "'>";
			echo "<input type='hidden' id='update_resident' name='update_resident' value='1'>";
			echo "<button type='submit' class='btn btn-primary btn-lg' name = 'submit'>Update</button>";
		}else{
			echo "<button type='submit' class='btn btn-primary btn-lg' name = 'submit'>Submit</button>";
		};
?>
		</form>
        <div>

  </div> <!-- /container -->
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  </body>
</html>
