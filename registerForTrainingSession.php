<?php
  session_start();
  $username = $_GET['username'];
  $_SESSION['username'] = $username;
        $con = new mysqli('localhost','root','','HELPFit');
        $sql = "SELECT * FROM trainingsession";
        $result = $con ->query($sql);

 ?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <title> Register Training Session</title>
  <link rel="stylesheet" type="text/css" href="HELPFit2.css">
    <link href="https://fonts.googleapis.com/css?family=Mallanna" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
    <script type = "text/javascript" src="HELPfit.js"></script>
</head>

<div >
<body id="regSession">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <nav id="navbar"class="navbar navbar-inverse">
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

<div id="regTSession" class="container col-sm-10  col-sm-offset-1">
  <h3 id="pagetitle">Select a Training Session </h3>
  <p id="grey">View the training sessions and <b>click on a session</b> to register.</p>
  <br>
  <div class="scrollable">
  <table id="grey" class="table table-hover">
    <thead>
      <tr>
        <th>Session ID</th>
        <th>Title</th>
        <th>Date</th>
        <th>Time</th>
        <th>Fee</th>
        <th>Type</th>
        <th>Status</th>
        <th>Trainer</th>
        <th>Speciality</th>
        <th>Rating</th>
      </tr>
    </thead>
    <tbody>
      <?php
          while ($row = $result->fetch_assoc()) {
      ?>
      <tr>
        <td><?php
                if($row['type'] == "Personal"){
                  echo('<a onclick= "return confirm();" href="registerpersonal.php?sessionID='.$row['sessionID'].'">'. $row['sessionID'].'</a>');
                }
                if($row['type'] == "Group"){
                  echo('<a href="registergroup.php?sessionID='.$row['sessionID'].'">'. $row['sessionID'].'</a>');
                }
            ?>
                </td>
      <td><?php echo $row['title']; ?></td>
      <td><?php echo $row['date']; ?></td>
      <td><?php echo $row['time']; ?></td>
      <td><?php echo $row['fee']; ?></td>
      <td><?php echo $row['type']; ?></td>
      <td><?php echo $row['status']; ?></td>
      <?php
       $session_ID = $row['sessionID'];
       $sql2 = "SELECT * FROM trainersessions WHERE sessionID = '$session_ID'";
       $result2 = $con ->query($sql2);
       while ($row2 = $result2 -> fetch_assoc()){
         $trainerusername = $row2['username'];
         $query2 = "SELECT * FROM trainer WHERE username = '$trainerusername'";
         $result3 = $con ->query($query2);
         while ($row3 = $result3 -> fetch_assoc()){
      ?>
      <td><?php echo $row3['username']; ?></td>
      <td><?php echo $row3['speciality']; ?></td>

      <?php
      $query = "SELECT username, rating FROM trainerrating WHERE username = '$trainerusername'";
      $rating = $con->query($query);
      $totalrating = 0;
      $ratingcount = 0;
      $averagerating = "";
      while($row4 = $rating->fetch_assoc()){
         $totalrating += $row4['rating'];
         $ratingcount ++;
      }
      if($ratingcount == 0){
        $averagerating = "N.A.";
      }
      else{
        $average = $totalrating/$ratingcount;
        $averagerating = number_format((float)$average, 2, '.', '');
      }
      ?>
      <td><?php echo $averagerating; ?></td>
    <?php }}} ?>
    </tbody>
  </table>
</div>
</div>
</div>

<footer id="footer">
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
