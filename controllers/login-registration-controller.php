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
    // var_dump($empFname);
    // echo("<br>");
    // var_dump($empMname);
    // echo("<br>");
    // var_dump($empLname);
    // echo("<br>");
    // var_dump($empBday);
    // echo("<br>");
    // var_dump($roleSelected);
    // echo("<br>");
    // var_dump($empAddress);
    // echo("<br>");
    // var_dump($empEmail);
    // echo("<br>");
    // var_dump($empPassword);

    $statement = $connection->prepare("INSERT INTO users(roleID,fName,lName,mName,userAddress,email,userPass,userStatus,userBday) values(?,?,?,?,?,?,?,?,?)");
    $statement->bind_param("issssssis",$roleSelected,$parishionersFname,$parishionersLname,$parishionersMname,$parishionersAddress,$parishionersEmail,$parishionersPassword,$parishionersStatus,$parishionersBday);
    $statement->execute();
    echo('the shit has been added');
    
    $statement->close();
    $connection->close();

    //header( "Location: ../staff-view/staff-manage-parishioners.php" );


    ?>
</body>
</html>