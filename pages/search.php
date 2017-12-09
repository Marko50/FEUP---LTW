<?php
  session_start();
  session_regenerate_id(true);
  include_once('../phpUtils/todoList.php');
  include_once('../phpUtils/user.php');
  include_once('topBar.php');

  if(isset($_POST['category'])){
    $category = $_POST['category'];
  }
  if(isset($_POST['username'])){
    $userinfo = getUserInfo($_POST['username']);
    $userID = $userinfo['userID'];
  }
  if(isset($category) && isset($userID) && $category!= "generic"){
    $lists = gettodolistinfoidcategory($userID, $category);
  }
  else if(isset($category) && $category != "generic"){
    $lists = gettodolistinfocategory($category);
  }
  else if(isset($userID)){
    $lists = gettodolistinfoid($userID);
  }
  else if(isset($category) && $category == "generic"){
    $lists = getalltodolists();
  }
  else{
    $lists = array();
  }
 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Search</title>
   </head>
   <body>
     <div class="form">
       <form action="search.php" method="post">
         <select name="category">
           <option value="generic"> No specific category </option>
           <option value="lifestyle"> Sports and Healthy Lifestyle</option>
           <option value="domestic"> Domestic Chores </option>
           <option value="everyday"> Everyday Chores </option>
           <option value="academic"> School/College </option>
           <option value="management"> Corporate </option>
           <option value="social"> Social </option>
         </select>
         Search by Username <input type="text" name="username">
         <input type="submit" value="Search" >
       </form>
     </div>
    <div class="todolists">
      <?php
       foreach ($lists as $list){
         $user = getUserInfoID($list['uID']);
         $username = $user['username'];
         echo '<section class="todolist">
             <h3>';
         echo $list["title"];
         echo ' by ';
         echo $username;
         echo '</h3>    <aside>';
         echo $list["category"];
         echo '</aside>';
         $items = gettodolistitems($list['todoListID']);
        foreach ($items as $item) {
          echo'<p>';
          if($item['completed'])
          {
           echo 'Completed: ';
          }
          else{
           echo 'To do untill ';
           echo $item['limitDate'];
           echo ' : ';
          }
          echo $item['description'];
          echo '</p>';
         }
         echo '</section>';
       }
     ?>
    </div>
    <div id="errors" class="error-forms"role="alert">
        <?php if(count($lists) == 0 && (isset($_POST['category'])|| isset($_POST['username']) ) ){
          echo '<p> No results found </p>';
        } ?>
    </div>
   </body>
 </html>
