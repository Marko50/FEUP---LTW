<!DOCTYPE html>
<html>
  <head>
    <title> TO DO LISTS </title>
    <meta charset="utf-8">
  </head>
  <body>
    <?php include_once 'topBar.php'?>
    <h1> CREATING AN ACCOUNT</h1>
    <div>
      <h3> Account information</h3>
      <form action = "../phpUtils/register.php" method="post">
        Full Name <input type="text" name="Full name">
        Email <input type="email" name="email" >
        Username <input type="text" name="username">
        Password <input type="password" name="password">
        Male <input type="radio" name ="gender" value="Male">
        Female <input type="radio" name ="gender" value="Female">
        Rather Not Say <input type="radio" name ="gender" value="None" checked="checked">
        Birthdate <input type="date" value="1997-04-09">
        <input type="submit" value="Send">
      </form>
    </div>
    <footer>
      Copyright: TODOLists.org
    </footer>
  </body>

</html>
