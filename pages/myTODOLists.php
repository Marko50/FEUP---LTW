<?php
  session_start();
  include_once ('topBar.php');
  include_once('../phpUtils/user.php');
  $user_todolists = getUserTodoLists($_SESSION['login-user']);
 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>MY TODO LISTS</title>
   </head>
   <body>
     <h1> All of My Todo Lists </h1>
     <div id="todolists">
       <?php
        foreach ($user_todolists as $todolist){
          echo '<section class="todolist">
              <h3 > $todolist["title"] </h3>
              <aside>';
          echo $todolist["category"];
          echo '</aside>
              <p> THINGS </p>
              <footer>';
          echo $todolist["likes"];
          echo' likes
              </footer>
          </section>';
        }
      ?>
     </div>
   </body>
 </html>
