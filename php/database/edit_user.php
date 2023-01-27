<?php 
    session_start();
    require('database/connect_database.php');
    $username = $_POST['username'];
    $acc_password = $_POST['password'];
    $userID = $_SESSION['userID'];
    echo $status; 
    echo $ID; 
        $sql=" UPDATE Users
        SET username = '" .$username . "' , acc_password = '" .$acc_password . "'
        WHERE userID =  '" .$userID . "'; ";
        if (mysqli_query($con, $sql)) {
            echo "1 Record updated";
        } else {
            echo "Error inserting User: " . mysqli_error($con);
        }
    header('Location: tasks.php');
?>