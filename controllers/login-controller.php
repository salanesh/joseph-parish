<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Controller</title>
</head>   
<body>
<?php
$failemail = 0;
$failpass = 0;
require("../custom-php/connector.php");

// vardumps for checking shit
//var_dump($_POST["email"]);
//echo("<br>");
//var_dump($_POST["userPass"]);
//echo("<br>");

if ( !isset($_POST['email'], $_POST['userPass']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $connection->prepare('SELECT userID, userPass, roleID FROM Users WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

   if ($stmt->num_rows > 0) {
      $stmt->bind_result($userID, $userPass, $roleID);
      $stmt->fetch();
      // Account exists, now we verify the password.
      // Note: remember to use password_hash in your registration file to store the hashed passwords.
      if ($_POST['userPass'] === $userPass) {
         // Verification success! User has logged-in!
         // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
         $_SESSION['loggedin'] = TRUE;
         $_SESSION['name'] = $_POST['email'];
         $_SESSION['userID'] = $userID;
         if($roleID==1){
            header('Location: ../parishioner-view/parishioner-home.php');
         }else{
            header('Location: ../staff-view/staff-home.php');
         }
         
      }
      else{
         // Incorrect password
         //echo 'Incorrect username!';
         header('Location: ../loginpage.php?fail=2');
      }
   } else{
      header('Location: ../loginpage.php?fail=1');
   }

	$stmt->close();
}
?>

</body>
</html>
