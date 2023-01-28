<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">ToDo</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Tasks</a></li>
          <li><a href="./php/add_task.php">Add Task</a></li>
          <li><a href="./php/add_category.php">Add Category</a></li>
          <li><a href="#">Edit User</a></li>
          <li><a href="./php/authentication/log_out.php">Log Out</a></li>
        </ul>
      </div>
    </nav>

    <?php
      include './php/tasks.php';
      include './php/catagories.php';
      echo('
        <p style="display: none;" id="fetched-tasks">' . $tasks . '</p>
        <p style="display: none;" id="fetched-categories">' . $categories . '</p>
        <h1 style="text-align: center">Hello, ' . $username . '!</h1>
      ');
    ?>

    <div class="button-container">
      <a href='./php/add_task.php'>
        <button class="submit-button" type="submit">Add task</button>
      </a>
    </div>

    <div class='categories-container'></div>

    <div class="todos-container"></div>

    <script src="script.js"></script>
  </body>
</html>