<?php
  session_start();
  require('database/connect_database.php');
  $status = $_GET['status'];
  $ID = $_GET['id'];
  echo $status;
  echo $ID;

  if ($status == 0) {
    $status = 1;
  } else if ($status == 1) {
    $status = 0;
  }

  $sql=" UPDATE Task
  SET done_status = '" .$status . "'
  WHERE taskID =  '" .$ID . "'; ";
  if (mysqli_query($con, $sql)) {
      echo "1 Record added";
  } else {
      echo "Error inserting User: " . mysqli_error($con);
  }
  header('Location: ../todos.php');
?>