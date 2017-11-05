<?php
session_start();
 $username = "";
 $fullname = "";
 $email    = "";
 $level ="";
 $speciality="";
 $user = "";
 $user2="";

 $con = mysqli_connect('localhost','root','','HELPfit');

 if (isset($_POST['signup'])){
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $fullname = trim(mysqli_real_escape_string($con, $_POST['fullname']));
	  $email = trim(mysqli_real_escape_string($con, $_POST['email']));
	  $password = mysqli_real_escape_string($con, $_POST['password']);
    $level = mysqli_real_escape_string($con, $_POST['level']);
    $speciality = trim(mysqli_real_escape_string($con, $_POST['speciality']));
    $user = mysqli_real_escape_string($con, $_POST['user']);
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
        if($user=="Trainer"){
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
   $user2 = mysqli_real_escape_string($con, $_POST['user2']);
   if($user2=="Member"){
     $query = "SELECT * FROM member WHERE username='$username'";
     $result = mysqli_query($con, $query);
     if(mysqli_num_rows($result)==1){
         $query2 = "SELECT * FROM user WHERE username='$username' AND password='$password'";
         $result2 = mysqli_query($con, $query2);
         if(mysqli_num_rows($result2)==1){
           $userlogin = mysqli_fetch_assoc($result2);
           $_SESSION['username'] = $username;
           $_SESSION['fullname'] = $fullname;
           echo "<script>
                    alert('Successful login.');
                    location.href='homepage.php?username=".$username."';
                </script>"; exit;
       }
       else{
         echo "<script>
                   alert('Wrong user type, username or password combination, please try again.');
                   location.href='login.php';
               </script>"; exit;
       }
    }
    else{
      echo "<script>
                alert('Wrong user type, username or password combination, please try again.');
                location.href='login.php';
            </script>"; exit;
    }
  }
  echo "error";
  if($user2=="Trainer"){
    $query3 = "SELECT * FROM trainer WHERE username='$username'";
    $result = mysqli_query($con, $query3);
    if(mysqli_num_rows($result)==1){
        $query4 = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result4 = mysqli_query($con, $query4);
        if(mysqli_num_rows($result4)==1){
          $userlogin = mysqli_fetch_assoc($result4);
          $_SESSION['username'] = $username;
          $_SESSION['fullname'] = $fullname;
          echo "<script>
                   alert('Successful login.');
                   location.href='homepage.php?username=".$username."';
               </script>"; exit;
      }
      else{
        echo "<script>
                  alert('Wrong user type, username or password combination, please try again.');
                  location.href='login.php';
              </script>"; exit;
      }
   }
   else{
     echo "<script>
               alert('Wrong user type, username or password combination, please try again.');
               location.href='login.php';
           </script>"; exit;
   }
 }
 echo "error";
 }



?>
