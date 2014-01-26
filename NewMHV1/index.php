

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Maple House Sign in</title>

    <!-- Bootstrap core CSS -->
    <!-- Bootstrap -->
    <link href="http://getbootstrap.com/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class = "container jumbotron" >
        <h1>Maple House</h1>  
    </div>
    <div class="container">

      <form class="form-signin">
        <h3 class="form-signin-heading">Please sign in</h3>
        <input type="text" class="form-control" placeholder="Email address" name = "user"required autofocus>
        <input type="password" class="form-control" placeholder="Password" name = "password"required>1
        <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="check(this.form)">Sign in</button>
      </form>
        
        

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
      
      <script language="javascript"> function check(form)/*function to check userid & password*/ { /*the
      following code checkes whether the entered userid and password are matching*/ if(form.user.value ==
      "admin" && form.password.value == "password") { window.open('homepage.php')/*opens the target page
      while Id & password matches*/ } else { alert("Error! Password or username Incorrect!")/*displays error
      message*/ } } </script> </body> </html>
