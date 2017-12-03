<?php
  session_start();
  include_once ('topBar.php');
  include_once ('../phpUtils/user.php');
  $user_info = getUserInfo($_SESSION['login-user']);
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title> User profile </title>
     <div>
       <nav>
         <aside>
           <ul>
             <li> <a href= "createNewTODOlist.php" id="addTodoList"> Create a new TODO List </a></li>
             <li> <a href= "myTODOLists.php" id="addTodoList"> My TODO Lists </a></li>
             <li><a href= "editprofilesec.php" id="editprofile"> Edit my Profile </a> </li>
           </ul>
         </aside>
       </nav>
     </div>
   </head>
   <body>
     <div id="accountinformation">
       <p>  Username <?php echo $user_info['username']; ?> </p>
       <p> Full Name <?php  echo $user_info['fullName']; ?> </p>
       <p> Email <?php echo $user_info['email'];  ?> </p>
       <p> Birthdate <?php  echo $user_info['birthdate']; ?> </p>
       <p> Gender <?php  echo $user_info['gender']; ?> </p>
     </div>

     <footer>
       Copyright: TODOLists.org
     </footer>
   </body>
 </html>
