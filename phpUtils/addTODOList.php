<?php
  session_start();
  include_once('config.php');
  if ($_SESSION['csrf'] != $_POST['csrf']) {
    die("ERROR: Request does not appear to be legitimate");
  }
  $title = htmlspecialchars($_POST['title']);
  $category = $_POST['category'];

  global $dbh;
  $stmt = $dbh->prepare('SELECT userID FROM user WHERE username = ?');
  if($stmt == false){
    print_r($dbh->errorInfo());
    die("SQLITE ERROR");
  }
  $stmt->execute(array($_SESSION['login-user']));
  $id = $stmt->fetch(PDO::FETCH_ASSOC);

  $stmt = $dbh->prepare('INSERT INTO todolist (title, category, uID) VALUES (?,?,?)');
  if($stmt == false){
    print_r($dbh->errorInfo());
    die("SQLITE ERROR");
  }
  $stmt->execute(array($title, $category, $id['userID']));

  header("Location: ../pages/myTODOLists.php");
 ?>
