<?php
session_start();
 $title = "";
 $date = "";
 $time = "";
 $fee ="";
 $status="Available";
 $notes="";
 $type = "Personal";
 $username = $_SESSION['username'];

 $con = mysqli_connect('localhost','root','','HELPfit');

 if (isset($_POST['create'])){
   $title= mysqli_real_escape_string($con, $_POST['title']);
   $date = mysqli_real_escape_string($con, $_POST['date']);
   $time = mysqli_real_escape_string($con, $_POST['time']);
   $fee = mysqli_real_escape_string($con, $_POST['fee']);
   $notes = mysqli_real_escape_string($con, $_POST['notes']);
   $datenow = date("Y-m-d");
   echo $datenow;
   if($date < $datenow){
     echo "<script>
               alert('Please enter a valid date.');
               location.href='recordgroup.php?username=".$username."';
           </script>"; exit;
   }
   else{

   $sql = "INSERT INTO  trainingsession (title, date, time, fee, status, type)
            VALUES('$title','$date','$time','$fee','$status','$type')";
   mysqli_query($con, $sql);
   $query = "SELECT sessionID FROM trainingsession where title = '$title'";
   $result =  $con ->query($query);
   while($row = $result->fetch_assoc()){
     $sessionID = $row['sessionID'];
     $sql2 = "INSERT INTO personaltraining (sessionID, notes)
            VALUES('$sessionID','$notes')";
     mysqli_query($con, $sql2);
     $sql3 = "INSERT INTO trainersessions(username, sessionID)
              VALUES('$username', '$sessionID')";
     mysqli_query($con, $sql3);
      }
     echo "<script>
               alert('Your session has been added');
               location.href='recordNewTrainingSession.php?username=".$username."';
           </script>"; exit;
}
}
?>
