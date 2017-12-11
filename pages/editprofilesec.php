<?php
  session_start();
  session_regenerate_id(true);
  include_once('topBar.php');
  include_once('../phpUtils/user.php');
  $_SESSION['csrf'] = generate_random_token();

?>

<html>
  <head>
      <title> 2du Edit Profile </title>
      <script src="../js/loginValidator.js" defer></script>
      <meta charset="utf-8">
  </head>
  <body>
    <h3> Credentials </h3>
      <h4>As a security measure you have to enter your credentials again to change any account information.</h4>
      <div class="form">
      <form method="post" action="editprofile.php">
        <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']?>">
        <input type="hidden" name="verify" value="true"/>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" ><br/><br/>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password"><br/><br/>
        <input type="submit" value="Send" class="button" >
      </form>
    </div>
    <br/><br/>
    <img src="../assets/era11.png" alt="era" class="era"></a>
    <div id="errors" class="error-forms" role="alert">
    </div>
    <footer>
      Copyright: TODOLists.org
    </footer>
  </body>
</html>
