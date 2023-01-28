<?php
  session_start();
  require('database/connect_database.php');
  if (!isset($_SESSION["signedin"]) && $_SESSION["signedin"] != '1') {
    header('Location: index.html');
  }
?>
<html>
  <head>
    <title>Add Category</title>
  </head>
  <body>
    <form action="database/insert_catagory.php" method="POST">
      <br>Title: <input type="text" name="title">
      <br><input type="submit" value="add Catagory">
    </form>
  </body>
</html>