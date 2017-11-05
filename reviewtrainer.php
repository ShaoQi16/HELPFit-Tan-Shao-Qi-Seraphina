<?php
session_start();
 ?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <title> Review Trainer Group </title>
  <link rel="stylesheet" type="text/css" href="HELPFit.css">
  <link href="https://fonts.googleapis.com/css?family=Mallanna" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
  <script type = "text/javascript" src="HELPfit.js"></script>
</head>

<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<div id="reviewTrainerbg">
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
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user"></span>&nbsp; <?php echo $_SESSION["username"]; ?></li>
            <br>
            <li><a href="userdetailsmember.php"><span class="fa fa-pencil"></span> &nbsp;Update Details</a></li>
            <li class="divider"></li>
            <li><a href="login.php"><span class="fa fa-sign-out"></span> &nbsp;Sign out</a></li>
          </ul></a></li>
    </ul>
  </div>
</div>
</nav>



<div id="reviewtrainer" class="container">
  <h3 id="pagetitle"> Training Record </h3>
  <p id="grey" class="hidden-xs">&nbsp; View your record and review your trainer.</p>
  <br>
  <div class="row scrollbar">
  <div class="col-sm-10 col-sm-offset-1">
  <table class="table">
      <tr>
        <th>Title</th>
        <th>Date</th>
        <th>Time</th>
        <th>Fee</th>
        <th>Status</th>
        <th>Class Type</th>
        <th>Max</th>
        <th>Num</th>
      </tr>
      <tr>
        <td>xxxxxxx xxxxxx</td>
        <td>15/9/17</td>
        <td>17:00</td>
        <td>RM100</td>
        <td>Active</td>
        <td>Yoga</td>
        <td>10</td>
        <td>9</td>
      </tr>
    </table>
</div>
</div>
</div>
<br><br>

  <div class="row">
  <div id="reviewtrainer2" class="col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10 text-center">
    <br><br>
      <div class="row">
      <div class="col-sm-offset-1 col-sm-1">
      <img class="img-circle" src="fitnesspic17.jpg" alt="" width="140" height="140">
      </div>
      <div class="col-sm-offset-5">
        <br>
        <h5 id="trainer"> Trainer name: xxxxxxxxx</h5>
        <h5 id="trainer"> Speciality:  xxxxxxxxx</h5>
        <button id="reviewbtn" type="button" class="btn-success btn-sm" onclick="review()"> Review </button>
      </div>
    </div>
    </div>
  </div>

    <div id="reviewpopup" class="row">
    <div id="review" class="container col-sm-offset-3 col-sm-6">
      <div class="row">
        <div class="form-group">
          <br><br>
          <label class="col-xs-12 col-sm-3">Rate him/her:</label>
          <div class="rating col-sm-8 col-xs-12 text-left">
            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
          </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="form-group">
          <label class="col-xs-12 col-sm-2">Comments:</label>
          <textarea class="col-sm-7 col-xs-offset-1 col-xs-11" rows="5" id="comment"></textarea>
        </div>
    </div>
    <br>
    <div class="col-sm-offset-9 col-xs-offset-10">
    <button id="btn1" type="button" class="btn-secondary btn-sm" onclick="submit()"> Submit</button>
  </div>
  </div>
</div>
  <br>
</div>
<footer>
    <br>
    <table align="center">
      <tr><td>
          <a id="iconcolor" class ="btn btn-social-icon btn-youtube" href="http://youtube.com//">
            <span class="fa fa-youtube fa-2x"></span></a>
        </td>
        <td>
          <a id="iconcolor" class ="btn btn-social-icon btn-facebook" href="http://facebook.com//">
            <span class="fa fa-facebook fa-2x"></span>
          </a>
        </td>
        <td>
          <a id="iconcolor" class ="btn btn-social-icon btn-instagram" href="http://instagram.com//">
            <span class="fa fa-instagram fa-2x"></span>
          </a>
        </td>
        <td>
          <a id="iconcolor" class ="btn btn-social-icon btn-twitter" href="http://twitter.com//">
            <span class="fa fa-twitter fa-2x"></span>
          </a>
        </td>
      </tr>
      </table>
     <p id="copyright"class="text-center">Copyright &copy; 2017 HELPFit</p>
     <br>
</footer>
</body>
</html>
