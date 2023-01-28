<html>
  <head>
    <title>Home</title>
  </head>
  <body>
    <table>
      <?php
        if (!isset($_SESSION)) {
          session_start();
        }
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
          $tasks =  json_encode($emparray);
        }

        $sql = "SELECT username FROM Users where userID ='" .$userID . "'";
        if (($result=mysqli_query($con,$sql))) {
          if (mysqli_num_rows($result)==1) {
            $row=mysqli_fetch_row($result);
            $username = $row[0];
          }
        }
      ?>
    </table>
  </body>
</html>
