<?php
    session_start();
    include_once('config.php');
    include_once('user.php');
    if ($_SESSION['csrf'] != $_POST['csrf']) {
      die("ERROR: Request does not appear to be legitimate");
    }
    $_SESSION['csrf'] = generate_random_token();
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $fullname = htmlspecialchars($_POST['FullName']);
    $password = htmlspecialchars($_POST['password']);
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    global $dbh;

    $stmt = $dbh->prepare('UPDATE user SET fullname = ?,
      email = ?, birthdate = ?, gender = ?, password = ? WHERE username = ?');
    if($stmt == false){
      print_r($dbh->errorInfo());
      die("SQLITE ERROR");
    }
    $stmt->execute(array($fullname,$email, $birthdate, $gender,$password_hashed,$username));

    header("Location: ../pages/userProfile.php");
    exit();
 ?>
