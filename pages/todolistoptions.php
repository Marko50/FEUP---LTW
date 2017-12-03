<?php
  session_start();
  include_once ('topBar.php');
  include_once ('../phpUtils/todoList.php');

  $id = $_POST['todolistid'];
  $todolist = gettodolistinfo($id);
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> TODO LIST OPTIONS </title>
  </head>
  <body>

  </body>
</html>
