<?php
  include_once('config.php');

  function gettodolistinfo($id){
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM todolist WHERE todoListID = ?');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute(array($id));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  function gettodolistitems($id){
    global $dbh;
    $stmt = $dbh->prepare('SELECT iID FROM todolistitem WHERE tID = ?');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute(array($id));
    $iID = $stmt->fetch(PDO::FETCH_ASSOC);
    stmt = $dbh->prepare('SELECT * FROM item WHERE iID = ?');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute(array($iID));
    $result = $stmt->fetchAll();
    return $result;
  }
 ?>
