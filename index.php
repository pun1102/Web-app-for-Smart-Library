<?php error_reporting(0); ?>
<?php include('server.php'); ?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Smart Library</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
 <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
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
      <a class="navbar-brand" href="#">SMART LIBRARY</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about" >ABOUT</a></li>
        <li><a href="#services">SERVICES</a></li>

        <li><a href="#contact">CONTACT</a></li>
        <li><a href="books_user.php">BOOK LIST</a></li>

         <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-weight: bold;font-family: 'Raleway', sans-serif;">
                            <?php $link_address='index.php'; ?>
                            <?php if(isset($_SESSION["username"])): ?>
                            <span ><?php echo  $_SESSION['stars']; ?> </span>
                            <?php echo $_SESSION["username"]; ?>
                             <b class="caret"></b></a>
                    
                      <form method="post">
                        <ul class="dropdown-menu">
                      <!-- <li class="dropdown-header">Profile</li> -->
                        <li ><a href="profile.php" name="profile" >Profile</a></li>
                        <li ><button name="logout" style="color:red;padding-left: 20px" class="btn btn-link btn-lg-sm">Logout</button></li></ul>
                      </form>
                        </li>
                      <?php else: ?>
                           <li><?php echo "<a style='font-family:Raleway;' href='#about'>LOGIN/REGISTER</a>"; ?>
                            <?php endif ?></li> 
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h2 style="color: white;" >Smart Library at IIIT </h2> 
  <p>Use the library in a smart way !</p> 
</div>

<!-- Container (About Section) -->

<div id="about" class="container-fluid">
   <div class="text-center">
  <h2>About</h2>
</div>
  <div class="row">
    <div class="col-sm-4">
      	<div class="panel panel-default">
		  <div class="panel-heading"> User Login <span style="font-size: 20px" class="glyphicon glyphicon-user"></div>
		  <div class="panel-body">



                <form method="post">
        <?php include('errors.php'); ?> <br>
        <div class="form-group">
          <label for="exampleInputEmail1" style="font-family:  Montserrat, sans-serif">User ID</label>
          <input  class="form-control"  style="font-family:  Montserrat, sans-serif"  name="username" placeholder="eg. B516045">
             </div>
        <div class="form-group">
          <label for="exampleInputPassword1" style="font-family:  Montserrat, sans-serif">Password</label>
          <input type="password" class="form-control" name="password"  placeholder="Password" style="font-family:  Montserrat, sans-serif">

        </div>
        <center>
        <button type="submit" name="loginsubmit"  class="btn btn-primary btn-space">Login  <span class="glyphicon glyphicon-arrow-right"></span> </button>
        <button type="button" name="regsubmit" onclick="location.href='register.php'" class="btn btn-primary btn-space">Register a new account   </button> </center>
        
      </form>





		  </div>
	 	</div>
 	</div>
    <div class="col-sm-8">
      <br>
      <h4>Library Management Software is a comprehensive library management solution that is suitable for both large and small libraries this software is suitable for all type Institutional, public and digital libraries for managing their circulation and stocks. Library Management Software has been designed to automate, manage and look after the over-all processing of even very large-scale libraries.

</h4><br>
      <p> This software is capable of managing Book Issues, Returns, generating various Reports for Record-Keeping and Review purposes, fine handling according to end user requirements.  </p>
      <br>
    </div>
    
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-5">
      <span class=" slideanim"><img src="./images/LIB3.jpeg"></span>
    </div>
    <div class="col-sm-7">
      <h2>Our Way</h2><br>
      <h4><strong>MISSION:</strong> The Library management software will not only improve the efficiency but will also reduce human stress thereby indirectly improving human recourses.</h4><br>
      <p><strong>VISION:</strong> We have worked our best to reduce human efforst for handling the records on pen and paper. Rather we have a vision to provide a perfect library with computerised efforts. This will not only reduce human efforts but will also help the users. </p>
    </div>
  </div>
</div>



<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
  <h2>SERVICES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-education logo-small"></span>
      <h4>EDUCATION</h4>
      <p>A perfect managed collection of books</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-user logo-small"></span>
      <h4>LOGIN</h4>
      <p>Login and register for both user and admin</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-search logo-small"></span>
      <h4>ENQUIRY</h4>
      <p>Enquiry system about books and user</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-book logo-small"></span>
      <h4>BOOKS</h4>
      <p> Large collection of books</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-hourglass logo-small"></span>
      <h4>TIMED</h4>
      <p>Fine is imposed if time of return exceeds</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-check logo-small"></span>
      <h4 style="color:#303030;">SERVICE</h4>
      <p>Uninterrupted Service </p>
    </div>
  </div>

</div>


<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us </p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Smart Library, IIIT Bhubaneswar</p>
      <p><span class="glyphicon glyphicon-phone"></span> +0091 9938088008</p>
      <p><span class="glyphicon glyphicon-envelope"></span> library@iiit-bh.ac.in</p>
    </div>
    <div class="col-sm-7 slideanim">
      
    </div>
  </div>
  <!-- Add Google Maps -->
<div id="map" style="height:400px;width:100%;"></div><br>
  <center><button class="btn btn-primary"  onclick="location.href='adminlogin.php'">Admin <span class="glyphicon glyphicon-user"></span></button></center>
</div>







<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p> Top</p>
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
 <script>
      function initMap() {
        var uluru = {lat: 20.295911,  lng: 85.744299};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDv6IEKAmN3qcwvDyEa9V54HwuMdZE6b8Q&callback=initMap">
</script>

 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <!--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
