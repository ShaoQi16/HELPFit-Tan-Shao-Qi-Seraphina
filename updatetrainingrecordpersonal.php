<?php
session_start();
$con = new mysqli('localhost','root','','HELPFit');
$sessionID = $_GET['session_ID'];
$sql = "SELECT sessionID, title, date, time, fee, status FROM trainingsession where sessionID = $sessionID";
$_SESSION['sessionID'] = $sessionID;
$result = $con ->query($sql);
$sql2 = "SELECT sessionID, notes FROM personaltraining where sessionID = $sessionID";
$result2 = $con ->query($sql2);
 ?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <title> Update Training Record Personal</title>
  <link rel="stylesheet" type="text/css" href="HELPFit.css">
  <link href="https://fonts.googleapis.com/css?family=Mallanna" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet">
  <script type = "text/javascript" src="HELPfit.js"></script>

</head>

<body id="updatetrainingbg">
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
<div class="row">
<div id="updatetraining" class="container col-sm-offset-1 col-sm-5 col-xs-10 col-xs-offset-1">
  <h3 id="pagetitle"> Training Record </h3>
  <p id="grey" class="hidden-xs">&nbsp; View your record and click on a detail to update.</p>
  <br>
  <div class="row scrollbar">
  <div class="col-sm-12">
  <table class="table">
    <?php
              while($row = $result->fetch_assoc()){
    ?>
      <tr>
        <th width = "40%">Title</th>
        <td><button class="btn-link" onclick="updatetitle2()"><?php echo $row['title']; ?></button></td>
      </tr>
      <tr>
        <th>Date</th>
        <td><button class="btn-link" onclick="updatedate2()"><?php echo $row['date']; ?></td>
      </tr>
      <tr>
        <th>Time</th>
        <td><button class="btn-link" onclick="updatetime2()"><?php echo $row['time']; ?></td>
      </tr>
      <tr>
        <th>Fee</th>
        <td><button class="btn-link" onclick="updatefee2()"><?php echo "RM ".$row['fee']; ?></td>
      </tr>
      <tr>
        <th>Status</th>
        <td><button class="btn-link" onclick="updatestatus2()"><?php echo $row['status']; ?></td>
      </tr>
      <?php
      }
      ?>
      <?php
                while($row = $result2->fetch_assoc()){
      ?>
      <tr>
        <th>Notes</th>
        <td><button class="btn-link" onclick="updatenotes()"><?php echo $row['notes']; ?></td>
      </tr>
        <?php
          }
        ?>
    </table>
</div>
</div>
</div>
<div class="col-sm-5 col-xs-12">
  <br/>
    <div id="updateTitle" class="col-sm-offset-2 col-sm-10 col-xs-offset-1 col-xs-10 editpopup">
      <h4><b>Edit</b></h4>
      <h5> Title: </h5>
      <form name="titleform" action="updatep.php" method="post">
      <input type="text" name="title" class="form-control input-sm" id="inputtitle" required>
      <br>
      <button id="btn1" name="titlebtn" type="submit" class="btn-success btn-sm"> Update </button>
      </form>
    </div>
    <div id="updateDate" class="col-sm-offset-2 col-sm-10 col-xs-offset-1 col-xs-10 editpopup">
      <h4><b>Edit</b></h4>
      <h5> Date: </h5>
      <form name="dateform" action="updatep.php" method="post">
      <input type="text" name="date" class="form-control input-sm" id="inputdate" required>
      <br>
      <button id="btn1" name="datebtn" type="submit" class="btn-success btn-sm"> Update </button>
      </form>
    </div>
    <div id="updateTime" class="col-sm-offset-2 col-sm-10 col-xs-offset-1 col-xs-10 editpopup">
      <h4><b>Edit</b></h4>
      <h5> Time: </h5>
      <form name="timeform" action="updatep.php" method="post">
      <input type="text" name="time" class="form-control input-sm" id="inputtime" required>
      <br>
      <button id="btn1"name="timebtn" type="submit" class="btn-success btn-sm"> Update </button>
      </form>
    </div>
    <div id="updateFee" class="col-sm-offset-2 col-sm-10 col-xs-offset-1 col-xs-10 editpopup">
      <h4><b>Edit</b></h4>
      <h5> Fee: </h5>
      <form name="feeform" action="updatep.php" method="post">
      <input type="text" name="fee" class="form-control input-sm" id="inputfee" required>
      <br>
      <button id="btn1" name="feebtn"type="submit" class="btn-success btn-sm"> Update </button>
      </form>
    </div>
    <div id="updateStatus" class="col-sm-offset-2 col-sm-10 col-xs-offset-1 col-xs-10 editpopup">
      <h4><b>Edit</b></h4>
      <h5> Status: </h5>
      <form name="statusform" action="updatep.php" method="post">
      <input type="text" name="status" class="form-control input-sm" id="inputstatus" required>
      <br>
      <button id="btn1"name="statusbtn" type="submit" class="btn-success btn-sm"> Update </button>
      </form>
    </div>
    <div id="updateNotes" class="col-sm-offset-2 col-sm-10 col-xs-offset-1 col-xs-10 editpopup">
      <h4><b>Edit</b></h4>
      <h5> Notes: </h5>
      <form name="notesform" action="updatep.php" method="post">
      <input type="text" name="notes" class="form-control input-sm" id="inputstatus" required>
      <br>
      <button id="btn1"name="notesbtn" type="submit" class="btn-success btn-sm"> Update </button>
      </form>
    </div>
  </div>
</div>
  <br>
<div class ="row">
  <div class="col-xs-hidden">
    <br><br>
  </div>
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
