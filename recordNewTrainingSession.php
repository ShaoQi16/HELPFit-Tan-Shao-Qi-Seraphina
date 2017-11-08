<?php
session_start();
$username = $_GET['username'];
$_SESSION['username'] = $username;
 ?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <title> HELPFit </title>
  <link rel="stylesheet" type="text/css" href="HELPFit.css">
  <link href="https://fonts.googleapis.com/css?family=Mallanna" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Secular+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
  <script type = "text/javascript" src="HELPfit.js"></script>
</head>
<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>


  <nav id="navbar" class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" <?php echo('href="homepageTrainer.php?username='.$username.'"')?>><img id="logo" src="fitnessLogo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a <?php echo('href="homepageTrainer.php?username='.$username.'"')?>>HOME</a></li>
      <li><a <?php echo('href="recordNewTrainingSession.php?username='.$username.'"')?>>SESSIONS</a></li>
      <li><a <?php echo('href="viewtrainingrecordstrainer.php?username='.$username.'"')?>>TRAINING RECORDS</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a href="#"class="dropdown-toggle" data-toggle="dropdown">
          <span class="glyphicon glyphicon-user"></span> &nbsp;<?php echo $username; ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <br>
            <li><?php echo('<a href="userdetailstrainer.php?username='.$username.'">')?><span class="fa fa-pencil"></span> &nbsp;Update Details</a></li>
            <li class="divider"></li>
            <li><a href="login.php"><span class="fa fa-sign-out"></span> &nbsp;Sign out</a></li>
          </ul></a></li>
    </ul>
  </div>
  </div>
  </nav>




<div class="row text-center">
  <h3 id="title"> Choose a type of training to record:</h3>
  <br><br><br>
  <div class="col-sm-offset-1 col-sm-5 col-xs-12 text-center">
    <a <?php echo('href="recordpersonal.php?username='.$username.'"')?>><img id="hoverbtn" class="img-circle" src="fitnesspic3.jpg" alt="" width="220" height="220"></a>
    <h2 id="headings">Personal Training</h2>
  </div>
  <div class="col-sm-5 col-xs-12 text-center">
    <a <?php echo('href="recordgroup.php?username='.$username.'"')?>><img id="hoverbtn" class="img-circle" src="fitnesspic2.jpg" alt="" width="220" height="220"></a>
    <h2 id="headings">Group Training</h2>
    <br><br>
  </div>
</div>

<footer>
    <br>
    <table align="center">
      <tr><td><a id="iconcolor" class ="btn btn-social-icon btn-youtube" href="http://youtube.com//">
            <span class="fa fa-youtube fa-2x"></span></a></td>
        <td><a id="iconcolor" class ="btn btn-social-icon btn-facebook" href="http://facebook.com//">
            <span class="fa fa-facebook fa-2x"></span></a></td>
        <td><a id="iconcolor" class ="btn btn-social-icon btn-instagram" href="http://instagram.com//">
            <span class="fa fa-instagram fa-2x"></span></a></td>
        <td><a id="iconcolor" class ="btn btn-social-icon btn-twitter" href="http://twitter.com//">
            <span class="fa fa-twitter fa-2x"></span></a></td>
      </tr>
      </table>
     <p id="copyright"class="text-center">Copyright &copy; 2017 HELPFit</p>
     <br>
</footer>
</body>
</html>
