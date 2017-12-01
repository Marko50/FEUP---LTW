
<?php
  $username= $_POST['username'];
  $dbh = new PDO('sqlite:../database/todolists.db');
  $stmt = $dbh->prepare('SELECT * FROM user WHERE username = ?');
  $stmt->execute(array($username));

  $result = $stmt->fetch();
  if($result == false)
    return "false";
  else return "true";
?>
