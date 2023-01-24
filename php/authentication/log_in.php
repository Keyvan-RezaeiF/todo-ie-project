<?php
    session_start();
    require('../database/connect_database.php');
    if (isset($_SESSION["signedin"]) && $_SESSION["signedin"] == '1'){
        echo 'already loged';
        

    }
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $acc_password = $_POST['password'];
        $sql="SELECT * FROM Users where username = '" .$username . "'";
        if (($result=mysqli_query($con,$sql))){
            if(mysqli_num_rows($result)==1){
                $row=mysqli_fetch_row($result);

                if (!empty($username) && !empty($acc_password) && $username == $row[1] && $acc_password == $row[2]) {
                    $_SESSION['signedin'] = 1;
                    $_SESSION['username'] =  $row[0];
                    header('Location: ../index.html');
                    echo 'Loged In.'; 
                }    
            }else{
                echo 'You must enter a correct username and password.'; 
            }                             
        }else
        {
        echo "Error Inserting table: " . mysqli_error($con);
        }
    }
?>