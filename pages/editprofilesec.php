<?php
  session_start();
  include_once 'topBar.php'

?>

<html>
  <head>
      <title> TO DO LISTS </title>
      <script src="../js/loginValidator.js" defer></script>
      <meta charset="utf-8">
  </head>
  <body>
    <div class="form">
      <h3> CREDENTIALS </h3>
      <P> As a security manager you have to enter your credentials again to change any account information!</P>
      <form method="post" action="editprofile.php">
        Username <input type="text" name="username" id="username">
        Password <input type="password" name="password" id="password">
        <input type="submit" value="Send" >
      </form>
    </div>
    <div id="errors" class="error-forms" role="alert">
    </div>
    <footer>
      Copyright: TODOLists.org
    </footer>
  </body>
</html>
