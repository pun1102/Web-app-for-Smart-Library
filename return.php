<?php error_reporting(0); ?>
<?php include('server.php'); ?>
<?php if(!$_SESSION['adminname']): ?>
              <?php header('location: index.php');?>
            <?php endif ?>

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
<link rel="stylesheet" type="text/css" href="./css/admin.css">
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
        <li><a href="admin.php" >ISSUE</a></li>
         <li  class="active"><a href="return.php">RETURN</a></li>
         <li><a href="add.php" class="active">ADD</a></li>
        <li><a href="remove.php">REMOVE</a></li>
        <li   ><a href="enquiry.php">ENQUIRY</a></li>
        <li><a href="books.php">BOOKS LIST</a></li>
      </ul>
    </div>
  </div>
</nav>
<br>

<!-- Container ( issue) -->

<div id="issue" class="container-fluid">
   <div class="text-center">
  <h3>RETURN Section</h3>
  


     
     
      <div class="container" style="padding-left: 20%;padding-right: 20%"> 
        <div class="panel panel-default">
      <div class="panel-heading"> Return a book <span style="font-size: 20px" class="glyphicon glyphicon-book"></div>
      <div class="panel-body">

                <form method="post">
        <?php include('errors.php'); ?><?php include('success.php'); ?> <br>
        <div class="form-group">
          <label for="exampleisbn" style="font-family:  Montserrat, sans-serif">ISBN</label>
          <input  class="form-control"  style="font-family:  Montserrat, sans-serif"  name="returnisbn" placeholder="The 13 digit ISBN" >
       </div>
        
        <div class="form-group">
          <label for="example1" style="font-family:  Montserrat, sans-serif">User ID</label>
          <input  class="form-control"  style="font-family:  Montserrat, sans-serif"  name="return_userid" placeholder="eg. B516045" >
       </div>
       <div class="form-group">
          <label for="example" style="font-family:  Montserrat, sans-serif"> Actual Return Date</label>
          <input  class="form-control"  style="font-family:  Montserrat, sans-serif"  name="actreturndate" placeholder="eg. 2018-12-18" >
       </div>
        
        <center>
        <button type="submit" name="returnsubmit"  class="btn btn-primary "  >Return <span class="glyphicon glyphicon-ok"></span> </button>
        
        </center>
        
      </form>
      
      
      </div>
    </div>
        </div>
   
 

<!-- <footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p> Made By Swapnil</a></p>
</footer> -->

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
