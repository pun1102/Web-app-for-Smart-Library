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
         <li><a href="index.php" >ABOUT</a></li>
        <li><a href="index.php"> SERVICES </a></li>
        <li><a href="index.php">CONTACT</a></li>
        <li class="active"><a href="books_user.php">BOOKS LIST</a></li>
        <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-weight: bold;font-family: 'Raleway', sans-serif;">
                            <?php $link_address='index.php'; ?>
                            <?php if(isset($_SESSION["username"])): ?>
                            <span ><?php echo  $_SESSION['stars']; ?> </span>
                            <?php echo  $_SESSION["username"]; ?>
                             <b class="caret"></b></a>
                    
                      <form method="post">
                        <ul class="dropdown-menu">
                      <!-- <li class="dropdown-header">Profile</li> -->
                        <li ><a href="profile.php" name="profile" >Profile</a></li>
                        <li ><button name="logout" style="color:red;padding-left: 20px" class="btn btn-link btn-lg-sm">Logout</button></li></ul>
                      </form>
                        </li>
                      <?php else: ?>
                           <li><?php echo "<a style='font-family:Raleway;' href='index.php'>LOGIN/REGISTER</a>"; ?>
                            <?php endif ?></li> 
      </ul>
    </div>
  </div>
</nav>
<br><br><br>
<center><h3 style="color: grey " >List of Books in the Library!</h3> </center>
  
<div class="container">
  <div class="box-body table-responsive no-padding">
     <table class="table table-hover">
          <tr>
              <th>ISBN</th>
              <th>Title</th>
              <th>Publisher</th>
              <th>Author</th>
              <th>Category</th>
          </tr>
              <?php
                    
                   If(mysqli_num_rows($resultlib)>0)
                   {
                     while($row=mysqli_fetch_array($resultlib))
                     {  

                ?>
                <tr>
                  <td><?php echo $row[0]; ?></td> 
                  <td><?php echo $row[1]; ?></td> 
                  <td><?php echo $row[2]; ?></td> 
                  <td><?php echo $row[3]; ?></td> 
                  <td><?php echo $row[4]; ?></td> 

                </tr>
                <?php
        
                }
                }
                 ?>
       </table>
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>
