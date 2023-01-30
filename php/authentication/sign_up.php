<?php
  require('../database/connect_database.php');
  session_start();
  if (isset($_SESSION["signedin"]) && $_SESSION["signedin"] == '1'){
    echo 'already loged';
  }
  // echo isset($_POST['username']);
  // echo isset($_POST['password']);
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    echo $confirm_password;
    if ($password != $confirm_password) {
      echo 'not same pass';
    } else {
      $sql="SELECT * FROM Users where username = '" .$username . "'";
      if (($result=mysqli_query($con,$sql))) {
        if (mysqli_num_rows($result)>0) {
          echo "cant sign up.";
        } else {
          $sql="INSERT INTO Users (username,first_name,last_name, acc_password)
                VALUES
                ('$username','$firstname','$lastname','$password')";
                $sql="SELECT * FROM Users where username = '" .$username . "'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_row($result);

                 $_SESSION['signedin'] = 1;
                 $_SESSION['userID'] =  $row[0];
                 $_SESSION['username'] =  $username;
                 $_SESSION['first_name'] =  $firstname;
                 $_SESSION['last_name'] =  $lastname;
          if (mysqli_query($con, $sql)) {
            header('Location: ../../todos.php');
          } else {
            echo "Error inserting User: " . mysqli_error($con);
          }
        }
      } else {
        echo "Error creating table: " . mysqli_error($con);
      }
      mysqli_close($con);
    }
  }
?>