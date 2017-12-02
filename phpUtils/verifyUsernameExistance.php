<?php
  include_once('../phpUtils/config.php');
  $username= $_POST['username'];
  global $dbh;
  $stmt = $dbh->prepare('SELECT * FROM user WHERE username = ?');
  $stmt->execute(array($username));

  $result = $stmt->fetch();
  if($result == false)
  {
    echo 'false';
  }
  else {
    echo 'true';
  }
?>
