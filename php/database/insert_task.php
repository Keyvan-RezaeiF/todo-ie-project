<?php 
    session_start();
    require('../database/connect_database.php');
    $title = $_POST['title'];
    $start_date = $_POST['start_date'];
    $due_date = $_POST['due_date'];
    $done_status = false;
    $username = $_SESSION['username'];
    $sql="SELECT * FROM Users where username = '" .$username . "'";
    if (($result=mysqli_query($con,$sql))){
        $row=mysqli_fetch_row($result);
        $sql="INSERT INTO Task (title,start_time,due_time,done_status,userID)
        VALUES
        ('$title','$start_date','$due_date','$done_status','$row[1]')";
        if (mysqli_query($con, $sql)) {
            echo "1 Record added";
        } else {
            echo "Error inserting User: " . mysqli_error($con);
        }
    }
    header('Location: ..\index.html');
    
?>