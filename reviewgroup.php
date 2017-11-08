<?php
  session_start();
  $username = $_SESSION['trainerusername'];
  $sessionID = $_SESSION['sessionID'];
  $memberusername = $_GET['username'];
  $_SESSION['username'] = $memberusername;
  $rating = "";
  $comments = "";

  $con = mysqli_connect('localhost','root','','HELPfit');

  if (isset($_POST['reviewbtn'])){
      $rating = mysqli_real_escape_string($con, $_POST['star']);
      $comments = mysqli_real_escape_string($con, $_POST['comments']);
      $sql = "INSERT INTO  trainerrating (username, memberusername,rating, comments)
               VALUES('$username','$memberusername','$rating','$comments')";
      mysqli_query($con, $sql);
      echo "<script>
                alert('The review has been submitted');
                location.href='reviewtrainer.php?session_ID=".$sessionID."';
            </script>"; exit;
  }
 ?>
