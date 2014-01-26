

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

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2>New Resident </h2>
		<form role="form"  action="send_resident.php" method = "post">

		  <div class="form-group">
		    <label >First Name</label>
		    <input type="text" class="form-control" id="first" name = "first" placeholder="Enter first name">
			
	        <!-- <input type="hidden" name="" value=""> -->
			
		  </div>
		  <div class="form-group">
		    <label >Middle Name</label>
		    <input type="text" class="form-control" id="middle" name = "middle" placeholder="Enter middle name">
		  </div>
		  <div class="form-group">
		    <label >Last Name</label>
		    <input type="text" class="form-control" id="last" name = "last" placeholder="Enter last name">
		  </div>
		  
		  <div class="form-group">
		    <label >Birthday</label>
		    <input type="text" class="form-control" id="bday" name = "bday" placeholder="Enter Birthday YYYY-MM-DD">
		  </div>
		  
		  <div class="form-group">
		    <label >Home Phone</label>
		    <input type="text" class="form-control" id="home" name = "home" placeholder="Enter Home Phone">
		  </div>
		  <div class="form-group">
		    <label >Cell Phone</label>
		    <input type="text" class="form-control" id="cell" name = "cell" placeholder="Enter Cell Phone">
		  </div>
		  <div class="form-group">
		    <label >Address 1</label>
		    <input type="text" class="form-control" id="address1" name = "address1" placeholder="Enter Address">
		  </div>
		  <div class="form-group">
		    <label >Address 2</label>
		    <input type="text" class="form-control" id="address2" name = "address2" placeholder="Enter Address">
		  </div>
		  <div class="form-group">
		    <label >City</label>
		    <input type="text" class="form-control" id="city" name = "city" placeholder="Enter City">
		  </div>
		  <div class="form-group">
		    <label >State</label>
		    <input type="text" class="form-control" id="state" name = "state" placeholder="Enter State">
		  </div>
		  <div class="form-group">
		    <label >Zipcode</label>
		    <input type="text" class="form-control" id="zip" name = "zip" placeholder="Enter ZipCode">
		  </div>

        </div>
 

<!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2>Doctor Information </h2>
		
		

		  <div class="form-group">
		    <label >Doctor Name</label>
		    <input type="text" class="form-control" id="middle" name = "middle" placeholder="Enter Name">
		  </div>
		  <div class="form-group">
		    <label >Specialty</label>
		    <input type="text" class="form-control" id="last" name = "last" placeholder="Enter Specialty">
		  </div>
		  
		  <div class="form-group">
		    <label >Phone Number</label>
		    <input type="text" class="form-control" id="bday" name = "bday" placeholder="Enter Phone Number">
		  </div>
		
        </div>
 
<!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2>Emergency Contact Information </h2>
		

		  <div class="form-group">
		    <label >First Name</label>
		    <input type="text" class="form-control" id="first" name = "first" placeholder="Enter first name">
			
	        <!-- <input type="hidden" name="" value=""> -->
			
		  </div>
		  <div class="form-group">
		    <label >Middle Name</label>
		    <input type="text" class="form-control" id="middle" name = "middle" placeholder="Enter middle name">
		  </div>
		  <div class="form-group">
		    <label >Last Name</label>
		    <input type="text" class="form-control" id="last" name = "last" placeholder="Enter last name">
		  </div>

		  <div class="form-group">
		    <label >Phone Number</label>
		    <input type="text" class="form-control" id="home" name = "home" placeholder="Enter Phone Number">
		  </div>

		  <div class="form-group">
		    <label >Address 1</label>
		    <input type="text" class="form-control" id="address1" name = "address1" placeholder="Enter Address">
		  </div>
		  <div class="form-group">
		    <label >Address 2</label>
		    <input type="text" class="form-control" id="address2" name = "address2" placeholder="Enter Address">
		  </div>
		  <div class="form-group">
		    <label >City</label>
		    <input type="text" class="form-control" id="city" name = "city" placeholder="Enter City">
		  </div>
		  <div class="form-group">
		    <label >State</label>
		    <input type="text" class="form-control" id="state" name = "state" placeholder="Enter State">
		  </div>
		  <div class="form-group">
		    <label >Zipcode</label>
		    <input type="text" class="form-control" id="zip" name = "zip" placeholder="Enter ZipCode">
		  </div>

	        		  <button type="submit" class="btn btn-primary btn-lg" name = "submit">Submit</button>
		</form>
        </div>
        

 


 	
	

  </div> <!-- /container -->
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
  </body>
</html>