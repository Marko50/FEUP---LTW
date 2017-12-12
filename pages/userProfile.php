

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="icon" href="../assets/miniIcon.png" type="image/png"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> 2du User profile </title>
   </head>

   <?php
     session_start();
     session_regenerate_id(true);
     include_once('topBar.php');
     include_once('../phpUtils/user.php');
     $user_info = getUserInfo($_SESSION['login-user']);
    ?>
   <body>
     <div>
       <nav>
           <ul class="actions">
              <a href= "createNewTODOlist.php" id="addTodoList" class="ProfileButton"> New 2du List </a>
              <a href= "myTODOLists.php" id="addTodoList"  class="ProfileButton"> My 2du Lists </a>
             <a href= "editprofilesec.php" id="editprofile"  class="ProfileButton"> Edit my Profile </a>
           </ul>
       </nav>
     </div>
     <div id="accountinformation">
       <br/><br/><br/><br/>
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
     <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
     <img src="../assets/era11.png" alt="era" class="era1"></a><br/>
   </body>
 </html>
