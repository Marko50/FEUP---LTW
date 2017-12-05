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
    $stmt = $dbh->prepare('SELECT * FROM item WHERE tdID = ?');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute(array($id));
    $result = $stmt->fetchAll();
    return $result;
  }
 ?>
