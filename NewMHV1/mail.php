



<?php
include('includes/base.functions.php');
?>
<!DOCTYPE html>  
<html lang="en"> 
<head>  
  <meta charset="utf-8"> 
  <meta  http-equiv="X-UA-Compatible" content="IE=edge">
  <meta  name="viewport"  content="width=device-width,  initial-scale=1.0"> <meta  name="description"  content="">      <meta name="author" content=""> <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

 <title>Thank You</title>
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
        
            <?php
            $email = $_POST['Email'];
            $title = $_POST['Title'];
            $description = $_POST['Description'];
            $main = $_POST['Main'];
            $data = $_POST['Data'];
            $medications = $_POST['Medications'];
            $medicationhistory = $_POST['MedicationHistory'];
            $prescriptions = $_POST['Prescriptions'];
            $hospitalization = $_POST['Hospitalization'];
            $other = $_POST['Other'];
            


            $formcontent=" From: $email 
            \n Description Title: $title 
            \n Description: $description

            \n Main Page: $main 
            \n Data Page: $data 
            \n Medications Page: $medications 
            \n Medication History Page: $medicationhistory 
            \n Prescriptions Page: $prescriptions 
            \n Hospitalization Page: $hospitalization 
            \n Other Page: $other 

            ";
            $recipient = "fswproject@freelists.org";
            $subject = "Feedback Form";
            $mailheader = "From: $email \r\n";
            mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
            echo "Thank You For Your Feedback!" . " -" . "<a href='homepage.php' style='text-decoration:none;color:#ff0099;'> Return Home</a>";
            ?>

      </div>

  </body>
</html>
