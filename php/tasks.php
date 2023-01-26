
<html>

<head>

    <title>home</title>

</head>

<body>
<a href="index.html"><button>index</button></a>
<table>
    <tr>
        <th>Title</th>
        <th>Start Date</th>
        <th>Due Date</th>
        <th>Task Status</th>
    </tr>
    <?php
    session_start();
        require('database/connect_database.php');
        if (!isset($_SESSION["signedin"]) && $_SESSION["signedin"] != '1'){
            header('Location: index.html');
        }
        $userID = $_SESSION['userID'];
        $sql="SELECT * FROM Task where userID ='" .$userID . "'";
        if (($result=mysqli_query($con,$sql)))
        {
            while($row=mysqli_fetch_row($result)){
                $x = ! $row[4];
                        echo "<th>'" . $row[1] ."'</th>";
                        echo "<th>'" . $row[2] ."'</th>";
                        echo "<th>'" . $row[3] ."'</th>";
                        echo "<th>'" . $row[4] ."' <a href='update_status.php?id=$row[0]&status=$x'><button>change status</button></a></th>";
            }      
        }
    ?>
</table>
</body>
</html>