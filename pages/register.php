<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $fullname = $_POST['FullName'];
    $password = $_POST['password'];
    $username = $_POST['username'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];

    $dbh = new PDO('sqlite:../database/todolists.db');
    $stmt = $dbh->prepare('INSERT INTO user (username,fullname,email,birthdate,gender,password) VALUES (?,?,?,?,?,?,?)'));
    $stmt = $dbh->execute(array($username, $fullname,$email, $birthdate, $gender,$password));
 ?>
