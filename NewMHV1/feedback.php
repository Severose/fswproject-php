<?php
include('includes/base.functions.php');
?>
<!DOCTYPE html>  
<html lang="en"> 
<head>  
  <meta charset="utf-8"> 
  <meta  http-equiv="X-UA-Compatible" content="IE=edge">
  <meta  name="viewport"  content="width=device-width,  initial-scale=1.0"> <meta  name="description"  content="">      <meta name="author" content=""> <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

 <title>Feedback Form</title>
    <link href="./css/bootstrap.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link href="navbar.css" rel="stylesheet">
   <link href="homepage.css" rel="stylesheet">
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
              <li><a href="feedback.php">Feedback Form</a></li>
              <li><a  href = "index.html">Sign out</a></li>
          </ul>
        </div>
      </div>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
      <h2>Feedback Form </h2>

      <h3>Specify Page(s)</h3>
      <form name="form1" action="mail.php" method="POST">
        <div style = "float: left; width:30%;">
              <div class="form-group">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="Main" name="Main"> Main
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="Data" name="Data"> Data
                  </label>
                </div>
              </div>
          </div>
          <div style = "float: left; width:30%;">
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="Medications" name="Medications"> Medications
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="Medication History" name="Medication History"> Medication History
                </label>
              </div>
            </div>
          </div>
          <div style = "float: left; width:30%;">
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="Prescriptions" name="Prescriptions"> Prescriptions
                </label>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="Hospitalization" name="Hospitalization"> Hospitalization
                </label>
              </div>
            </div>
          </div>
          <div style = "float: left; width:10%;">
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="Other" name="Other" > Other
                </label>
              </div>
            </div>
          </div>
      <div class="form-group">
        <label >Description Title</label>
        <input type="text" class="form-control" id="Title" name = "Title" placeholder="Enter Description Title">
      </div>
      <div class="form-group">
        <label >Description</label>
        <textarea class="field span12" id="Description" name="Description" rows="6" cols="110" placeholder="Enter a Description"></textarea>
      </div>
      <div class="form-group">
        <label >Your Contact Email</label>
        <input type="text" class="form-control" id="Email" name = "Email" placeholder="Enter Your Email">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
       </form>
        </div>

 
   

  </body>
</html>
