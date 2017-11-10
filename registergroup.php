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
          $registeredsession = mysqli_query($con, "SELECT sessionID FROM membersessions WHERE sessionID ='$sessionID' AND username ='$username'");
          if(mysqli_num_rows($registeredsession)){
            echo "<script>
                  alert('You have already registered in this training session.');
                  location.href='registerForTrainingSession.php?username=".$username."';
                  </script>";exit;
          }

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

      $sql3 = "INSERT INTO  membersessions (username, sessionID)
               VALUES('$username','$sessionID')";
      mysqli_query($con, $sql3);

      $sql2 = "SELECT * FROM grouptraining WHERE sessionID = '$sessionID'";
      $result2 = $con ->query($sql2);
      while ($row2 = $result2->fetch_assoc()) {
        $num = $row2['numParticipants'] + 1;
        $sql4 = "UPDATE grouptraining SET numParticipants = '$num' WHERE sessionID = '$sessionID'";
        mysqli_query($con, $sql4);
        if($num == $row2['maxParticipants']){
          $sql5 = "UPDATE trainingsession SET status = 'Full' WHERE sessionID = '$sessionID'";
          mysqli_query($con, $sql5);
        }
      }
        echo "<script>
                  alert('Successfully registered.');
                  location.href='registerForTrainingSession.php?username=".$username."';
              </script>"; exit;
      }
  }


?>
