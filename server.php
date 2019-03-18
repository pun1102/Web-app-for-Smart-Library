<?php
  session_start();
  
  if(isset($_POST['regsubmit']))//using regsubmit only takes registeration button response
  {
    $username=$_POST['username'];
    $username = strtoupper($username);
    $branch=$_POST['branch'];
    $batch=$_POST['batch'];
    $name=$_POST['name'];
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];
    
   if(empty($username)){
    array_push($errors,"• Username is required");
     }
    if(empty($branch)){
    array_push($errors,"• Branch is required");
    }
    if(empty($batch)){
    array_push($errors,"• Batch is required");
    }
    if(empty($name)){
    array_push($errors,"• Name is required");
    }
    if(empty($password)){
    array_push($errors,"• Password is required");
    }
    if(strlen($password)<6){
    array_push($errors,"• Password is too small, it must be more than 6 characters");
    }
    if($repassword!= $password){
    array_push($errors,"• The two password do not match");
     }
    if(count($errors)==0)
    {
      $query="SELECT * FROM student WHERE user_id='$username'";
      $result=mysqli_query($db,$query);
     if(mysqli_num_rows($result)>=1){
       array_push($errors,"• Username already exists!");
      }
      else{ 
        $epassword=md5($password);//encripting password
        $sql = "INSERT INTO student VALUES ('$username','$epassword','$name','$branch','$batch',0) ";
        mysqli_query($db,$sql);
        $_SESSION['username']=$username;
        $_SESSION['branch']=$branch;
        $_SESSION['batch']=$batch;
        $_SESSION['name']=$name;

        $_SESSION['success']="You are now logged in ";
         // header("location:profile.php");//to open a new page
      
      }
    
    }
  }
  //now the reg part is ended
  //login begins


  if(isset($_POST['loginsubmit']))
  {
    mysqli_refresh($db,MYSQLI_REFRESH_GRANT);
    $username=$_POST['username'];
    $username = strtoupper($username);
    $password=$_POST['password'];
   

   if(empty($username)){
    array_push($errors," • Username is required");
   }
   if(empty($password)){
    array_push($errors," • Password is required");
   }

   if(count($errors)==0)
   {
    $password=md5($password);//encripting password
    $query="SELECT * FROM student WHERE user_id='$username' AND password='$password'";
     $result=mysqli_query($db,$query) or die(mysql_error());
     
     if(mysqli_num_rows($result)==1){ //now i know its correct
         $row=mysqli_fetch_array($result);
         $username=$row[0];
         $name= $row[2];
         $branch=$row[3];
         $batch=$row[4];
         $fine=$row[5];
         $_SESSION['username']=$username;
         $_SESSION['name']=$name;
         $_SESSION['branch']=$branch;
         $_SESSION['batch']=$batch;
         $_SESSION['fine']=$fine;
         $_SESSION['success']="You are now logged in ";
          header("location:profile.php");//to open a new page
     }
       else
       {
         // $("#exampleModalCenter").modal({"backdrop": "static"});
         array_push($errors," • Wrong credentials");
         // alert("Wrong credentials");

       }  
    } 


  }

  if(isset($_POST['adminloginsubmit']))
  {
    mysqli_refresh($db,MYSQLI_REFRESH_GRANT);
    $username=$_POST['username'];
    $password=$_POST['password'];
   

   if(empty($username)){
    array_push($errors," • Username is required");
   }
   if(empty($password)){
    array_push($errors," • Password is required");
   }

   if(count($errors)==0)
   {

    $query="SELECT * FROM admin WHERE admin_id='$username' AND password='$password'";
     $result=mysqli_query($db,$query);
     if(mysqli_num_rows($result)==1){ //now i know its correct
         $_SESSION['adminname']=$username;
         $_SESSION['success']="You are now logged in ";
          header("location:admin.php");//to open a new page
     }
       else
       {
         // $("#exampleModalCenter").modal({"backdrop": "static"});
         array_push($errors," • Wrong credentials");
         $messagebook="Unsuccessful Attempt";
         // alert("Wrong credentials");

       }  
    } 
  }

  if(isset($_POST['addsubmit']))//using regsubmit only takes registeration button response
  {
    $isbn=$_POST['isbn'];
    $title=$_POST['title'];
    $publisher=$_POST['publisher'];
    $author=$_POST['author'];
    $category=$_POST['category'];
    
   if(empty($isbn)){
    array_push($errors,"• ISBN is required");
     }
    if(empty($title)){
    array_push($errors,"• Title is required");
    }
    if(empty($author)){
    array_push($errors,"• Author is required");
    }
    if(empty($publisher)){
    array_push($errors,"• Publisher is required");
    }
    if(empty($category)){
    array_push($errors,"• category is required");
    }
    if(strlen($isbn)!=13 ){
    array_push($errors,"• ISBN must be of 13 characters");
    }
    
    if(count($errors)==0)
    {
      $query="SELECT * FROM books WHERE ISBN='$isbn'";
      $result=mysqli_query($db,$query);
     if(mysqli_num_rows($result)>=1){
       array_push($errors,"• This book already exists!");
      }
      else{ 
       
        $sql = "INSERT INTO books VALUES ('$isbn','$title','$publisher','$author','$category') ";
        mysqli_query($db,$sql);
         array_push($success,"• Book successfully added!");
        //$messagebook="The book is successfully added ";
         // header("location:profile.php");//to open a new page
      
      }
    
    }
  }

  if(isset($_POST['removesubmit']))//using regsubmit only takes registeration button response
  {
    $removeisbn=$_POST['removeisbn'];
    $removecategory=$_POST['removecategory'];
    
   if(empty($removeisbn)){
    array_push($errors,"• ISBN is required");
     }
    if(empty($removecategory)){
    array_push($errors,"• Category is required");
    }
     if(strlen($removeisbn)!=13 ){
    array_push($errors,"• ISBN must be of 13 characters");
    }
    
    if(count($errors)==0)
    {
      $query="SELECT * FROM books WHERE ISBN='$removeisbn' AND Category='$removecategory'";
     $result=mysqli_query($db,$query);
     if(mysqli_num_rows($result)==1){ //now i know its correct
         $sql1 = "DELETE FROM books WHERE ISBN='$removeisbn' ";
        mysqli_query($db,$sql1);
        array_push($success," • Book successfully removed!");
     }
       else
       {
         // $("#exampleModalCenter").modal({"backdrop": "static"});
         array_push($errors," • Please enter correct ISBN! This book does not exist in this category/Library");
         

       }  
    
    }
  }



  //issue
  if(isset($_POST['issuesubmit']))//using regsubmit only takes registeration button response
  {
    $issueisbn=$_POST['issueisbn'];
    $issue_userid=$_POST['issue_userid'];
    $issue_userid= strtoupper($issue_userid);
    $issuedate=$_POST['issuedate'];
    $expectedreturn=$_POST['expectedreturn'];
    
   if(empty($issueisbn)){
    array_push($errors,"• ISBN is required");
     }
    if(empty($issuedate)){
    array_push($errors,"• Issue Date is required");
    }
    if(empty($issue_userid)){
    array_push($errors,"• User ID is required");
    }
    if(empty($expectedreturn)){
    array_push($errors,"• Expected Return date is required");
    }   
     if(strlen($issueisbn)!=13 ){
    array_push($errors,"• ISBN must be of 13 characters");
    } 
    
    if(count($errors)==0)
    {
      $query1="SELECT * FROM books WHERE ISBN='$issueisbn'";
      $query2="SELECT * FROM student WHERE user_id='$issue_userid'";
      $query3="SELECT * FROM issue WHERE ISBN='$issueisbn'";
      $result1=mysqli_query($db,$query1);
      $result2=mysqli_query($db,$query2);
      $result3=mysqli_query($db,$query3);
       
     if(mysqli_num_rows($result1)< 1){
       array_push($errors,"• Book not found in the Library!");
      }
     else if(mysqli_num_rows($result2)< 1){
       array_push($errors,"• User not found in database!");
      }
     else if(mysqli_num_rows($result3)>= 1){
       array_push($errors,"• Book already been issued to someone!");
      }
      else{ 
       
        $sql = "INSERT INTO issue  VALUES ('$issueisbn','$issue_userid','$issuedate','$expectedreturn') ";
        mysqli_query($db,$sql);
         array_push($success,"• Book successfully issued!");
        //$messagebook="The book is successfully added ";
         // header("location:profile.php");//to open a new page
      
      }
    
    }
  }



  //return
  //return
  if(isset($_POST['returnsubmit']))//using regsubmit only takes registeration button response
  {
    $returnisbn=$_POST['returnisbn'];
    $return_userid=$_POST['return_userid'];
    $return_userid= strtoupper($return_userid);
    $actreturndate=$_POST['actreturndate'];
    
   if(empty($returnisbn)){
    array_push($errors,"• ISBN is required");
     }
    if(empty($actreturndate)){
    array_push($errors,"• Actual return Date is required");
    }
    if(empty($return_userid)){
    array_push($errors,"• User ID is required");
    }
     if(strlen($returnisbn)!=13 ){
    array_push($errors,"• ISBN must be of 13 characters");
    }
    
    if(count($errors)==0)
    {
      $query1="SELECT * FROM books WHERE ISBN='$returnisbn'";
      $query2="SELECT * FROM student WHERE user_id='$return_userid'";
      $query3="SELECT * FROM issue WHERE ISBN='$returnisbn' AND user_id='$return_userid'";
      $result1=mysqli_query($db,$query1);
      $result2=mysqli_query($db,$query2);
      $result3=mysqli_query($db,$query3);
       
     if(mysqli_num_rows($result1)< 1){
       array_push($errors,"• Book not found in the Library!");
      }
     else if(mysqli_num_rows($result2)< 1){
       array_push($errors,"• User not found in database!");
      }
     else if(mysqli_num_rows($result3)<1){
       array_push($errors,"• Book not issued to this user!");
      }
      else{ 
       
        $sql1 = "SELECT * FROM  issue  WHERE ISBN ='$returnisbn' ";
        $result= mysqli_query($db,$sql1);
        $row1=mysqli_fetch_array($result);
        $expect = $row1[3];

        if($expect < $actreturndate)
        {
        $query = "SELECT * FROM  student WHERE user_id ='$return_userid' ";

        $result=mysqli_query($db,$query) or die(mysql_error());
        $row=mysqli_fetch_array($result);
        $fine= $row[5];
        $fine= $fine + 100;//here fine is 100
        $sql2 = "UPDATE student SET `fine`= $fine WHERE user_id ='$return_userid' ";
        mysqli_query($db,$sql2);
        }

        $sql3= "DELETE FROM issue WHERE ISBN ='$returnisbn'";
        mysqli_query($db,$sql3);
         array_push($success,"• Book successfully returned!");
        //$messagebook="The book is successfully added ";
         // header("location:profile.php");//to open a new page
      
      }
    
    }
  }

if(isset($_POST['enquirysubmit']))//using regsubmit only takes registeration button response
  {
    $enquirycategory= $_POST['enquirycategory'];
    $enquiryvalue=$_POST['enquiryvalue'];
    
   if(empty($enquiryvalue)){
    array_push($errors,"• Input is required");
     }
    else if($enquirycategory=='isbn' and strlen($enquiryvalue)!=13){
    array_push($errors,"• ISBN must be of 13 characters");
    }
        
    if(count($errors)==0)
    {
        if($enquirycategory=='isbn')
        {
             $sqlenquiry="SELECT `ISBN`, `user_id`,`Title`,`Publisher`,`Author`,`Category` FROM (issue NATURAL JOIN books) where books.ISBN='$enquiryvalue'";
                    $resultenquiry = mysqli_query($db,$sqlenquiry) or die(mysql_error());
        }
        else
        {

          $sqlenquiry="SELECT `ISBN`, `user_id`,`Title`,`Publisher`,`Author`,`Category` FROM (issue NATURAL JOIN books) where user_id='$enquiryvalue'";
                    $resultenquiry = mysqli_query($db,$sqlenquiry) or die(mysql_error());

        }

        if($enquirycategory=='isbn' and mysqli_num_rows($resultenquiry)<1){
                  // 
                  $qu = "SELECT * FROM books where ISBN='$enquiryvalue'";
                  $re= mysqli_query($db,$qu) or die(mysql_error());
                  if(mysqli_num_rows($re)<1)
                    array_push($errors,"• This book does not exists!");
                  else
                    {$sqlenquiry="SELECT books.ISBN,user_id,Title,Publisher,Author,Category  FROM books LEFT OUTER JOIN issue ON books.ISBN= issue.ISBN where books.ISBN='$enquiryvalue'";
                    $resultenquiry = mysqli_query($db,$sqlenquiry) or die(mysql_error()); 
                  }

        }
         else if($enquirycategory=='userid' and mysqli_num_rows($resultenquiry)<1){
                  $qu = "SELECT * FROM student where user_id='$enquiryvalue'";
                  $re= mysqli_query($db,$qu) or die(mysql_error());
                  if(mysqli_num_rows($re)<1)
                    array_push($errors,"• User does not exists!");
                  else
                    {
                    array_push($errors,"• No books assigned to the user!"); 
                  }
        }
      }
    
    }
  

  //FOR LOGOUT
  if(isset($_POST['logout'])){
     mysqli_refresh($db,MYSQLI_REFRESH_GRANT);
    session_start();
    session_unset();
    session_destroy();
    // session_destroy();
    // unset($_SESSION['username']);
    header('location: index.php');
  }

  

?>
