<?php error_reporting(0); ?>
<?php include('server.php'); ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Smart Library</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="./css/adminlogin.css">
 <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded" rel="stylesheet">
 
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">SMART LIBRARY</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php" >ABOUT</a></li>
        <li><a href="index.php"> SERVICES </a></li>
        <!-- <li><a href="#portfolio">PORTFOLIO</a></li> -->
        <li><a href="index.php">PRICING</a></li>
        <li><a href="index.php">CONTACT</a></li>
        <li class="active"><a href="adminlogin.php">ADMIN</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="jumbotron text-center">
  <h2 style="color: white" >Are you a user? If yes then at wrong place!</h2> 
  <p>Leave the worries on our part! Just go to the homepage and login your account</p> 
 <!--  <form>
    <div class="input-group">
      <input type="email" class="form-control" size="50" placeholder="Email Address" required>
      <div class="input-group-btn">
        <button type="button" class="btn btn-danger">Subscribe</button>
      </div>
    </div>
  </form> -->
</div>
  <div class="container">
      <div class="row">
    <div class="col-sm-4">
    <form method="post">
        <?php include('errors.php'); ?> <br>
        <div class="form-group">
          <label for="exampleInputEmail1" style="font-family:  Montserrat, sans-serif">Admin ID</label>
          <input  class="form-control"  style="font-family:  Montserrat, sans-serif"  name="username" placeholder="Enter ID">
             </div>
        <div class="form-group">
          <label for="exampleInputPassword1" style="font-family:  Montserrat, sans-serif">Password</label>
          <input type="password" class="form-control" name="password"  placeholder="Password" style="font-family:  Montserrat, sans-serif">
        </div>
        
        <button type="submit" name="adminloginsubmit"  class="btn btn-primary">Submit</button>
      </form>
    </div>
      <div class="col-sm-6">
       
      </div>
    </div>
</form>
  </div>


<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p> Made By Swapnil</a></p>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
