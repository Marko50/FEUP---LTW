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
    <title> TODO LIST OPTIONS </title>
  </head>
  <body>
    <h1> LAMA TOES</h1>
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
            echo ' :';
          }
          echo $item['desciption'];
          echo '</p>';
        } ?>
      </section>
      <div class="form">
        <form action="../phpUtils/additem.php" method="post">
          <input type="text" id="itemtext" required>
          Due Limit: <input type="date" id="datelimit" value="1997-04-09" required>
          <input type="submit" value="Sign Up" >
        </form>
      </div>
      <div id="errors" class="error-forms"role="alert">

      </div>
      <p> Likes <?php echo $todolist['likes'];  ?> </p>
    </div>
    <div class="form">
      <form action="" method="post">
        <input type="text" name="itemtext" required/>
      </form>
    </div>
  </body>
</html>
