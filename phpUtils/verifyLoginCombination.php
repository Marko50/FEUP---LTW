<?php
  session_start();
  include_once('../phpUtils/config.php');

  $username = $_POST['username'];
  global $dbh;
  $stmt = $dbh->prepare('SELECT * FROM user WHERE username = ?');
  $stmt->execute(array($username));

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if(isset($_SESSION['login-user'])){
    if($_SESSION['login-user'] == $username){
      $hashed_password = $result['password'];
      $password = $_POST['password'];
      if(password_verify($password,$hashed_password)){
        echo 'true';
      }
      else echo 'false';
    }
    else echo 'false';
  }
  else{
    if(isset($result)){
      $hashed_password = $result['password'];
      $password = $_POST['password'];
      if(password_verify($password,$hashed_password)){
        echo 'true';
      }
      else echo 'false';
    }
    else{
      echo 'false';
    }
  }
?>
