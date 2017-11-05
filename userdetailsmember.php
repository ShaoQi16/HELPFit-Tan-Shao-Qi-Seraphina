<?php
session_start();
$con = new mysqli('localhost','root','','HELPFit');
$username = $_GET['username'];
$sql1 = "SELECT username, fullname, email FROM user where username = '$username'";
$result = $con->query($sql1);
$sql2 = "SELECT username, level FROM member where username = '$username'";
$result2 = $con->query($sql2);
$_SESSION['username'] = $username;

 ?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <title> User details Member </title>
  <link rel="stylesheet" type="text/css" href="HELPFit.css">
  <link href="https://fonts.googleapis.com/css?family=Mallanna" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
  <script type = "text/javascript" src="HELPfit.js"></script>
</head>


<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<div id="userdetailsbg">
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


<br>

<div class="row">
<div id="userdetails" class="container col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
  <h3 id="pagetitle"> User details </h3>
  <p id="grey"> Update your user details</p>
  <br>
  <div class="updatedetails">
    <form name="updateform" action="updatemember.php" method="post">
      <?php
                while($row = $result->fetch_assoc()){
      ?>
    <div class="row">
      <label class="col-xs-12 col-sm-3">Full Name:</label>
      <div class="form-group col-sm-7 col-xs-9">
          <input type="text" name="fullname" class="form-control input-sm" id="inputFullname" placeholder="<?php echo $row['fullname'];?>">
      </div>
    </div>
    <div class="row">
      <label class="col-xs-12 col-sm-3">Email:</label>
      <div class="form-group col-sm-7 col-xs-9">
          <input type="text" name="email" class="form-control input-sm" id="inputEmail" placeholder="<?php echo $row['email'];?>">
          <p id="emailerror2" class="errormessage"> Your email is in a wrong format, please enter again. </p>
      </div>
    </div>
    <div class="row">
      <label class="col-xs-12 col-sm-3">Username:</label>
      <div class="form-group col-sm-7 col-xs-12">
        <p><?php echo $row['username'];?></p>
      </div>
    </div>
    <div class="row">
      <label class="col-xs-12 col-sm-3">Change password:</label>
      <div class="form-group col-sm-7 col-xs-9">
          <input type="password" name="password" class="form-control input-sm" id="inputPassword" placeholder="......."
          oninput="repeatpassword()">
          <p id="passworderror" class="errormessage"> Please enter at least 6 characters. </p>
      </div>
    </div>
    <div class="row">
      <label class="col-xs-12 col-sm-3">Repeat new password:</label>
      <div class="form-group col-sm-7 col-xs-9">
          <input type="password" name="repeatpassword" class="form-control input-sm" id="inputrepeatPassword">
           <p id="repeatpassworderror" class="errormessage"> Your passwords do not match, please try again. </p>
      </div>
      <?php
    }
                while($row = $result2->fetch_assoc()){
                  $beginner = "";
                  $advanced = "";
                  $expert = "";
                  if($row['level'] =="Beginner"){
                    $beginner = "selected";
                  }
                  if($row['level']=="Advanced"){
                    $advanced = "selected";
                  }
                  if($row['level']=="Expert"){
                    $expert = "selected";
                  }
      ?>
    </div>
    <div class="row">
    <label class="col-xs-12 col-sm-3">Level:</label>
    <div class="form-group col-sm-7 col-xs-9">
      <select name="level" class="form-control">
          <option value="Beginner" <?php echo $beginner; ?>>Beginner</option><option value="Advanced" <?php echo $advanced; ?>>Advanced</option><option value = "Expert"<?php echo $expert; ?>>Expert</option>
      </select>
    </div>
    </div>
    <?php
  }
  ?>

    <div class="row">
      <div class="col-sm-offset-8 col-xs-offset-6">
    <button id="btn1" type="submit" name="updatebtn" class="btn-success btn-sm" onclick="validateForm2()"> Update </button>
    <button id="btn2" type="submit" name="cancelbtn" class="btn-secondary btn-sm" onclick="location.href='homepage.html';"> Cancel </button>
  </div>
</div>
</form>
</div>
</div>
<br><br>
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
