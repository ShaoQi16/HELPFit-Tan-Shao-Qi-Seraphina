<?php
session_start();
$username = $_GET['username'];
$_SESSION['username'] = $username;
 ?>

<html id="html">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
  <title> New Training Session </title>
  <link rel="stylesheet" type="text/css" href="HELPFit2.css">
  <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
  <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" media="screen"
   href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
  <link href="https://fonts.googleapis.com/css?family=Mallanna" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Secular+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran" rel="stylesheet">
</head>

<div>
<body id="newTrainingBody" id="body">
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
          <span class="glyphicon glyphicon-user"></span> &nbsp;<?php echo $_SESSION["username"]; ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <br>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-user"></span>&nbsp; <?php echo $_SESSION["fullname"]; ?></li>
            <br>
            <li><?php echo('<a href="userdetailstrainer.php?username='.$username.'">')?><span class="fa fa-pencil"></span> &nbsp;Update Details</a></li>
            <li class="divider"></li>
            <li><a href="login.php"><span class="fa fa-sign-out"></span> &nbsp;Sign out</a></li>
          </ul></a></li>
    </ul>
  </div>
  </div>
  </nav>




    <div class="col-xs-offset-1 col-xs-10 col-sm-offset-3 col-sm-8">
      <div id="testing" class="col-xs-12  col-sm-9" style="text-align:center">
          <h2 id="pagetitle"><b>Create New Training Session </b></h2>
          <br>
          <form name="trainingsessionform" action="TSPserver.php" method="post">
          <div class="row">
            <h5 id="chooseDate"> Title: </h5>
          <div class="form-group">
                <input type="text" name="title" class="form-control input-sm" id="inputTitle" placeholder="Title" required>
            </div>
          </div>

          <div class="row">
            <h5 id="chooseDate">Choose A Date: </h5>
          <div class="form-group">
            <div id="datetimepicker" class="input-append date">
            </div>
            <script type="text/javascript"
             src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
            </script>
            <script type="text/javascript"
             src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
            </script>
            <script type="text/javascript"
             src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
            </script>
            <script type="text/javascript"
             src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
            </script>

          <div id="datetimepicker4" class="input-append" style="text-align:left" required>
            <input data-format="dd-MM-yyyy" type="date" name="date" class="input-sm"></input>
          </div>
          </div>
          </div>

          <div class="row">
            <h5 id="chooseTime">Choose A Time: </h5>
          <div class="form-group">
            <div id="datetimepicker3" class="input-append" style="text-align:left">
              <input data-format="hh:mm:ss" type="text" name="time"></input>
              <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
              </span>
            </div>
        <script type="text/javascript">
        $(function() {
          $('#datetimepicker3').datetimepicker({
            pickDate: false
          });
        });
        </script>
          </div>
          </div>

          <div class="row">
            <h5 id="Fee">Fee: </h5>
          <div class="form-group">
            <div class="input-group">
              <span id="currency" class="input-group-addon">RM</span>
              <input class="form-control" id="feeInput" name="fee" placeholder="1000.00" type="text" required>
            </div>
          </div>
        </div>

        <div class="row">
          <h5 id="Fee">Notes: </h5>
          <div class="form-group">
            <textarea name="notes" class= "form-control input-sm" required></textarea>
          </div>
          </div>
          <div class="row">
            <div id="whiteback">
            </div>
            <div id="dlgbox">
                <div id="dlg-header">Confirm</div>
                <div id="dlg-body">Do you want to create this session?</div>
                <div id="dlg-footer">
                    <button name="create" onclick="dlgOK()">OK</button>
                    <button onclick="dlgCancel()">Cancel</button>
                </div>
            </div>
            <button type="button" name="create" class="btn btn-info" onclick="showDialog()">Create</button>
            <script>
                function dlgCancel(){
                    dlgHide();
                    document.getElementsByTagName("H1")[0].innerHTML = "You clicked Cancel.";
                }
                function dlgOK(){
                    dlgHide();
                    document.getElementsByTagName("H1")[0].innerHTML = "You clicked OK.";
                }
                function dlgHide(){
                    var whiteBack = document.getElementById("whiteback");
                    var dlg = document.getElementById("dlgbox");
                    whiteBack.style.display = "none";
                    dlg.style.display = "none";
                }
                function showDialog(){
                    var whiteBack = document.getElementById("whiteback");
                    var dlg = document.getElementById("dlgbox");
                    whiteBack.style.display = "block";
                    dlg.style.display = "block";
                    var windowWidth = window.innerWidth;
                    dlg.style.left = (windowWidth/2) - 480/2 + "px";
                    dlg.style.top = "150px";
                }
            </script>
          </div>


  </div>
</div>
</div>
</div>


<footer id="footer2">
    <br>
     <p id="copyright"class="text-center">Copyright &copy; 2017 HELPFit</p>
     <br>
</footer>
</body>
</div>
</html>
