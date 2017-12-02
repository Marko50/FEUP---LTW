<?php
  include_once('config.php');
  $username= $_POST['username'];
  global $dbh;
  $stmt = $dbh->prepare('SELECT * FROM user WHERE username = ?');
  $stmt->execute(array($username));

  $result = $stmt->fetch();
  if($result == false)
    return "false";
  else return "true";
?>
