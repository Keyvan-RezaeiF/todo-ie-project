<?php
  session_start();
  require('../database/connect_database.php');
  if (!isset($_SESSION["signedin"]) && $_SESSION["signedin"] != '1') {
      header('Location: ../../todos.php');
  }
  $username = $_SESSION['username'];
  $userID = $_SESSION['userID'];
  $x = true;
  $sql="SELECT * FROM Task where userID  = '" .$userID  . "' AND done_status = true ";
  if (($result=mysqli_query($con,$sql))){
    while($row=mysqli_fetch_row($result)){
      echo "\n\r";
      echo $row[0];
      echo $row[1];
      echo $row[2];
      echo $row[3];
      echo $row[4];
      echo $row[5];
    }
  } else {
    echo "Error done task: " . mysqli_error($con);
  }
?>