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
    require("../custom-php/connector.php");
    $roleSelected = 1;
    $parishionersFname = $_POST["parishionersfname"];
    $parishionersLname = $_POST["parishionerslname"];
    $parishionersMname = $_POST["parishionersmname"];
    $parishionersBday = $_POST["parishionersbday"];
    $parishionersAddress = $_POST["parishionersaddress"];
    $parishionersContactNumber= $_POST["parishionerscontact"];
    $parishionersEmail = $_POST["parishionersemail"];
    $parishionersPassword = $_POST["parishionerspassword"];
    $parishionersStatus = 1;

    //use var_dump to check if the variables are holding the right data
    //  var_dump($parishionersFname);
    //  echo("<br>");
    //  var_dump($parishionersMname);
    //  echo("<br>");
    //  var_dump($parishionersLname);
    //  echo("<br>");
    //  var_dump($parishionersBday);
    //  echo("<br>");
    //  var_dump($roleSelected);
    //  echo("<br>");
    //  var_dump($parishionersAddress);
    //  echo("<br>");
    //  var_dump($parishionersEmail);
    //  echo("<br>");
    //  var_dump($parishionersPassword);

    $statement = $connection->prepare("INSERT INTO Users(roleID,fName,lName,mName,userAddress,email,userPass,userStatus,userBday) values(?,?,?,?,?,?,?,?,?)");
    $statement->bind_param("issssssis",$roleSelected,$parishionersFname,$parishionersLname,$parishionersMname,$parishionersAddress,$parishionersEmail,$parishionersPassword,$parishionersStatus,$parishionersBday);
    $statement->execute();
    //echo('the shit has been added');
    
    $statement->close();
    $connection->close();

   header( "Location: ../loginpage.php" );


    ?>
</body>
</html>