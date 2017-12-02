<?php
  session_start();
  include_once('../phpUtils/config.php');
  $email= $_POST['email'];
  global $dbh;
  $stmt = $dbh->prepare('SELECT * FROM user WHERE user.email = ?');
  $stmt->execute(array($email));

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if($result == false){
    echo 'false';
  }
  else{
    if (isset($_SESSION['login-user']) && $_SESSION['login-user'] == $result['username']) {
      echo 'false';
    }
    else {
      echo 'true';
    }
  }
?>
