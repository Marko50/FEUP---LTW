<?php
  include_once('config.php');


  $username = $_POST['username'];
  global $dbh;
  $stmt = $dbh->prepare('SELECT * FROM user WHERE username = ?');
  $stmt->execute(array($username));

  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if(isset($result)){
    $hashed_password = $result['password'];
    $password = $_POST['password'];
    if(password_verify($password,$hashed_password)){
      return "true";
    }
    else return "false";
  }

  else{
    return "false";
  }
?>
