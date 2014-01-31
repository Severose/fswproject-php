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

	<div class="jumbotron">	
		<h3>Search for Resident</h3> 
		<!--Drop down thing -->
		<div>
            <?php
			generateDropDownBox($patients);
			?>
		</div>
	</div>

    <div class="jumbotron">
		<h3>Add Resident</h3>
    		<a href="insert.php" class="btn btn-primary btn-md box active" role="button">Insert</a>
		</div>
	</div>
  </div> <!-- /container -->	
  </body>
</html>
