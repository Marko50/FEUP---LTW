<?php
  include_once('config.php');
  function generate_random_token() {
      $token = bin2hex(openssl_random_pseudo_bytes(16));
      return $token;
  }

  function getUserFullName(){

  }

 ?>
