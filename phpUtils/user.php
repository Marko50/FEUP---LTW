<?php
  include_once('config.php');

  function generate_random_token() {
      $token = bin2hex(openssl_random_pseudo_bytes(16));
      return $token;
  }

  function getUserInfo($username){
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM user WHERE username = ?');
    $stmt->execute(array($username));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

 ?>
