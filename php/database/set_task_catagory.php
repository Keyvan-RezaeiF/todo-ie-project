<?php 
    session_start();
    require('database/connect_database.php');
    $catagoryID = $_GET['catagory'];
    $ID = $_GET['id'];
    echo $status; 
    echo $ID; 
        $sql=" UPDATE Task
        SET catagoryID = '" .$catagoryID . "'
        WHERE taskID =  '" .$ID . "'; ";
        if (mysqli_query($con, $sql)) {
            echo "1 Record added";
        } else {
            echo "Error inserting User: " . mysqli_error($con);
        }
    //header('Location: tasks.php');
?>