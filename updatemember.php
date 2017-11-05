<?php
session_start();
 $username = "";
 $fullname = "";
 $email = "";
 $password ="";
 $level="";

 $con = mysqli_connect('localhost','root','','HELPfit');
 $username = $_SESSION['username'];

if (isset($_POST['updatebtn'])){
  $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $level = mysqli_real_escape_string($con, $_POST['level']);

  if($fullname!= ""){
    $sql = "UPDATE user SET fullname = '$fullname' WHERE username = '$username'";
    mysqli_query($con, $sql);
  }
  if($email!= ""){
    $sql2 = "UPDATE user SET email = '$email' WHERE username = '$username'";
    mysqli_query($con, $sql2);
  }
  if($password!= ""){
    $sql3 = "UPDATE user SET password = '$password' WHERE username = '$username'";
    mysqli_query($con, $sql3);
  }

  $sql4 = "UPDATE member SET level = '$level' WHERE username = '$username'";
  mysqli_query($con, $sql4);
  echo "<script>
            alert('Your user details has been updated.');
            location.href='userdetailsmember.php?username=".$username."';
        </script>"; exit;
}

?>
