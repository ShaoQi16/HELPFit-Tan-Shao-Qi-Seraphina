<?php
session_start();
 $title = "";
 $date = "";
 $time = "";
 $fee ="";
 $status="Available";
 $classType="";
 $maxParticipants="";
 $type= "Group";

 $con = mysqli_connect('localhost','root','','HELPfit');

 if (isset($_POST['create'])){
   $title= mysqli_real_escape_string($con, $_POST['title']);
   $date = mysqli_real_escape_string($con, $_POST['date']);
   $time = mysqli_real_escape_string($con, $_POST['time']);
   $fee = mysqli_real_escape_string($con, $_POST['fee']);
   $classType = mysqli_real_escape_string($con, $_POST['classType']);
   $maxParticipants = mysqli_real_escape_string($con, $_POST['maxParticipants']);

   $sql = "INSERT INTO  trainingsession (title, date, time, fee, status, type)
            VALUES('$title','$date','$time','$fee','$status','$type')";
   mysqli_query($con, $sql);
   $sql2 = "INSERT INTO grouptraining (title, classType, maxParticipants)
          VALUES('$title','$classType','$maxParticipants')";
   mysqli_query($con, $sql2);
   echo "<script>
             alert('Your session has been added');
             location.href='recordNewTrainingSession.php';
         </script>"; exit;
}
?>
