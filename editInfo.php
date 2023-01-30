<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Info</title>
    <link rel="stylesheet" href="./editInfoStyle.css">
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
          <li><a href="./php/add_category.php">Add Category</a></li>
          <li class="active"><a href="../editInfo.php">Edit User</a></li>
          <li><a href="./php/authentication/log_out.php">Log Out</a></li>
        </ul>
      </div>
    </nav>

    <?php
      session_start();
      $username = $_SESSION['username'];
      $firstName = $_SESSION['first_name'];
      $lastName = $_SESSION['last_name'];
    ?>

    <form class="form" id="form" method="post" action='./php/database/edit_user.php'>
      <fieldset>
        <legend>Personal Info</legend>
        <div>
          <label for="task">First Name:</label>
          <?php
          echo('
            <input class="text-input" type="text" value="' . $firstName . '" id="task" name="first_name" />
          ');
          ?>
        </div>
        <div>
          <label for="task">Last Name:</label>
          <?php
          echo('
            <input class="text-input" type="text" value="' . $lastName . '" id="task" name="last_name" />
          ');
          ?>
        </div>
      </fieldset>
      <fieldset>
        <legend>Account Info</legend>
        <div>
          <label for="task">Username:</label>
          <?php
          echo('
            <input class="text-input" type="text" value="' . $username . '" id="task" name="username" />
          ');
          ?>
        </div>
        <div>
          <label for="task">Current Password:</label>
          <input class="text-input" type="text" id="task" name="task" />
        </div>
        <div>
          <label for="task">New Password:</label>
          <input class="text-input" type="text" id="task" name="password" />
        </div>
      </fieldset>
      <div class="button-container">
        <button class="submit-button" type="submit">Edit User</button>
      </div>
    </form>

    <script src="./editInfoScript.js"></script>
  </body>
</html>