<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Controller</title>
</head>   
<body>
    <?php

    if(isset($_POST["addEmployee"])){
        addEmployee();
    }
    if(isset($_POST["editEmployee"])){
        editEmployee();
    }
    if(isset($_GET["deactID"])){
        deactivateEmployee();
    }


    function addEmployee(){
        require("../custom-php/connector.php");
        $roleSelected = $_POST["rolekey"];
        $empFname = $_POST["fname"];
        $empLname = $_POST["lname"];
        $empMname = $_POST["mname"];
        $empBday = $_POST["empbday"];
        $empAddress = $_POST["empaddress"];
        $empEmail = $_POST["empemail"];
        $empPassword = $_POST["emppassword"];
        $empStatus = 1;

        //statements now//
        $statement = $connection->prepare("INSERT INTO users(roleID,fName,lName,mName,userAddress,email,userPass,userStatus,userBday) values(?,?,?,?,?,?,?,?,?)");
        $statement->bind_param("issssssis",$roleSelected,$empFname,$empLname,$empMname,$empAddress,$empEmail,$empPassword,$empStatus,$empBday);
        $statement->execute();
        // echo('the shit has been added');
        $statement->close();
        $connection->close();
        $succText="Successfully Added the employee";
    }

    function editEmployee(){
        require("../custom-php/connector.php");


        //use var_dump to check if the variables are holding the right data
        //  echo("<br>");
        //  var_dump($_POST["rolekey"]);
        //  var_dump($_POST["fname"]);
        //  echo("<br>");
        //  var_dump($_POST["lname"]);
        //  echo("<br>");
        //  var_dump($_POST["mname"]);
        //  echo("<br>");
        //  var_dump($_POST["empbday"]);
        //  echo("<br>");
        //  var_dump($_POST["empaddress"]);
        //  echo("<br>");
        //  var_dump($_POST["empemail"]);
        //  echo("<br>");
        //  var_dump($_POST["emppassword"]);
        
         $sqlSelector = "UPDATE users set";
         if(!empty($_POST["rolekey"])){
             $sqlSelector .=" roleID=?,";
             $param1 .="i";
         }
         if(!empty($_POST["fname"])){
             $sqlSelector .=" fName=?,";
             $param1 .="s";
         }
         if(!empty($_POST["lname"])){
             $sqlSelector .=" lName=?,";
             $param1 .="s";
         }
         if(!empty($_POST["mname"])){
             $sqlSelector .=" mName=?,";
             $param1 .="s";
         }
         if(!empty($_POST["empbday"])){
             $sqlSelector .=" fName=userBday,";
             $param1 .="i";
         }
         if(!empty($_POST["empaddress"])){
             $sqlSelector .=" userAddress=?,";
             $param1 .="s";
         }
         if(!empty($_POST["empemail"])){
             $sqlSelector .=" email=?,";
             $param1 .="s";
         }
         if(!empty($_POST["emppassword"])){
             $sqlSelector .=" userPass=?,";
             $param1 .="s";
         }
         $sqlSelector=substr_replace($sqlSelector,"",-1);
         $sqlSelector.=" where userID=?";
         echo "<h1>";
         echo $sqlSelector;
         echo "</h1>";
         echo "<br>";
         echo "<h1>";
         echo $param1;
         echo "</h1>";
        // $stmt = $connection->prepare("");
        // $stmt->bind_param("",);
        // $stmt->execute();
        // $stmt->close();
        // $connection->close();
        // $succText="Successfully updated the employee data";
    }

    function deactivateEmployee(){
        require("../custom-php/connector.php");
        $stmt = $connection->prepare("UPDATE users set userStatus=0 where userID=?");
        $stmt->bind_param("i",$_GET["deactID"]);
        $stmt->execute();
        $stmt->close();
        $connection->close();
        $succText="Successfully deactivated the employee";
    }
    

    //header("Location: ../staff-view/staff-manage-employees.php?success=".$succText);
    ?>
</body>
</html>