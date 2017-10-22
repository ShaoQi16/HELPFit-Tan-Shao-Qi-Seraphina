<?php
session_start();
 $username = "";
 $fullname = "";
 $email    = "";
 $level ="";
 $speciality="";
 $user="";

 $con = mysqli_connect('localhost','root','','HELPfit');

 if (isset($_POST['signup'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $fullname = trim(mysqli_real_escape_string($con, $_POST['fullname']));
	  $email = trim(mysqli_real_escape_string($con, $_POST['email']));
	  $password = mysqli_real_escape_string($con, $_POST['password']);
    $user = mysqli_real_escape_string($con, $_POST['user']);
    $level = mysqli_real_escape_string($con, $_POST['level']);
    $speciality = trim(mysqli_real_escape_string($con, $_POST['speciality']));

    $unique_username = mysqli_query($con, "SELECT username FROM user WHERE username='$username'");

    while(mysqli_num_rows($unique_username)){
      echo "<script>
                alert('Username taken. Please try again.');
                location.href='signup.html';
            </script>";exit;
    }

        $sql = "INSERT INTO  user (username, password, fullname, email )
                 VALUES('$username','$password','$fullname','$email')";
        mysqli_query($con, $sql);

        if($user=="Member"){
          $sql2 = "INSERT INTO  member (username, level)
                   VALUES('$username', '$level')";
          mysqli_query($con, $sql2);
        }
        else{
          $sql3 = "INSERT INTO  trainer (username, speciality)
                   VALUES('$username','$speciality')";
          mysqli_query($con, $sql3);
        }
        echo "<script>
                  alert('An account has been made for you. Please log in.');
                  location.href='login.php';
              </script>"; exit;

 }

 if(isset($_POST['login'])){
   $username = mysqli_real_escape_string($con, $_POST['username']);
   $password = mysqli_real_escape_string($con, $_POST['password']);
   $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
   $result = mysqli_query($con, $query);

   if(mysqli_num_rows($result)==1){
      $userlogin = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $username;
      $_SESSION['fullname'] = $fullname;

      echo "<script>
                alert('Successful login.');
                location.href='homepage.php';
            </script>"; exit;
   }
   else{
     echo "<script>
               alert('Wrong username or password combination, please try again.');
               location.href='login.php';
           </script>"; exit;
   }


 }



?>
