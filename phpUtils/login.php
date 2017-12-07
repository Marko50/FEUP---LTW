<?php
  session_start();
  
  if ($_SESSION['csrf'] != $_POST['csrf']) {
    die("ERROR: Request does not appear to be legitimate");
  }
  $username = htmlspecialchars($_POST['username']);
  $_SESSION['login-user']= $username;
  unset($_SESSION["ERROR"]);

  header("Location: ../pages/index.php");
  exit;
?>
