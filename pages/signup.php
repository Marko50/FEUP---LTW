<?php
  session_start();
  session_regenerate_id(true);
  include_once('topBar.php');
  include_once('../phpUtils/user.php');
  $_SESSION['csrf'] = generate_random_token();
?>
<!DOCTYPE html>
<html>
  <head>
    <title> 2du New Account </title>
    <script src="../js/registValidator.js" defer></script>
    <meta charset="utf-8">
  </head>
  <body>
    <h3> Creating an Account</h3>
    <div class="form">
      <form action="../phpUtils/register.php" method="post">
        <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'] ?>">
        Full Name <input type="text" name="FullName" id="FullName" maxlength="50" required><br /><br />
        Email <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;" ?><input type="email" name="email" id="email" maxlength="30" required><br /><br />
        Username <?php echo "&nbsp;" ?><input type="text" name="username" id="username" maxlength="15" required><br /><br />
        Password <?php echo "&nbsp;" ?><input type="password" name="password" id="password" maxlength="20" required><br /><br />
        Repeat Password <input type="password" name="password2" id="password2" maxlength="20" required><br /><br />
        Male <input type="radio" name ="gender" value="Male"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;" ?>
        Female <input type="radio" name ="gender" value="Female"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;" ?>
        Rather Not Say <input type="radio" name ="gender" value="None" checked="checked"><br /><br />
        Birthdate <input type="date" name="birthdate" value="1997-04-09" required><br /><br />
        <input type="submit" value="Sign Up" class="button2" >
      </form>
      <br/><br/>
      <img src="../era11.png" alt="era" class="era"></a>
    </div>
    <div id="errors" class="error-forms"role="alert">

    </div>
  </body>

</html>
