<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./insert_task.css">
  <title>Error page</title>
</head>
<body>
  <div>
    <?php
      session_start();
      require('../database/connect_database.php');
      $title = $_POST['title'];
      $start_date = $_POST['start_date'];
      $due_date = $_POST['due_date'];
      $done_status = 0;
      $catagoryID = $_POST['categories'];
      $username = $_SESSION['username'];
      $today = date("Y-m-d") ;
      if ($start_date < $today || $due_date < $today) {
        echo '<p>! Entered date must not set before today !</p>';
        echo "<button><a href='../add_task.php'>Back to Add task page</a></button>";
      } else if ($due_date < $start_date) {
        echo '<p>! Due date must not set before start date !</p>';
        echo "<button><a href='../add_task.php'>Back to Add task page</a></button>";
      } else {
        $sql="SELECT * FROM Users where username = '" .$username . "'";
        if (($result=mysqli_query($con,$sql))) {
          $row=mysqli_fetch_row($result);
          $sql="INSERT INTO Task (title,start_time,due_time,done_status,userID,catagoryID)
          VALUES
          ('$title','$start_date','$due_date','$done_status','$row[0]','$catagoryID')";
          if (mysqli_query($con, $sql)) {
            echo "1 Record added";
          } else {
            echo "<p>Error occured</p>";
            echo "<button><a href='../add_task.php'>Back to Add task page</a></button>";
          }
        }
        header('Location: ../../todos.php');
      }
    ?>
  </div>
</body>
</html>