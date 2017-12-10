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
     <h3> My 2du Lists </h3>
     <div class="todolists">
       <?php
        foreach ($user_todolists as $todolist){
          echo '<section class="todolist">';
          echo '  <h4>';
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          echo $todolist["title"];
          echo "&nbsp;-&nbsp;";
          echo $todolist["category"];
          echo "&nbsp;list";
          echo '</h4>';
          echo '<form action="todolistoptions.php" method="post">
            <input type="hidden" name="todolistid" value="';
          echo $todolist['todoListID'];
          echo'">';
         echo ' <input type="submit" value="Manage 2du List" class="button3">
          </form>';
          echo '<form action="../phpUtils/removelist.php" method="post">
            <input type="hidden" name="todolistid" value="';
          echo $todolist['todoListID'];
          echo'">';
          echo ' <input type="submit" value="Delete" class="buttonDelete"> <img src="../era11.png" alt="icon" class="era">
          </form>';
          echo'</section>';
        }
        echo'<a href= "createNewTODOlist.php" id="addTodoList" class="ProfileButton"> Create a new 2du List </a><br /><br />';
      ?>
     </div>
   </body>
 </html>
