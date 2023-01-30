<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../database/insert_task.css">
  <title>Error page</title>
</head>
<body>
  <div>
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
              echo '<p>Error occured in login! Pleasr try again!</p>';
              echo "<button><a href='log_in.html'>Back to Login page</a></button>";
            }
          } else {
            echo '<p>Please fill in all the fields!</p>';
            echo "<button><a href='log_in.html'>Back to Login page</a>";
          }
        } else {
          echo '<p>Error occured in login! Pleasr try again!</p>';
          echo "<button<a href='log_in.html'>Back to Login page</a></button";
        }
      } else {
        echo '<p>Please fill in all the fields</p>';
        echo "<button<a href='log_in.html'>Back to Login page</a></button";
      }
    ?>
  </div>
</body>
</html>