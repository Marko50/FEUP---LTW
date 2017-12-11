<?php
  session_start();

  $username = htmlspecialchars($_POST['username']);
  $_SESSION['login-user']= $username;
  unset($_SESSION["ERROR"]);

  header("Location: ../pages/userProfile.php");
  exit;
?>
