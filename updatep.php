<?php
session_start();
$title2 = "";
$date2 = "";
$time2 = "";
$fee2 ="";
$notes2="";

$con = mysqli_connect('localhost','root','','HELPfit');
$session_ID = $_SESSION['sessionID'];
if (isset($_POST['titlebtn'])){
  $title2 = mysqli_real_escape_string($con, $_POST['title']);
  $sql = "UPDATE trainingsession SET title = '$title2' WHERE sessionID = '$session_ID'";
  mysqli_query($con, $sql);
  echo "<script>
            alert('Your detail has been updated.');
            location.href='updatetrainingrecordpersonal.php?session_ID=".$session_ID."';
        </script>"; exit;
}

if (isset($_POST['datebtn'])){
  $date2 = mysqli_real_escape_string($con, $_POST['date']);
  $sql = "UPDATE trainingsession SET date = '$date2' WHERE sessionID = '$session_ID'";
  mysqli_query($con, $sql);
  echo "<script>
            alert('Your detail has been updated.');
            location.href='updatetrainingrecordpersonal.php?session_ID=".$session_ID."';
            </script>"; exit;
}

if (isset($_POST['timebtn'])){
  $time2 = mysqli_real_escape_string($con, $_POST['time']);
  $sql = "UPDATE trainingsession SET time = '$time2' WHERE sessionID = '$session_ID'";
  mysqli_query($con, $sql);
  echo "<script>
            alert('Your detail has been updated.');
            location.href='updatetrainingrecordpersonal.php?session_ID=".$session_ID."';
            </script>"; exit;
}

if (isset($_POST['feebtn'])){
  $fee2 = mysqli_real_escape_string($con, $_POST['fee']);
  $sql = "UPDATE trainingsession SET fee = '$fee2' WHERE sessionID = '$session_ID'";
  mysqli_query($con, $sql);
  echo "<script>
            alert('Your detail has been updated.');
            location.href='updatetrainingrecordpersonal.php?session_ID=".$session_ID."';
            </script>"; exit;
}

if (isset($_POST['statusbtn'])){
  $status2 = mysqli_real_escape_string($con, $_POST['status']);
  $sql = "UPDATE trainingsession SET status = '$status2' WHERE sessionID = '$session_ID'";
  mysqli_query($con, $sql);
  echo "<script>
            alert('Your detail has been updated.');
            location.href='updatetrainingrecordpersonal.php?session_ID=".$session_ID."';
            </script>"; exit;
}

if (isset($_POST['notesbtn'])){
  $notes2 = mysqli_real_escape_string($con, $_POST['notes']);
  $sql = "UPDATE personaltraining SET notes = '$notes2' WHERE sessionID = '$session_ID'";
  mysqli_query($con, $sql);
  echo "<script>
            alert('Your detail has been updated.');
            location.href='updatetrainingrecordpersonal.php?session_ID=".$session_ID."';
            </script>"; exit;
}




 ?>
