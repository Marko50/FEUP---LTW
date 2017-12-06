<?php
  include_once('config.php');


  $itID = $_POST['itemID'];

  global $dbh;

  $stmt = $dbh->prepare('SELECT completed FROM item WHERE itemID = ?');
  if($stmt == false){
    print_r($dbh->errorInfo());
    die("SQLITE ERROR");
  }
  $stmt->execute(array($itID));
  if($stmt == false){
    print_r($dbh->errorInfo());
    die("SQLITE ERROR");
  }
  $marked = $stmt->fetch();

  if($marked['completed'] == 0)
  {
    $marked['completed'] = 1;
  }

  else  $marked['completed'] = 0;

  $stmt = $dbh->prepare('UPDATE item SET completed = ? WHERE itemID = ?');
  if($stmt == false){
    print_r($dbh->errorInfo());
    die("SQLITE ERROR");
  }
  $stmt->execute(array($marked['completed'], $itID));
  if($stmt == false){
    print_r($dbh->errorInfo());
    die("SQLITE ERROR");
  }
  echo $marked['completed'];
?>
