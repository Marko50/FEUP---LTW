<?php
    include_once('config.php');
    $username = $_POST['username'];
    $email = $_POST['email'];
    $fullname = $_POST['FullName'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    global $dbh;

    $stmt = $dbh->prepare('SELECT userID FROM user WHERE username = ?');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute(array($username));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $result['userID'];

    $stmt = $dbh->prepare('UPDATE user SET username = ?, fullname = ?,
      email = ?, birthdate = ?, gender = ?, password = ? WHERE userID = ?');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute(array($username, $fullname,$email, $birthdate, $gender,$password_hashed,$id));

    header("Location: ../pages/userProfile.php");
    exit();
 ?>
