<?php
session_start();
  $sessionID = $_GET['sessionID'];
  $username = $_SESSION['username'];
  $con = new mysqli('localhost','root','','HELPFit');

  $sql = "SELECT * FROM trainingsession WHERE sessionID = '$sessionID'";
  $result = $con ->query($sql);
  while ($row = $result->fetch_assoc()) {
    $date = $row['date'];
    if($row['status'] == 'Full' ||$row['status'] == 'Completed'||$row['status'] == 'Cancelled' ){
      echo "<script>
                alert('This training session is not available.');
                location.href='registerForTrainingSession.php?username=".$username."';
            </script>"; exit;
    }
    else{
      $query = "SELECT sessionID FROM membersessions WHERE username = '$username'";
      $result2 = $con ->query($query);
      while ($row2 = $result2->fetch_assoc()) {
          $sessionID2 = $row2['sessionID'];
          $registereddate = mysqli_query($con, "SELECT sessionID FROM trainingsession WHERE sessionID = '$sessionID2' AND date = '$date'");
          if(mysqli_num_rows($registereddate)){
          echo "<script>
                alert('You have already registered in a training session on this date.');
                location.href='registerForTrainingSession.php?username=".$username."';
                </script>";exit;
      }
    }
          $sql2 = "UPDATE trainingsession SET status = 'Full' WHERE sessionID = '$sessionID'";
          mysqli_query($con, $sql2);
          $sql3 = "INSERT INTO  membersessions (username, sessionID)
                   VALUES('$username','$sessionID')";
          mysqli_query($con, $sql3);
          echo "<script>
                    alert('Successfully registered.');
                    location.href='registerForTrainingSession.php?username=".$username."';
                </script>"; exit;
          }
      }





?>
