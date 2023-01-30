
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
  require('../database/connect_database.php');
  session_start();
  if (isset($_SESSION["signedin"]) && $_SESSION["signedin"] == '1'){
    echo 'already loged';
    header('Location: ../../todos.php');
  }
  // echo isset($_POST['username']);
  // echo isset($_POST['password']);
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if ($password != $confirm_password) {
      echo '<p>the password and confrim password must be equal!</p>';
          echo "<button><a href='sign_up.html'>Back to Sign Up page</a></button>";
    } else {
      $sql="SELECT * FROM Users where username = '" .$username . "'";
      if (($result=mysqli_query($con,$sql))) {
        if (mysqli_num_rows($result)>0) {
          echo '<p>There is already a User with this Incredentials!</p>';
          echo "<button><a href='sign_up.html'>Back to Sign Up page</a></button>";
        } else {
                $sql="INSERT INTO Users (username,first_name,last_name, acc_password)
                VALUES
                ('$username','$firstname','$lastname','$password')";
                mysqli_query($con,$sql);
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
                  echo '<p>the user wast added correctly Tadd againl!</p>';
                  echo "<button><a href='sign_up.html'>Back to Sign Up page</a></button>";
                }
        }
      } else {
        echo '<p>There was a problem at Server, Try again later!</p>';
          echo "<button><a href='sign_up.html'>Back to Sign Up page</a></button>";
      }
      mysqli_close($con);
    }
  }
?>
  </div>
</body>
</html>