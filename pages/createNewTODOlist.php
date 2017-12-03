<?php
  session_start();
  include_once ('topBar.php');
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <script src="../js/todoListValidator.js" defer></script>
     <title> CREATE A NEW TODO LIST </title>
   </head>
   <body>
      <h1>
        CREATING A NEW TODO LIST
      </h1>
      <div class="form">
        <form action="../phpUtils/addTODOList.php" method="post">
            <input type="text" name="title" id="title" maxlength="40" required />
            <select name="category">
              <option value="generic"> No specific category </option>
              <option value="lifestyle"> Sports and Healthy Lifestyle</option>
              <option value="domestic"> Domestic Chores </option>
              <option value="everyday"> Everyday Chores </option>
              <option value="academic"> School/College </option>
              <option value="management"> Corporate </option>
              <option value="social"> Social </option>
            </select>
            <input type="submit" value="Create" >
        </form>
      </div>

      <div id="errors" class="error-forms"role="alert">

      </div>
   </body>
 </html>
