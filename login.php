<?php
  session_start();
 ?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
  <title> Log in </title>
  <link rel="stylesheet" type="text/css" href="HELPFit.css">
  <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
  <script type = "text/javascript" src="HELPfit.js"></script>
</head>
<body id="signupbody">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<div class="row">
  <nav id="navbar" class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand"><img id="logo" src="fitnessLogo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">
        <li><a href="signup.html"> Sign Up </a></li>
    </ul>
  </div>
</div>
  </nav>
<br><br>

  <div class="col-xs-offset-1 col-xs-10 col-sm-offset-4 col-sm-6">
    <div id="signup" class="col-xs-12  col-sm-9" style="text-align:center">
        <h2 id="pagetitle"><b> Log In</b></h2>
        <br>
        <form name="loginform" action="server.php" method="post">
          <div class="row">
          <div class="form-group">
                <input type="text" name="username" class="form-control input-lg" id="inputUsername"
                 placeholder="Username" required>
            </div>
          </div>
            <div class="row">
            <div class="form-group">
                  <input type="password" name="password" class="form-control input-lg" id="inputPassword"
                  placeholder="Password" required>
              </div>
            </div>
            <?php echo $_SESSION["error"]; ?>
            <button id="signupbutton" name="login" type="submit" class="btn-lg btn-block"> Log In to HELPFit</button>
        </form>
        <br>
        <div style="text-align:center">
        <p id="grey"><b> Not a user?<button id ="grey" type="button"
           class="btn-link" onclick="location.href='signup.html';"> Sign Up! </button></b></p>
      </div></div></div>

  </div>
  <br><br><br>
    <footer id="footer">
        <br>
         <p id="copyright"class="text-center">Copyright &copy; 2017 HELPFit</p>
         <br>
    </footer>
  </body>
  </html>
