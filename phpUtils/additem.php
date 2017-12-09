<?php
    include_once('config.php');

    $tdID = $_POST['todolistid'];
    $description = htmlspecialchars($_POST['itemtext']);
    $limitdate = $_POST['datelimit'];

    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO item (description,limitDate,completed,tdID) VALUES (?,?,?,?) ');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute(array($description, $limitdate, 0, $tdID));

    $stmt = $dbh->prepare('SELECT MAX(itemID) AS itemID FROM item');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute();
    $lastid = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $lastid['itemID'];
 ?>
