<?php
  session_start();
  session_regenerate_id(true);
  include_once ('topBar.php');
  include_once('../phpUtils/user.php');
  $user_todolists = getUserTodoLists($_SESSION['login-user']);
 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>2du My Lists</title>
   </head>
   <body>
      <a href= "createNewTODOlist.php" id="addTodoList" class="ProfileButton"> Create a new 2du List </a>
      <h3> My 2du Lists </h3>
     <div class="todolists">
       <?php
        foreach ($user_todolists as $todolist){
          echo '<section>';
          echo '  <h4>';
          echo $todolist["title"];
          echo '</h4>';
          echo'<section class= "todolistoptions">';
          echo '<form action="todolistoptions.php" method="post">
            <input type="hidden" name="todolistid" value="';
          echo $todolist['todoListID'];
          echo'">';
         echo ' <input type="submit" value="Manage 2du List" class="button">
          </form>';
          echo '<form action="../phpUtils/removelist.php" method="post">
            <input type="hidden" name="todolistid" value="';
          echo $todolist['todoListID'];
          echo'">';
          echo ' <input type="submit" value="Delete" class="button">
          </form>';
          echo '</section>';
          echo'</section>';
        }
      ?>
     </div>
   </body>
 </html>
