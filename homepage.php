<?php
session_start();

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
      <a class="navbar-brand" href="homepage.php"><img id="logo" src="fitnessLogo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a href="homepage.php">HOME</a></li>
      <li><a href="recordNewTrainingSession.php">SESSIONS</a></li>
      <li><a href="viewtrainingrecordstrainer.php">TRAINING RECORDS</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a href="#"class="dropdown-toggle" data-toggle="dropdown">
          <span class="glyphicon glyphicon-user"></span> &nbsp;<?php echo $_SESSION["username"]; ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <br>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user"></span>&nbsp; <?php echo $_SESSION["fullname"]; ?></li>
            <br>
            <li><a href="userdetailsmember.html"><span class="fa fa-pencil"></span> &nbsp;Update Details</a></li>
            <li class="divider"></li>
            <li><a href="login.php"><span class="fa fa-sign-out"></span> &nbsp;Sign out</a></li>
          </ul></a></li>
    </ul>
  </div>
</div>
</nav>



<div class="row" id="box-search">
    <div class="text-center text-white">
        <img src="fitnessPic5.jpg" alt="" class="img-responsive">
        <div id="caption-desktop"class="caption">
            <h1 id="welcomeMessage">Welcome, <?php echo $_SESSION["username"]; ?></h1><br>
            <div class="hidden-xs">
            <h3 id="hpHeading">Begin your journey.</h3><br>
            <button id="hpbutton" type="button" class="btn-lg"
            onclick="location.href='recordNewTrainingSession.php'"> Start now! </button></h3>
          </div>
        </div>
          <div id="caption-mobile" class="caption">
              <h1 id="welcomeMessage">Welcome, <?php echo $_SESSION["username"]; ?></h1><br>
          </div>
    </div>
</div>


<div id="area" class="row">
  <br><br>
  <div class="col-sm-6 col-xs-12 text-center">
    <a href="recordNewTrainingSession.php"><img id="hoverbtn" class="img-circle" src="fitnesspic8.jpg" alt="" width="140" height="140"></a>
    <h2 id="headings">Sessions</h2>
    <p id="grey">Allows users to register or record a new training session.</p>
  </div>
  <div class="col-sm-5 col-xs-12 text-center">
    <a href="viewtrainingrecordstrainer.php"><img id="hoverbtn" class="img-circle" src="fitnesspic7.jpg" alt="" width="140" height="140"></a>
    <h2 id="headings">Training Records</h2>
    <p id="grey">Allows users to view their past training history or update a training record</p>
    <br>
  </div>
</div>


<br><br>
<div class="row">
  <div class="col-sm-offset-1 col-sm-6 col-xs-offset-1 col-xs-10 text-justify">
    <br><br><br>
    <h1 id="title"> HELPFit</h1>
    <h4 id="content">HELPFit is an application that aims to connect Fitness trainers and Fitness enthusiasts.
      Anyone can sign up as a trainer or member.</h4>
  </div>
  <div class="col-sm-5 col-xs-12 text-center">
    <img class="img-rounded" src="fitnesspic9.jpg" width="250" height="250" alt="">
  </div>
</div>

<br><hr><br>

<div class="row">
  <div class="col-sm-offset-1 col-sm-3 col-xs-12 text-center">
    <br><br>
    <h1 id="title"> Members </h1>
    <h4 id="content">Members can view the available training sessions and register a session</h4>
  </div>
  <div class="col-sm-4 col-xs-12 text-center">
    <img class="img-rounded" src="fitnesspic10.jpg" width="250" height="250" alt="">
  </div>
  <div class="col-sm-3 col-sm-offset-right-1 col-xs-12 text-center">
    <br><br>
    <h1 id="title"> Trainers </h1>
    <h4 id="content">Trainers will propose personal training or group training sessions.</h4>
  </div>
</div>

<br>


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
