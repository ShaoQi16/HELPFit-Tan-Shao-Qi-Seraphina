<?php
$date = $_SESSION['date'];

if(date('Y-m-d') > $date){
  return "review()";
}
else{
  return "noreview()";
}
 ?>
