<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parishioners Controller</title>
</head>   
<body>
    <?php

    if(isset($_POST["addparishioners"])){
        addparishioners();
    }
    if(isset($_POST["editparishioners"])){
        editparishioners();
    }
    if(isset($_GET["deactID"])){
        deactivateparishioners();
    }


    function addparishioners(){
        require("../custom-php/connector.php");
        $roleSelected = 1;
        $parishionersFname = $_POST["fname"];
        $parishionersLname = $_POST["lname"];
        $parishionersMname = $_POST["mname"];
        $parishionersBday = $_POST["parishionersBday"];
        $parishionersAddress = $_POST["parishionersAddress"];
        $parishionersEmail = $_POST["parishionersEmail"];
        $parishionersPassword = $_POST["parishionersPassword"];
        $parishionersStatus = 1;


        // var_dump($parishionersFname);
        // echo "<br>";
        // var_dump($parishionersLname);
        // echo "<br>";
        // var_dump($parishionersMname);
        // echo "<br>";
        // var_dump($parishionersBday);
        // echo "<br>";
        // var_dump($parishionersAddress);
        // echo "<br>";
        // var_dump($parishionersEmail);
        // echo "<br>";
        // var_dump($parishionersPassword);
        // echo "<br>";
        //statements now//
        $statement = $connection->prepare("INSERT INTO users(roleID,fName,mName,lName,userBday,userAddress,email,userPass,userStatus) values(?,?,?,?,?,?,?,?,?)");
        $statement->bind_param("issssssis",$roleSelected,$parishionersFname,$parishionersLname,$parishionersMname,$parishionersBday,$parishionersAddress,$parishionersEmail,$parishionersPassword,$parishionersStatus);
        $statement->execute();
        // echo('the shit has been added');
       $statement->close();
        $connection->close();
        $succText="Successfully Added the parishioner";
    }

    function editparishioners(){
        require("../custom-php/connector.php");

         $param1="";
         $sqlSelector = "UPDATE users set";
         if(!empty($_POST["rolekey"])){
             $sqlSelector .=" roleID=?,";
             $param1 .="i";
             $param2[] = $_POST["rolekey"];
         }
         if(!empty($_POST["fname"])){
             $sqlSelector .=" fName=?,";
             $param1 .="s";
             $param2[] = $_POST["fname"];
         }
         if(!empty($_POST["lname"])){
             $sqlSelector .=" lName=?,";
             $param1 .="s";
             $param2[] = $_POST["parishionersLname"];
         }
         if(!empty($_POST["mname"])){
             $sqlSelector .=" mName=?,";
             $param1 .="s";
             $param2[] = $_POST["parishionersMname"];
         }
         if(!empty($_POST["parishionersBday"])){
             $sqlSelector .=" userBday=?,";
             $param1 .="i";
             $param2[] = $_POST["parishionersBday"];
         }
         if(!empty($_POST["parishionersAddress"])){
             $sqlSelector .=" userAddress=?,";
             $param1 .="s";
             $param2[] = $_POST["parishionersAddress"];
         }
         if(!empty($_POST["parishionersEmail"])){
             $sqlSelector .=" userEmail=?,";
             $param1 .="s";
             $param2[] = $_POST["parishionersEmail"];
         }
         if(!empty($_POST["parishionersPassword"])){
             $sqlSelector .=" userPass=?,";
             $param1 .="s";
             $param2[] = $_POST["parishionersPassword"];
         }
         if(!empty($_POST["parishionersStatus"])){
            $sqlSelector .=" userStatus=?,";
            $param1 .="s";
            $param2[] = $_POST["parishionersStatus"];
        }
         if(!empty($_POST["editID"])){
            $param1 .="i";
            $param2[] = $_POST["editID"];
        }
         $param1 .="i";
         $param2[]=$_POST["passedID"];
         $sqlSelector=substr_replace($sqlSelector,"",-1);
         $sqlSelector.=" where userID=?";
        //  echo "<h1>";
        //  echo $sqlSelector;
        //  echo "</h1>";
        //  echo "<br>";
        // var_dump($param1);
        // echo "<br>";
        // var_dump($param2);

          $stmt = $connection->prepare($sqlSelector);
          $stmt->bind_param($param1,...$param2);
          $stmt->execute();
          $stmt->close();
          $connection->close();
          $succText="Successfully updated the parishioner data";
    }

    function deactivateparishioners(){
        require("../custom-php/connector.php");
        $stmt = $connection->prepare("UPDATE users set userStatus=0 where userID=?");
        $stmt->bind_param("i",$_GET["deactID"]);
        $stmt->execute();
        $stmt->close();
        $connection->close();
        $succText="Successfully deactivated the parishioner";
    }
    

    header("Location: ../staff-view/staff-manage-parishioners.php?success=".$succText);
    ?>
</body>
</html>