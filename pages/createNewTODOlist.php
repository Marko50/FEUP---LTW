

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="icon" href="../assets/miniIcon.png" type="image/png"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="../js/todoListValidator.js" defer></script>
     <title> 2du New List </title>
   </head>
   <?php
     session_start();
     session_regenerate_id(true);
     include_once('../phpUtils/user.php');
     include_once('topBar.php');
     $_SESSION['csrf'] = generate_random_token();

    ?>
   <body>
       <h3> New 2du List</h3>
      <div class="form">
        <form action="../phpUtils/addTODOList.php" method="post">
            <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']?>">
            <label for="title">New List Name:</label>
            <?php echo "&nbsp;" ?>
            <input type="text" name="title" id="title" maxlength="40" required /><br /><br />
            <label for="category">Choose a Category:</label>
            <select name="category" id="category">
              <option value="Generic"> No specific category </option>
              <option value="Lifestyle"> Sports and Healthy Lifestyle</option>
              <option value="Domestic"> Domestic Chores </option>
              <option value="Everyday"> Everyday Chores </option>
              <option value="Academic"> School/College </option>
              <option value="Management"> Corporate </option>
              <option value="Social"> Social </option>
            </select>
            <br /><br/><input type="submit" value="Create" class="button" >
        </form>
      </div>
      <br/><br/><br/><br/>
      <img src="../assets/era11.png" alt="era" class="era1"></a>

      <div id="errors" class="error-forms"role="alert">

      </div>
   </body>
 </html>
