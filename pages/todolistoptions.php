<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="../assets/miniIcon.png" type="image/png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/additemvalidator.js" defer></script>
    <title> 2du My List</title>
  </head>

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
  <body>
    <h3> <?php echo $todolist['title']; ?> </h3>
    <h4> <?php  echo $todolist['category']; ?><?php  echo "&nbsp"; ?>List  </h4>
    <section class="todolist">
        <?php foreach ($items as $item) {
          echo'<p class="item">';
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
          <input type="hidden" name="csrf" id="csrf" value="<?php echo $_SESSION['csrf'] ?>">
          <input type="hidden" name="todolistid" id="todolistid" value= "<?php echo $id;?>">
          Task: <input type="text" name="itemtext" id="itemtext" required><br/>
          Due Limit: <input type="date" name ="datelimit" id="datelimit" value="2017-04-09" required>
        <br/><br/><br/>
          <input type="submit" value="Add New Item"class="button" >
        </form>
        <form action="myTODOLists.php" method="post">
          <br/><br/><br/><br/>
          <input type="submit" value="Save" class="button">
        </form>
      </div>
      <div id="errors" class="error-forms"role="alert">
  </body>
</html>
