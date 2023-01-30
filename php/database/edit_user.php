<?php
    session_start();
    require('connect_database.php');
    $username = $_POST['username'];
    $acc_password = $_POST['password'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $userID = $_SESSION['userID'];
    if ($acc_password == '') {
        $sql=" UPDATE Users
        SET username = '" .$username . "' , first_name = '" .$firstname . "',last_name = '" .$lastname . "'
        WHERE userID =  '" .$userID . "'; ";
    } else {
        $sql=" UPDATE Users
        SET username = '" .$username . "' , acc_password = '" .$acc_password . "' , first_name = '" .$firstname . "',last_name = '" .$lastname . "'
        WHERE userID =  '" .$userID . "'; ";
    }

        if (mysqli_query($con, $sql)) {
            echo "1 Record updated";
        } else {
            echo "Error inserting User: " . mysqli_error($con);
        }
    header('Location: ../../todos.php');
?>