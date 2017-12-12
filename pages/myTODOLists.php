


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="icon" href="../assets/miniIcon.png" type="image/png"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>2du My Lists</title>
   </head>
   <?php
     session_start();
     session_regenerate_id(true);
     include_once ('topBar.php');
     include_once('../phpUtils/user.php');
     $user_todolists = getUserTodoLists($_SESSION['login-user']);
    ?>
   <body>
     <ul class="actions">
      <a href= "createNewTODOlist.php" id="addTodoList" class="ProfileButton"> New 2du List </a>
    </ul>
    <br/><br/><br/><br/>
      <h3> My 2du Lists </h3>
     <div class="todolists">
       <?php
        foreach ($user_todolists as $todolist){
          echo '<section>';
          echo '  <h4>';
          echo $todolist["title"];
          echo '</h4>';
          echo'<section >';
          echo '<form action="todolistoptions.php" method="post">
            <input type="hidden" name="todolistid" value="';
          echo $todolist['todoListID'];
          echo'">';
         echo ' <input type="submit" value="Manage 2du List" class="button">
          </form>';

          echo"<br><br><br>";
          echo '<form action="../phpUtils/removelist.php" method="post">
            <input type="hidden" name="todolistid" value="';
          echo $todolist['todoListID'];
          echo'">';
          echo ' <input type="submit" value="Delete" class="button">
          </form>';
          echo '</section>';
          echo"<br><br><br>";
          echo'<img src="../assets/era11.png" alt="era" class="era1"></a>';
          echo'</section>';

        }
      ?>
     </div>
   </body>
 </html>
