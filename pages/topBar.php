<?php
    include_once('config.php');
  ?>
<html>
<head>
  <div class ="header">
    <div class="LoginAndRegister">
      <?php
           if (isset($_SESSION['login-user'])) {
               echo '<a href= "userProfile.php" id="profile"> user </a>';
               echo '<a href= "../phpUtils/logout.php" id="logout"> logout </a>';
           } else {
               echo '<a href= "signin.php" id="login"> Login </a>';
               echo '<a href= "signup.php" id="register"> Register </a>';
           }
      ?>
    </div>
    <div class="menu">
      <nav>
        <ul>
          <li> <a href= "index.php">  home</a></li>
          <li> <a href= "example.php"> Example of a TODO List </a></li>
          <li> <a href= "search.php"> Search TODO Lists </a> </li>
        </ul>
      </nav>
    </div>
  </div>
</head>
<body>

</body>
</html>
