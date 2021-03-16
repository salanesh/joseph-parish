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
        $param1="";
        $sqlSelector = "UPDATE church_services set";
        if($_POST["serviceNames"]){
            $sqlSelector .= " serviceName=?,";
            $param1 .="s";
            $param2[] = $_POST["serviceNames"];
        }
        if($_POST["serviceDescs"]){
            $sqlSelector .= " serviceDesc=?,";
            $param1 .="s";
            $param2[] = $_POST["serviceDescs"];
        }
        if($_POST["servicePrices"]){
            $sqlSelector .= " servicePrice=?,";
            $param1 .="s";
            $param2[] = $_POST["servicePrices"];
        }
        if($_POST["servicePics"]){
            $sqlSelector .= " servicePic=?,";
            $param1 .="s";
            $param2[] = $_POST["servicePics"];
        }
        if($_POST["serviceReqss"]){
            $sqlSelector .= " serviceReqs=?,";
            $param1 .="s";
            $param2[] = $_POST["serviceReqss"];
        }
        $param1 .="i";
        $param2[]=$_POST["passedID"];
        $sqlSelector = substr_replace($sqlSelector,"",-1);
        $sqlSelector.=" where serviceID=?";
        
        //var_dump($param1);
        //echo('<br>');
        //var_dump($param2);
        //echo('<br>');
        //var_dump($sqlSelector);

        $statement = $connection->prepare($sqlSelector);
        $statement->bind_param($param1,...$param2);
        $statement->execute();
        $statement->close();
        $connection->close();
        $succText="Successfully edited user role";
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