<?php
  session_start();

      $con = new mysqli('localhost','root','','HELPFit');
      $sql = "SELECT sessionID, title, date, time, type FROM trainingsession";
      $result = $con ->query($sql);
 ?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <title> View Training Records Trainer</title>
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



<div id="trainingrecords" class="container col-sm-10  col-sm-offset-1">
  <div class="row">
  <div class="col-sm-6">
  <h3 id="pagetitle"> Training Records </h3>
  <p id="grey" class="hidden-xs"> View your past records. Click on the training session to update.</p>
</div>
<div class="col-sm-5 col-sm-offset-right-1 hidden-xs text-right">
  <br><br>
  <p id="trainerrating"><b> Your average rating: 5.0 </b></p>
</div>
</div>
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
                  while($row = $result->fetch_assoc()){
        ?>
        <tr onclick="location.href='reviewtrainerpersonal.html'">
        <td><?php echo $row['sessionID']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['time']; ?></td>
        <td><?php echo $row['type']; ?></td>
        <?php
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
