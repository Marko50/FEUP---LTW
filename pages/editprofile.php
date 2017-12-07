<?php
    session_start();
    include_once ('topBar.php');
    include_once ('../phpUtils/user.php');
    $user_info = getUserInfo($_SESSION['login-user']);
    $_SESSION['csrf'] = generate_random_token();
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <script src="../js/registValidator.js" defer></script>
     <title> Edit Profile </title>
   </head>
   <body>
     <h1> EDITING PROFILE</h1>
     <div class="form">
       <h3> Account information</h3>
       <form action="../phpUtils/edituserprofile.php" method="post">
         <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'] ?>">
         Full Name <input type="text" name="FullName" value="<?php echo $user_info['fullName'] ?>" id="FullName" maxlength="50" required>
         Email <input type="email" name="email" value="<?php echo $user_info['email'] ?>" id="email" maxlength="30" required>
         <input type="hidden" name="username" value="<?php echo $user_info['username'] ?>" id="username" maxlength="15" required>
         Password <input type="password" name="password" id="password" maxlength="20" required>
         Repeat Password <input type="password" name="password2" id="password2" maxlength="20" required>
         Male <input type="radio" name ="gender" value="Male">
         Female <input type="radio" name ="gender" value="Female">
         Rather Not Say <input type="radio" name ="gender" value="None" checked="checked">
         Birthdate <input type="date" name="birthdate" value="<?php echo $user_info['birthdate'] ?>" required>
         <input type="submit" value="Change" >
       </form>
     </div>
     <div id="errors" class="error-forms"role="alert">

     </div>
   </body>
 </html>
