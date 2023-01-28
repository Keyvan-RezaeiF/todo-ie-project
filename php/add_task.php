<?php
  session_start();
  require('database/connect_database.php');
  if (!isset($_SESSION["signedin"]) && $_SESSION["signedin"] != '1') {
    header('Location: index.html');
  }
?>
<html>
  <head>
    <title>Log In</title>
  </head>
  <body>
    <form action="database\insert_task.php" method="POST">
      <br>Title: <input type="text" name="title">
      <br>start_date: <input type="date" name="start_date">
      <br>due_date: <input type="date" name="due_date">
      <br><input type="submit" value="add Task">
    </form>
  </body>
</html>