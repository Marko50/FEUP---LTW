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

  function gettodolistinfoidcategory($userid, $category){
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM todolist WHERE uID = ? AND category = ?');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute(array($userid, $category));
    $result = $stmt->fetchAll();
    return $result;
  }

  function gettodolistinfoid($userid){
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM todolist WHERE uID = ?');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute(array($userid));
    $result = $stmt->fetchAll();
    return $result;
  }

  function gettodolistinfocategory($category){
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM todolist WHERE category = ?');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute(array($category));
    $result = $stmt->fetchAll();
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

  function getalltodolists(){
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM todolist');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
  }


 ?>
