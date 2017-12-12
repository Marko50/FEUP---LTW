

<html>
  <head>
     <link rel="icon" href="../assets/miniIcon.png" type="image/png"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 2du Home </title>
    <meta charset="utf-8">
    <link href="../css/style.css" rel="stylesheet" >
  </head>

  <?php
    session_start();
    session_regenerate_id(true);
    include_once('../phpUtils/user.php');
    include_once('topBar.php');
    $_SESSION['csrf'] = generate_random_token();
  ?>
  <body>
    <h1> Welcome to 2du!</h1>
    <div>
      <h5> Here we provide our users with a simple and completely free way to create and manage to-do lists.<br/><br/>
         We aim to help you plan and maximize the productivitu of your daily life.<br/><br/>
         Get to planning!
       </h5>
    </div>
    <br/>
    <a href= "howto.php"class=buttonHow>  How to use 2du</a>
    <br/><br/><br/><br/><br/>
      <img src="../assets/era11.png" alt="era" class="era1"></a>

  </body>

</html>
