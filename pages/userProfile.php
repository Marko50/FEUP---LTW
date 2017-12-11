<?php
  session_start();
  session_regenerate_id(true);
  include_once('topBar.php');
  include_once('../phpUtils/user.php');
  $user_info = getUserInfo($_SESSION['login-user']);
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title> 2du User profile </title>
   </head>
   <body>
     <div>
       <nav>
           <ul class="actions">
              <a href= "createNewTODOlist.php" id="addTodoList" class="ProfileButton"> Create a new 2du List </a><br /><br />
              <a href= "myTODOLists.php" id="addTodoList"  class="ProfileButton"> My 2du Lists </a><br /><br />
             <a href= "editprofilesec.php" id="editprofile"  class="ProfileButton"> Edit my Profile </a> <br /><br />
           </ul>
       </nav>
     </div>
     <div id="accountinformation">
       <h1>User information</h1>
       <table>
           <tr><td> Profile Picture </td><td> <img height="200"  width="200" class="img-item" src="<?php echo $user_info['photoId'] ?>"> </td></tr>
           <tr><td> Username </td><td><?php echo $user_info['username']; ?></td></tr>
           <tr><td> Full Name </td><td><?php  echo $user_info['fullName']; ?> </td></tr>
           <tr><td> Email </td><td><?php echo $user_info['email']; ?></td></tr>
           <tr><td> Birthdate </td><td><?php  echo $user_info['birthdate']; ?></td></tr>
           <tr><td> Gender </td><td><?php  echo $user_info['gender']; ?></td></tr>
        </table>
     </div>
     <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
     <img src="../assets/era11.png" alt="era" class="era1"></a><br/>
   </body>
 </html>
