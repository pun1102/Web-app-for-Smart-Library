<?php error_reporting(0); ?>
<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Register</title>
  <meta name="viewport" content="width=device-width" />
  <link rel="stylesheet" type="text/css" href="./css/stylereg.css">
  <!--  <link rel="icon"  href="./images/algoskills_logo.png" />  -->
   <!-- Global site tag (gtag.js) - Google Analytics -->

</head>
<body>
  
        <div class="glass">
          <img src="./images/user5 - Copy.png" class="user">
          <center><h3> Register  now !!</h3></center>
          <form method="post"  name="form">
            <?php include('errors.php'); ?>
            <div class="inputBox">
              <input type="text" name="username" placeholder="UserID"  value="<?php echo $username;?>">
            </div>
            <div class="inputBox">
              <input type="text" name="name" placeholder="Name"  value="<?php echo $name;?>">
            </div>
              <div class="inputBox">
                <input type="text" name="branch" placeholder="Branch"  value="<?php echo $branch;?>">
              </div>
              <div class="inputBox">
                <input type="text" name="batch" placeholder="Batch"  value="<?php echo $batch;?>">
              </div>

            <div class="inputBox">
              <input type="password" name="password" placeholder="Password" >
            </div>
              <div class="inputBox">
              <input type="password" name="repassword" placeholder="Re-enter your password" >
            </div><br>
            <span class="inputBox">
              <input type="submit"  name="regsubmit" value="Submit">
            </span>
           
            <br>
          </form>       
        </div>
    
   
</body>
</html>