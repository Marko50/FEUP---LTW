<?php
  session_start();
  include_once('topBar.php');
  include_once('../phpUtils/user.php');
  $_SESSION['csrf'] = generate_random_token();
?>

<html>
  <head>
      <title> LOGIN </title>
      <script src="../js/loginValidator.js" defer></script>
      <meta charset="utf-8">
  </head>
  <body>
    <div class="form" action="../phpUtils/login.php">
      <h3> Login information</h3>
      <form method="post" action="../phpUtils/login.php">
        <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']?>">
        Username <input type="text" name="username" id="username">
        Password <input type="password" name="password" id="password">
        <input type="submit" value="Sign In" >
      </form>
    </div>
    <div id="errors" class="error-forms" role="alert">
    </div>
    <footer>
      Copyright: TODOLists.org
    </footer>
  </body>
</html>
