<?php
  session_start();
  require('../database/connect_database.php');
  $title = $_POST['title'];
  $userID = $_SESSION['userID'];

  $sql="INSERT INTO Catagory (title,userID)
        VALUES
        ('$title','$userID')";
  if (mysqli_query($con, $sql)) {
    echo "1 Record added";
  } else {
    echo "Error inserting User: " . mysqli_error($con);
  }
  header('Location: ..\index.html');
?>