<?php
    include_once('config.php');
    if ($_SESSION['csrf'] != $_POST['csrf']) {
      die("ERROR: Request does not appear to be legitimate");
    }
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

    $stmt = $dbh->prepare('SELECT MAX(itemID) FROM item');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $lastid = $stmt->execute();

    echo $lastid;
 ?>
