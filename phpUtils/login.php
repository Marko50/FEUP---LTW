<?php
  session_start();
  $username = $_POST['username'];
  $_SESSION['login-user']= $username;
  unset($_SESSION["ERROR"]);

  header("Location: ../pages/index.php");
  exit;
?>
