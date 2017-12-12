


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="icon" href="../assets/miniIcon.png" type="image/png"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>2du Search</title>
   </head>

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
     if(isset($category) && isset($userID) && $category!= "Generic"){
       $lists = gettodolistinfoidcategory($userID, $category);
     }
     else if(isset($category) && $category != "Generic"){
       $lists = gettodolistinfocategory($category);
     }
     else if(isset($userID)){
       $lists = gettodolistinfoid($userID);
     }
     else if(isset($category) && $category == "Generic"){
       $lists = getalltodolists();
     }
     else{
       $lists = array();
     }
    ?>
   <body>
     <h3>Search for a 2du List</h3>
     <div class="form">
       <form action="search.php" method="post">
         Choose Category <?php echo "&nbsp;&nbsp;" ?>
         <select name="category">
           <option value="Generic"> No specific category </option>
           <option value="Lifestyle"> Sports and Healthy Lifestyle</option>
           <option value="Domestic"> Domestic Chores </option>
           <option value="Everyday"> Everyday Chores </option>
           <option value="Academic"> School/College </option>
           <option value="Management"> Corporate </option>
           <option value="Social"> Social </option>
         </select><br /><br />
         Search by Username <input type="text" name="username"><br /><br />
         <input type="submit" value="Search" class="button">
       </form>
     </div>
     <br /><br /><br />
    <div class="todolists">
      <?php
       foreach ($lists as $list){
         $user = getUserInfoID($list['uID']);
         $username = $user['username'];
         echo '<section>
             <h4>';
         echo $list["title"];
         echo ' - by ';
         echo $username;
        echo "&nbsp-&nbsp;";
         echo $list["category"];
         echo ' list';
         echo '</h4> ';
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
         echo"<br>";
       }
     ?>
    </div>
    <br/><br/><br/><br/>
    <img src="../assets/era11.png" alt="era" class="era1"></a>
    <div id="errors" class="error-forms"role="alert">
        <?php if(count($lists) == 0 && (isset($_POST['category'])|| isset($_POST['username']) ) ){
          echo '<p> No results found </p>';
        } ?>
    </div>
   </body>
 </html>
