
<!DOCTYPE html>
<html>
  <head>
    <title> 2du New Account </title>
    <script src="../js/registValidator.js" defer></script>
    <link rel="icon" href="../assets/miniIcon.png" type="image/png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
  </head>

  <?php
    session_start();
    session_regenerate_id(true);
    include_once('topBar.php');
    include_once('../phpUtils/user.php');
    $_SESSION['csrf'] = generate_random_token();
  ?>
  <body>
    <h3> Creating an Account</h3>
    <div class="form">
      <form action="../phpUtils/register.php" method="post">
        <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf'] ?>">
        <label for="FullName">Full Name:</label>
        <input type="text" name="FullName" id="FullName" maxlength="50" required><br /><br />
        <label for="email">Email:</label>
        <?php echo "&nbsp;&nbsp;&nbsp;&nbsp;" ?><input type="email" name="email" id="email" maxlength="30" required><br /><br />
        <label for="username">Username:</label>
        <?php echo "&nbsp;" ?><input type="text" name="username" id="username" maxlength="15" required><br /><br />
        <label for="password">Password:</label>
        <?php echo "&nbsp;" ?><input type="password" name="password" id="password" maxlength="20" required><br /><br />
        <label for="password2">Repeat Password:</label>
        <input type="password" name="password2" id="password2" maxlength="20" required><br /><br />
        <label for="genderMale"> Male </label>
        <input type="radio" id="genderMale" name ="gender" value="Male"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;" ?>
        <label for="genderFermale"> Female </label>
        <input type="radio" id="genderFemale" name ="gender" value="Female"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;" ?>
        <label for="genderNeutral"> Rather not Say </label>
        <input type="radio" id="genderNeutral" name ="gender" value="None" checked="checked"><br /><br />
        <label for="birthdate"> Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate" value="1997-04-09" required><br /><br />
        <input type="submit" value="Sign Up" class="button" >
      </form>
      <br/><br/>
    </div>
    <div id="errors" class="error-forms"role="alert">

    </div>
  </body>

</html>
