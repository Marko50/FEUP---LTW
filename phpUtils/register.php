<?php
    include_once('config.php');
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $fullname = htmlspecialchars($_POST['FullName']);
    $password = htmlspecialchars($_POST['password']);
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];

    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO user (username,fullname,email,birthdate,gender,password) VALUES (?,?,?,?,?,?)');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute(array($username, $fullname,$email, $birthdate, $gender,$password_hashed));

    header("Location: ../pages/index.php");
    exit();
 ?>
