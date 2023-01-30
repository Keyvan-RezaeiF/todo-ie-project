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
    <link rel="stylesheet" href="./add_category.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">ToDo</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="../todos.php">Tasks</a></li>
          <li><a href="./add_task.php">Add Task</a></li>
          <li class="active"><a href="#">Add Category</a></li>
          <li><a href="../editInfo.php">Edit User</a></li>
          <li><a href="./authentication/log_out.php">Log Out</a></li>
        </ul>
      </div>
    </nav>

    <h2>Add Category</h2>
    <form action="database/insert_catagory.php" method="POST">
      <br>Name: <input type="text" name="title" class="text-input">
      <br>
      <div class="button-container">
        <input type="submit" value="add Catagory" class="submit-button">
      </div>
    </form>
  </body>
</html>