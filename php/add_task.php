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
    <link rel="stylesheet" href="./add_task.css">
  </head>
  <body>
    <?php
      include './tasks.php';
      include './catagories.php';
      echo('
        <p style="display: none;" id="fetched-categories">' . $categories . '</p>
      ');
    ?>
    <form action="database/insert_task.php" method="POST">
      <div>
        <label for="task">Title:</label>
        <input class="text-input" type="text" id="task" name="title" />
      </div>
      <div>
        <label for="categories">Choose a category:</label>
        <select class="categories" name="categories" id="categories">
        </select>
      </div>
      <br>start_date: <input type="date" name="start_date">
      <br>due_date: <input type="date" name="due_date">
      <div class="button-container">
        <button class="submit-button" type="submit" value="add Task">Add task</button>
      </div>
    </form>

    <script src='./add_task.js'></script>
  </body>
</html>