<html>
  <head>
    <title>Home</title>
  </head>
  <body>
    <table>
      <?php
        session_start();
        require('database/connect_database.php');
        if (!isset($_SESSION["signedin"]) && $_SESSION["signedin"] != '1'){
          header('Location: index.html');
        }
        $userID = $_SESSION['userID'];
        $sql="SELECT * FROM Task where userID ='" .$userID . "'";
        if (($result=mysqli_query($con,$sql))) {
          $emparray = array();
          while($row=mysqli_fetch_assoc($result)) {
            $emparray[] = $row;
          }
          $test =  json_encode($emparray);
        }
      ?>
    </table>
  </body>
</html>
