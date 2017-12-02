<?php
  include_once('../phpUtils/config.php');
  $email= $_POST['email'];
  global $dbh;
  $stmt = $dbh->prepare('SELECT * FROM user WHERE user.email = ?');
  $stmt->execute(array($email));

  $result = $stmt->fetch();
  if($result == false){
    echo 'false';
  }
  else{
    echo 'true';
  }
?>
