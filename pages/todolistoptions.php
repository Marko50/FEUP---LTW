<?php
  session_start();
  include_once ('topBar.php');
  include_once ('../phpUtils/todoList.php');

  $id = $_POST['todolistid'];
  $todolist = gettodolistinfo($id);
  $items = gettodolistitems($id);
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="../js/additemvalidator.js" defer></script>
    <title> TODO LIST OPTIONS </title>
  </head>
  <body>
    <section class="todolistinformation">
      <h3>  Title <?php echo $todolist['title']; ?> </h3>
      <p> Category <?php  echo $todolist['category']; ?> </p>
      <div class="todolist">
        <?php foreach ($items as $item) {
          echo'<p>';
          if($item['completed'])
            echo 'Completed: ';
          else{
            echo 'To do untill ';
            echo $item['limitDate'];
            echo ' : ';
          }
          echo $item['description'];
          echo '</p>';
        } ?>
      </section>
      <div class="form">
        <form>
          <input type="hidden" name="todolistid" id="todolistid" value= "<?php echo $id;?>">
          <input type="text" name="itemtext" id="itemtext" required>
          Due Limit: <input type="date" name ="datelimit" id="datelimit" value="1997-04-09" required>
          <input type="submit" value="Add a new Item!" >
        </form>
      </div>
      <div id="errors" class="error-forms"role="alert">

      </div>
      <p> Likes <?php echo $todolist['likes'];  ?> </p>
    </div>
  </body>
</html>
