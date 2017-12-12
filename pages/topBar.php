<?php
    include_once('../phpUtils/config.php');
  ?>

  <div class ="header">
    <div class="LoginAndRegister" style="color:#000000">
      <link rel="icon" href="../assets/miniIcon.png" type="image/png">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="../css/style.css" rel="stylesheet" >
      <?php
           if (isset($_SESSION['login-user'])) {
               echo '<a href= "userProfile.php" id="profile" class="LoginBut"> User </a>';
               echo '<a href= "../phpUtils/logout.php" id="logout" class="RegisterBut"> Logout </a>';
           } else {
               echo '<a href= "signin.php" id="login" class="LoginBut"> Login </a>';
               echo '<a href= "signup.php" id="register" class="RegisterBut"> Register </a>' ;
           }
      ?>
    </div>
    <a href="index.php" >
      <img src="../assets/icon.png" alt="icon" class="icon"></a>
    <div class="menu">
      <nav>
        <ul>
          <a href= "index.php">  Home</a>
          <a href= "search.php"> Search</a>
          <a href="howto.php"> Info</a>
        </ul>
      </nav>
    </div>
  </div>
