<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parishioner Controller</title>
</head>   
<body>
<?php
   include("../custom-php/connector.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myuseremail = mysqli_real_escape_string($connection,$_POST['userEmail']);
      $mypassword = mysqli_real_escape_string($connection,$_POST['userPassword']); 
      
      $sql = "SELECT email FROM users WHERE email = '$myuseremail' and passcode = '$mypassword'";
      $result = mysqli_query($connection,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC());
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myuserEmail");
         $_SESSION['login_user'] = $myuserEmail;
         
         header("location: parishioner-view/parishioner-home.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
</body>
</html>