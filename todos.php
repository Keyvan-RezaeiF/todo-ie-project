<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet"/>
    <title>Document</title>
  </head>
  <body>

    <?php
      include './php/tasks.php';
      include './php/catagories.php';
      echo('
        <p style="display: none;" id="fetched-tasks">' . $tasks . '</p>
        <p style="display: none;" id="fetched-categories">' . $categories . '</p>
      ');
    ?>
    <form class="form" id="form">
      <div>
        <label for="task">Task:</label>
        <input class="text-input" type="text" id="task" name="task" />
      </div>

      <div>
        <label for="categories">Choose a category:</label>
        <div>
          <select class="categories" name="categories" id="categories">
          </select>
        </div>
      </div>

      <div class="button-container">
        <button class="submit-button" type="submit">Add task</button>
      </div>
    </form>

    <div class='categories-container'></div>

    <div class="todos-container"></div>

    <script src="script.js"></script>
  </body>
</html>