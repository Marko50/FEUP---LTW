<?php
  session_start();
  session_regenerate_id(true);
  include_once('topBar.php');
  include_once('../phpUtils/todoList.php');
  include_once('../phpUtils/user.php');

  $id = $_POST['todolistid'];
  $todolist = gettodolistinfo($id);
  $items = gettodolistitems($id);

  $_SESSION['csrf'] = generate_random_token();
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="../js/additemvalidator.js" defer></script>
    <title> 2du <?php echo $todolist['title']; ?></title>
  </head>
  <body>
    <section class="todolistinformation">
      <h3> <?php echo $todolist['title']; ?> </h3>
      <h4> <?php  echo $todolist['category']; ?><?php  echo "&nbsp"; ?>List  </h4>
      <div class="todolist">
        <?php foreach ($items as $item) {
          echo'<p>';
          if($item['completed'])
          {
            echo '<input type="checkbox" class="checkboxitem" checked value =' . $item['itemID'] . ' > </input>';
            echo 'Completed: ';
          }
          else{
            echo '<input type="checkbox" class="checkboxitem" value =' . $item['itemID'] . ' > </input>';
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
          <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'] ?>">
          <input type="hidden" name="todolistid" id="todolistid" value= "<?php echo $id;?>">
          Task: <input type="text" name="itemtext" id="itemtext" required>
          Due Limit: <input type="date" name ="datelimit" id="datelimit" value="2017-04-09" required>
          <input type="submit" value="Add New Item"class="button5" >
        </form>
      </div>
      <div class="form">
        <form action="myTODOLists.php" method="post">
          <input type="submit" value="Save" class="button2">
        </form>
      </div>
      <div id="errors" class="error-forms"role="alert">
  </body>
</html>
