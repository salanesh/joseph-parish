<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Controller</title>
</head>   
<body>
    <?php
    require("../custom-php/connector.php");

    if(isset($_POST["addID"])){
        addService();
    }
    if(isset($_POST["editID"])){
        editService();
    }
     if(isset($_GET["deleteID"])){
        deleteService();
    }
    
    

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

    function addService(){
        require("../custom-php/connector.php");
        //var_dump($connection);
    
    $serviceNames = $_POST["servicenames"];
    $serviceDescs = $_POST["servicedescs"];
    $servicePrices = $_POST["serviceprices"];
    $servicePics = $_POST["servicepics"];
    $serviceReqss = $_POST["servicereqss"];

    $statement = $connection->prepare("INSERT INTO church_services(serviceName,serviceDesc,servicePrice,servicePic,serviceReqs) values(?,?,?,?,?)");
    $statement->bind_param("sssss",$serviceNames,$serviceDescs,$servicePrices,$servicePics,$serviceReqss);
    $statement->execute();
    // echo('the shit has been added');
    
    $statement->close();
    $connection->close();
    
    }
    function editService(){
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
         $param1="";
         $sqlSelector = "UPDATE church_services set";
         if(!empty($_POST["servicenamess"])){
             $sqlSelector .=" serviceName=?,";
             $param1 .="s";
             $param2[] = $_POST["servicenamess"];
         }
         if(!empty($_POST["servicedescs"])){
             $sqlSelector .=" serviceDesc=?,";
             $param1 .="s";
             $param2[] = $_POST["servicedescs"];
         }
         if(!empty($_POST["serviceprices"])){
             $sqlSelector .=" servicePrice=?,";
             $param1 .="s";
             $param2[] = $_POST["serviceprices"];
         }
         if(!empty($_POST["servicepics"])){
             $sqlSelector .=" servicePic=?";
             $param1 .="s";
             $param2[] = $_POST["servicepics"];
         }
         if(!empty($_POST["servicereqss"])){
             $sqlSelector .=" serviceReqs=?,";
             $param1 .="s";
             $param2[] = $_POST["servicereqss"];
         }
         $param1 .="i";
         $param2[]=$_POST["passedID"];
         $sqlSelector=substr_replace($sqlSelector,"",-1);
         $sqlSelector.=" where serviceID=?";

          $statement = $connection->prepare($sqlSelector);
          $statement->bind_param($param1,...$param2);
          $statement->execute();
          $statement->close();
          $connection->close();
          $succText="Successfully updated the employee data";
    }

    function deleteService(){
        require("../custom-php/connector.php");
        $statement = $connection->prepare("DELETE FROM church_services WHERE serviceID= ?");
        $statement->bind_param("i",$_GET["deleteID"]);
        $statement->execute();
        $statement   ->close();
        $connection->close();
    }

    header("Location: ../staff-view/staff-church-services.php?success=".$succText);
    ?>
</body>
</html>