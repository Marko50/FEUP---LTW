<?php
  include_once('config.php');
  $email= $_POST['email'];
  global $dbh;
  $stmt = $dbh->prepare('SELECT * FROM user WHERE user.email = ?');
  $stmt->execute(array($email));

  $result = $stmt->fetch();
  if($result == false)
    return "false";
  else return "true";
?>
