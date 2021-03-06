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
         <li><a href="return.php">RETURN</a></li>
         <li ><a href="add.php" class="active">ADD</a></li>
        <li><a href="remove.php">REMOVE</a></li>
        <li  class="active"><a href="enquiry.php">ENQUIRY</a></li>
        <li><a href="books.php">BOOKS LIST</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br>
<center><h3 style="color: grey " >Admin Enquiry Section</h3> </center>
  

<!-- Container ( issue) -->


      <div class="container" style="padding-left: 20%;padding-right: 20%"> 
        <div class="panel panel-default">
      <div class="panel-heading"> Admin Enquiry <span style="font-size: 20px" class="glyphicon glyphicon-question-sign"></div>
      <div class="panel-body">

                <form method="post">
       <?php include('errors.php'); ?>
       <?php include('success.php'); ?> <br>

      
        <div class="form-group">
          <label for="inputState" style="font-family:  Montserrat, sans-serif">Search by ISBN or user ID</label>
          <select id="inputState" name='enquirycategory' class="form-control">
            <option selected style="font-family:  Montserrat, sans-serif" value="isbn">ISBN</option>
            <option value="userid" >User ID</option>
          </select>
         </div>

          <div class="form-group">
          <label for="example" style="font-family:  Montserrat, sans-serif">Enter the above selected value</label>
          <input  class="form-control"  style="font-family:  Montserrat, sans-serif"  name="enquiryvalue" placeholder="eg. ISBN or user ID" >
       </div>

        <center>
        <button type="submit" name="enquirysubmit"  class="btn btn-primary "  >Search <span class="glyphicon glyphicon-search"></span> </button>
        
        </center>
        
      </form>

 </div>
    </div>
      </div> 
        
     <br><br><br><br>

<div class="container">
    <div class="box-body table-responsive no-padding">
     <table class="table table-hover">
          <tr>
              <th>ISBN</th>
               <th>User ID</th>
              <th>Title</th>
              <th>Publisher</th>
              <th>Author</th>
              <th>Category</th>
          </tr>
              <?php
                    
                   If(mysqli_num_rows($resultenquiry)>0)
                   {
                     while($row=mysqli_fetch_array($resultenquiry))
                     {  

                ?>
                <tr>
                  <td><?php echo $row[0]; ?></td> 
                  <td><?php echo $row[1]; ?></td> 
                  <td><?php echo $row[2]; ?></td> 
                  <td><?php echo $row[3]; ?></td> 
                  <td><?php echo $row[4]; ?></td> 
                   <td><?php echo $row[5]; ?></td> 

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


</body>
</html>
