<?php
session_start();
 $username = "";
 $fullname = "";
 $email = "";
 $password ="";
 $speciality="";
 $con = mysqli_connect('localhost','root','','HELPfit');
 $username = $_SESSION['username'];
if (isset($_POST['picturebtn'])){
  $picture = mysqli_real_escape_string($con,file_get_contents($_FILES['picture']['tmp_name']));
  $picturename = $_FILES['picture']['name'];
  $query = "SELECT username FROM trainerpicture WHERE username = '$username'";
  $result = $con ->query($query);
   if(mysqli_num_rows($result)){
     $sql5 = "UPDATE trainerpicture SET picture = '$picture' WHERE username = '$username'";
     $sql6 = "UPDATE trainerpicture SET picturename = '$picturename' WHERE username = '$username'";
     mysqli_query($con, $sql5);
     mysqli_query($con, $sql6);
   }
   else{
     $sql6 = "INSERT INTO  trainerpicture (username, picture, picturename)
              VALUES('$username','$picture','$picturename')";
     mysqli_query($con, $sql6);
   }
   echo "<script>
             alert('Your profile picture has been updated.');
             location.href='userdetailstrainer.php?username=".$username."';
         </script>"; exit;
 }


if (isset($_POST['updatebtn'])){
  $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $speciality = mysqli_real_escape_string($con, $_POST['speciality']);

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
  if($speciality!= ""){
    $sql4 = "UPDATE trainer SET speciality = '$speciality' WHERE username = '$username'";
    mysqli_query($con, $sql4);
  }
  echo "<script>
            alert('Your user details has been updated.');
            location.href='userdetailstrainer.php?username=".$username."';
        </script>"; exit;
}
if(isset($_POST['cancelbtn'])){
  echo "<script>
            location.href='homepageTrainer.php?username=".$username."';
        </script>"; exit;
}



 ?>
