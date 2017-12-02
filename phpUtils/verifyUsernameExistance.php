<?php
  session_start();
  include_once('../phpUtils/config.php');
  $username= $_POST['username'];
  global $dbh;
  $stmt = $dbh->prepare('SELECT * FROM user WHERE username = ?');
  $stmt->execute(array($username));

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if($result == false)
  {
    echo 'false';
  }
  else {
    if (isset($_SESSION['login-user']) && $_SESSION['login-user'] == $username) {
      echo 'false';
    }
    else {
      echo 'true';
    }
  }
?>
