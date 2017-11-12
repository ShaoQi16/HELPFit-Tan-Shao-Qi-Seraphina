<?php
session_start();
$username = $_SESSION['username'];
$con = new mysqli('localhost','root','','HELPFit');
$sessionID = $_GET['session_ID'];
$sql = "SELECT sessionID, title, date, time, fee, status FROM trainingsession where sessionID = $sessionID";
$_SESSION['sessionID'] = $sessionID;
$result = $con ->query($sql);
$sql2 = "SELECT sessionID, classType, maxParticipants, numParticipants FROM grouptraining where sessionID = $sessionID";
$result2 = $con ->query($sql2);
$sql3 = "SELECT username, sessionID FROM trainersessions where sessionID = $sessionID";
$result3 = $con->query($sql3);

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
      <a class="navbar-brand" <?php echo('href="homepageMember.php?username='.$username.'"')?>><img id="logo" src="fitnessLogo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a <?php echo('href="homepageMember.php?username='.$username.'"')?>>HOME</a></li>
      <li><a <?php echo('href="registerForTrainingSession.php?username='.$username.'"')?>>SESSIONS</a></li>
      <li><a <?php echo('href="viewtrainingrecordsmember.php?username='.$username.'"')?>>TRAINING RECORDS</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a href="#"class="dropdown-toggle" data-toggle="dropdown">
          <span class="glyphicon glyphicon-user"></span> &nbsp;<?php echo $_SESSION["username"]; ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <br>
            <li>
              <?php echo('<a href="userdetailsmember.php?username='.$username.'">')?><span class="fa fa-pencil"></span> &nbsp;Update Details</a></li>
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
  <p id="grey" class="hidden-xs">&nbsp; View your record and choose a detail to update.</p>
  <br>
  <div class="row scrollbar">
  <div class="col-sm-12">
  <table class="table">
    <?php
              while($row = $result->fetch_assoc()){
    ?>
      <tr>
        <th id="grey"width="40%">Title</th>
        <td id="grey"><?php echo $row['title']; ?></td>
      </tr>
      <tr>
        <th id="grey">Date</th>
        <td id="grey"><?php echo $row['date']; ?></td>
        <?php $date = $row['date']; ?>
      </tr>
      <tr>
        <th id="grey">Time</th>
        <td id="grey"><?php echo $row['time']; ?></td>
      </tr>
      <tr>
        <th id="grey">Fee</th>
        <td id="grey"><?php echo "RM ".$row['fee']; ?></td>
      </tr>
      <tr>
        <th id="grey">Status</th>
        <td id="grey"><?php echo $row['status']; ?></td>
      </tr>
      <?php
      }
                while($row = $result2->fetch_assoc()){
      ?>
      <tr>
        <th id="grey">Class Type</th>
        <td id="grey"><?php echo $row['classType']; ?></td>
      </tr>
      <tr>
        <th id="grey">Max</th>
        <td id="grey"><?php echo $row['maxParticipants']; ?></td>
      </tr>
      <tr>
        <th id="grey">Num</th>
        <td id="grey"><?php echo $row['numParticipants']; ?></td>
          <?php
              }
          ?>
      </tr>
    </table>
</div>
</div>
</div>
<br class="brmobile"/>
  <div class="col-sm-6 col-xs-12">
  <div id="reviewtrainer2" class="col-sm-10 col-xs-offset-1 col-xs-10 text-center">
    <br>
      <div class="row">
      <div class="col-sm-offset-1 col-sm-1">
      <?php
        while($row = $result3->fetch_assoc()){
          $trainerusername = $row['username'];
      ?>
      <img class="img-circle" <?php echo ('src="getprofilepic.php?username='.$trainerusername.'"'); ?>
       alt="" width="140" height="140">
      </div>
      <div class="col-sm-offset-5">
        <br>
        <?php
                    $_SESSION['trainerusername'] = $trainerusername;
                    $sql5 = "SELECT username, fullname FROM user WHERE username = '$trainerusername'";
                    $result5 = $con->query($sql5);
                    $sql4 = "SELECT username, speciality FROM trainer WHERE username = '$trainerusername'";
                    $result4 = $con->query($sql4);
                    while($row = $result5->fetch_assoc()){
        ?>
        <h5 id="trainer"> Trainer name: <?php echo $row['fullname']; ?> </h5>
        <?php
            }
            while($row = $result4->fetch_assoc()){
         ?>
        <h5 id="trainer"> Speciality: <?php echo $row['speciality']; ?> </h5>
        <?php
            }}
        ?>

        <br>
        <button id="reviewbtn" type="button" class="btn-success btn-sm" onclick="review('<?php echo $date ?>')"> Review </button>
      </div></div>

    <div id="reviewpopup" class="row">
      <form <?php echo('action="reviewgroup.php?username='.$username.'"')?> method="post" name ="reviewform">
      <div class="row">
        <div class="form-group">
          <br>
          <label id="grey" class="col-xs-offset-1 col-xs-11 col-sm-offset-1 col-sm-3 text-left">Rate him/her:</label>
          <div class="stars text-left">
              <input class="star star-5" id="star-5" type="radio" name="star" value = "5"/>
              <label class="star star-5" for="star-5"></label>
              <input class="star star-4" id="star-4" type="radio" name="star" value = "4"/>
              <label class="star star-4" for="star-4"></label>
              <input class="star star-3" id="star-3" type="radio" name="star" value = "3"/>
              <label class="star star-3" for="star-3"></label>
              <input class="star star-2" id="star-2" type="radio" name="star" value = "2"/>
              <label class="star star-2" for="star-2"></label>
              <input class="star star-1" id="star-1" type="radio" name="star" value = "1"/>
              <label class="star star-1" for="star-1"></label>
          </div></div></div>
    <div class="row">
      <div class="form-group">
          <label id="grey" class="col-xs-offset-1 col-xs-11 col-sm-offset-1 col-sm-2 text-left">Comments:</label>
          <textarea id="grey" name = "comments" class="col-sm-6 col-xs-offset-1 col-xs-10" rows="3" id="comment"></textarea>
        </div></div><br>
    <div class="col-sm-offset-7 col-xs-offset-8">
    <button id="btn1" name = "reviewbtn" type="submit" class="btn-secondary btn-sm" onclick="return submitreview();"> Submit</button>
  </div>
</form>
</div></div></div></div>
  <br><br>
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
