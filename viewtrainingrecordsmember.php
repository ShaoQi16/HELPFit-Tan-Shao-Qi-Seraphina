<?php
session_start();
$username = $_GET['username'];
$_SESSION['username'] = $username;
$con = new mysqli('localhost','root','','HELPFit');
$query = "SELECT username, sessionID FROM membersessions WHERE username = '$username'";
$result2 = $con ->query($query);
 ?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <title> View Training Records Member</title>
  <link rel="stylesheet" type="text/css" href="HELPFit.css">
    <link href="https://fonts.googleapis.com/css?family=Mallanna" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">

</head>

<div id="trainingrecordsbg">
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


<div id="trainingrecords" class="container col-sm-10  col-sm-offset-1">
  <h3 id="pagetitle"> Training Records </h3>
  <p id="grey" class="hidden-xs">&nbsp; View your past records. Click on the sessionID to review your trainer.</p>
  <br>
  <div class="scrollable">
  <table id="trainingrecordstb" class="table table-hover">
    <thead>
      <tr>
        <th>Session ID</th>
        <th>Title</th>
        <th>Date</th>
        <th>Time</th>
        <th>Type</th>
      </tr>
    </thead>
    <tbody>
      <?php
                while($row = $result2->fetch_assoc()){
                  $session_ID = $row['sessionID'];
                   $sql2 = "SELECT sessionID,title, date, time, type FROM trainingsession WHERE sessionID = '$session_ID'";
                   $result = $con ->query($sql2);
                   while($row = $result->fetch_assoc()){
      ?>
      <tr>
      <td><?php
              if($row['type'] == "Personal"){
                echo('<a href="reviewtrainerpersonal.php?session_ID='.$row['sessionID'].'">'. $row['sessionID'].'</a>');
              }
              if($row['type'] == "Group"){
                echo('<a href="reviewtrainer.php?session_ID='.$row['sessionID'].'">'. $row['sessionID'].'</a>');
              }
          ?>
              </td>
      <td><?php echo $row['title']; ?></td>
      <td><?php echo $row['date']; ?></td>
      <td><?php echo $row['time']; ?></td>
      <td><?php echo $row['type']; ?></td>
      <?php
    }
  }
    ?>
    </tr>
    </tbody>
  </table>
</div>
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
</div>
</html>
