<?php
  $email= $_POST['email'];
  $dbh = new PDO('sqlite:../database/todolists.db');
  $stmt = $dbh->prepare('SELECT * FROM user WHERE user.email = ?');
  $stmt->execute(array($email));

  $result = $stmt->fetch();
  if($result == false)
    return "false";
  else return "true";
?>
