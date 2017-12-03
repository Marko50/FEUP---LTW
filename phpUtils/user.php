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

  function getUserTodoLists($username){
    global $dbh;
    $stmt = $dbh->prepare('SELECT userID FROM user WHERE username = ?');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute(array($username));
    $id = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $dbh->prepare('SELECT * FROM todolist WHERE uID = ?');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute(array($id));

    $result = $stmt->fetchAll();

    return $result;
  }

 ?>
