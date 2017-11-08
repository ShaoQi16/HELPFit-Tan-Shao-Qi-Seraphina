<?php
session_start();
$con = mysqli_connect('localhost','root','','HELPfit');

if (isset($_GET['username'])) {
  $username = $_GET['username'];
  $query = "SELECT username, picture FROM trainerpicture WHERE username = '$username'";
  $result = $con->query($query);

  if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_array($result)) {
      $imageData = $row['picture'];
      header("Content-type:image/png");
      echo $imageData;
      exit;
    }
  }
  else{
    $query1 = "SELECT username, picture FROM trainerpicture WHERE username = 'default'";
    $result1 = $con->query($query1);
    while($row = mysqli_fetch_array($result1)) {
      $imageData = $row['picture'];
      header("Content-type:image/png");
      echo $imageData;
      exit;
    }
}
}




 ?>
