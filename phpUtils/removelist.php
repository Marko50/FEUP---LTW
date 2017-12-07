<?php
    include_once('config.php');
    $id = $_POST['todolistid'];

    global $dbh;
    $stmt = $dbh->prepare('DELETE FROM todolist WHERE todoListID = ?');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute(array($id));

    header("Location: ../pages/myTODOLists.php");
    exit;
 ?>
