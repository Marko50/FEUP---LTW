<?php
  session_start();
  session_regenerate_id(true);
  include_once('topBar.php');
  include_once('../phpUtils/user.php');
  $_SESSION['csrf'] = generate_random_token();
?>

<html>
  <head>
      <title> 2du Login </title>
      <script src="../js/loginValidator.js" defer></script>
      <meta charset="utf-8">
  </head>
  <body>
    <h3>Login Information</h3>
    <div class="form" action="../phpUtils/login.php">
      <form method="post" action="../phpUtils/login.php">
        <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username"><br /><br />
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br /><br />
        <input type="submit" value="Sign In" class="button">
      </form>
      <br/><br/>
      <img src="../assets/era11.png" alt="era" class="era"></a>
    </div>
    <div id="errors" class="error-forms" role="alert">
    </div>
  </body>
</html>
