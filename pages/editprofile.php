

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="icon" href="../assets/miniIcon.png" type="image/png"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="../js/registValidator.js" defer></script>
     <script src="../js/fileUpload.js" defer ></script>
     <title> 2du Edit Profile </title>
   </head>
   <?php
       if(!isset($_POST['verify'])){
         header("Location: editprofilesec.php");
       }
       session_start();
       session_regenerate_id(true);
       include_once ('topBar.php');
       include_once ('../phpUtils/user.php');
       $user_info = getUserInfo($_SESSION['login-user']);
       $_SESSION['csrf'] = generate_random_token();
    ?>
   <body>
     <h3> Editing profile</h3>
     <div class="form">
       <form action="../phpUtils/edituserprofile.php" method="post">
         <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'] ?>">
         Full Name <input type="text" name="FullName" value="<?php echo $user_info['fullName'] ?>" id="FullName" maxlength="50" required><br/><br/>
         Email <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;" ?><input type="email" name="email" value="<?php echo $user_info['email'] ?>" id="email" maxlength="30" required>
         <input type="hidden" name="username" value="<?php echo $user_info['username'] ?>" id="username" maxlength="15" required><br/><br/>
         Password <?php echo "&nbsp;" ?><input type="password" name="password" id="password" maxlength="20" required><br/><br/>
         Repeat Password <input type="password" name="password2" id="password2" maxlength="20" required><br/><br/>
         Male <input type="radio" name ="gender" value="Male">
         Female <input type="radio" name ="gender" value="Female">
         Rather Not Say <input type="radio" name ="gender" value="None" checked="checked"><br/><br/>
         Birthdate <input type="date" name="birthdate" value="<?php echo $user_info['birthdate'] ?>" required><br/><br/>
         <input type="submit" value="Change" class="button">
       </form>
     </div>
     <br />
     <br />
     <br />
     <div class="form">
       <form action="../phpUtils/insertUserPhoto.php" method="post" enctype="multipart/form-data">
         <input type="hidden" name="csrf" id="csrf" value="<?php echo $_SESSION['csrf']; ?>"/>
         <input type="file" name="photoId" id="photoId" value="Select image to upload:"  ><br/>
         <input type="submit" value="Upload Image" name="submit" >
       </form><br/><br/>
     </div>
     <div id="errors" class="error-forms"role="alert">

     </div>
   </body>
 </html>
