<?php
session_start();
include_once('user.php');
if ($_SESSION['csrf'] != $_POST['csrf']) {
  die("ERROR: Request does not appear to be legitimate");
}
$_SESSION['csrf'] = generate_random_token();

$username = $_SESSION['login-user'];
$photoId = "../".$_FILES["photoId"]["name"];

move_uploaded_file($_FILES["photoId"]["tmp_name"],$photoId);

global $dbh;

$stmt = $dbh->prepare('UPDATE user SET photoId = ? WHERE username = ?');
if($stmt == false){
  print_r($dbh->errorInfo());
  die("SQLITE ERROR");
}
  $stmt->execute(array($photoId,$username));

  header("Location: ../pages/userProfile.php");
  exit();
 ?>
