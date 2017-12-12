<?php
  session_start();
  include_once('user.php');
  if ($_SESSION['csrf'] != $_POST['csrf']) {
    die("ERROR: Request does not appear to be legitimate");
  }

  $_SESSION['csrf'] = generate_random_token();
  $username = htmlspecialchars($_POST['username']);
  $_SESSION['login-user']= $username;
  unset($_SESSION["ERROR"]);

  header("Location: ../pages/userProfile.php");
  exit;
?>
