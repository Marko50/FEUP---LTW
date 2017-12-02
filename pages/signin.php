<?php include_once 'topBar.php'?>

<html>
  <head>
      <title> TO DO LISTS </title>
      <script src="../js/loginValidator.js" defer></script>
      <meta charset="utf-8">
  </head>
  <body>
    <div class="loginform" action="../phpUtils/login.php">
      <h3> Login information</h3>
      <form method="post" action="../phpUtils/login.php">
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
