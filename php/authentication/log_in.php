<?php
  session_start();
  require('../database/connect_database.php');
  if (isset($_SESSION["signedin"]) && $_SESSION["signedin"] == '1') {
    echo 'already loged';
  }
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $acc_password = $_POST['password'];
    $sql="SELECT * FROM Users where username = '" .$username . "'";
    if (($result=mysqli_query($con, $sql))) {
      if (mysqli_num_rows($result)==1) {
        $row=mysqli_fetch_row($result);
        print_r($row);

        if (!empty($username) && !empty($acc_password) && $username == $row[1] && $acc_password == $row[2]) {
          $_SESSION['signedin'] = 1;
          $_SESSION['userID'] =  $row[0];
          $_SESSION['username'] =  $row[1];
          $_SESSION['first_name'] =  $row[2];
          $_SESSION['last_name'] =  $row[3];
          header('Location: ../../todos.php');
        } else {
          $error = 'Enter username and password';
          header('Location: log_in.html?error='.$error.' ');
        }
      } else {
        $error = 'Enter username and password';
        header('Location: log_in.html?error='.$error.' ');
      }
    } else {
        $error = 'NO RECORD';
        header('Location: log_in.html?error='.$error.' ');
    }
  } else {
    $error = 'fields are filled ';
          header('Location: log_in.html?error='.$error.' ');
  }
?>