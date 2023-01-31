<html>
  <head>
    <title>Home</title>
  </head>
  <body>
    <table>
      <?php
        require('database/connect_database.php');
        if (!isset($_SESSION["signedin"]) && $_SESSION["signedin"] != '1'){
          header('Location: ../todo-ie-project/php/authentication/log_in.html');
        }
        $userID = $_SESSION['userID'];
        $sql="SELECT * FROM Catagory where userID ='" .$userID . "'";
        if (($result=mysqli_query($con,$sql))) {
          $emparray = array();
          while($row=mysqli_fetch_assoc($result)) {
            $emparray[] = $row;
          }
          $categories =  json_encode($emparray);
        }
      ?>
    </table>
  </body>
</html>
