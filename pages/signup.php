<?php include_once 'topBar.php'?>
<!DOCTYPE html>
<html>
  <head>
    <title> TO DO LISTS </title>
    <script src="../js/registValidator.js" defer></script>
    <meta charset="utf-8">
  </head>
  <body>
    <h1> CREATING AN ACCOUNT</h1>
    <div class="registerform">
      <h3> Account information</h3>
      <form action="../phpUtils/register.php" method="post">
        Full Name <input type="text" name="FullName" id="FullName" maxlength="50" required>
        Email <input type="email" name="email" id="email" maxlength="30" required>
        Username <input type="text" name="username" id="username" maxlength="15" required>
        Password <input type="password" name="password" id="password" maxlength="20" required>
        Repeat Password <input type="password" name="password2" id="password2" maxlength="20" required>
        Male <input type="radio" name ="gender" value="Male">
        Female <input type="radio" name ="gender" value="Female">
        Rather Not Say <input type="radio" name ="gender" value="None" checked="checked">
        Birthdate <input type="date" name="birthdate" value="1997-04-09" required>
        <input type="submit" value="Send" >
      </form>
    </div>
    <div id="errors" class="error-forms"role="alert">

    </div>
    <footer>
      Copyright: TODOLists.org
    </footer>
  </body>

</html>
