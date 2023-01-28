<?php
  session_start();
  require('./database/connect_database.php');
  $id = $_GET['id'];
  $sql="DELETE FROM Catagory where catagoryID = '" .$id . "'";

  mysqli_query($con, $sql);

  header('Location: ../todos.php');
?>