<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation-Category Controller</title>
</head>   
<body>
    <?php

    if(isset($_POST["addDonationCategory"])){
        addDonationCategory();
    }
    if(isset($_POST["editDonationCategory"])){
        editDonationCategory();
    }

    if(isset($_GET["deactID"])){
        deactivateDonationCategory();
    }
   


    function addDonationCategory(){
        require("../custom-php/connector.php");
        $categoryname = $_POST["catName"];
        $categorydescription = $_POST["catDesc"];
        $catstatus = 1;
        
        //var_dump($_POST["catName"]);
        //echo("<br>");
        //var_dump($categorydescription);


        // statements now//
        $statement = $connection->prepare("INSERT INTO Categories(catName,catDesc,catStatus) values(?,?,?)");
        $statement->bind_param("ssi",$categoryname,$categorydescription,$catstatus);
        $statement->execute();
         echo('the shit has been added');
        $statement->close();
        $connection->close();
        $succText="Successfully Added the Donation Category";
    }

    function editDonationCategory(){
        require("../custom-php/connector.php");


         $param1="";
         $sqlSelector = "UPDATE Categories set";
         
         if(!empty($_POST["catName"])){
             $sqlSelector .=" catName=?,";
             $param1 .="s";
             $param2[] = $_POST["catName"];
         }
         if(!empty($_POST["catDesc"])){
             $sqlSelector .=" catDesc=?,";
             $param1 .="s";
             $param2[] = $_POST["catDesc"];
         }
         $param1 .="i";
         $param2[]=$_POST["passedID"];
         $sqlSelector=substr_replace($sqlSelector,"",-1);
         $sqlSelector.=" where catID=?";

        //  var_dump($param1);
        //  var_dump("<br>");
        //  var_dump($param2);
        //  echo("<h1>".$sqlSelector."</h1>");
         
        $stmt = $connection->prepare($sqlSelector);
        $stmt->bind_param($param1,...$param2);
        $stmt->execute();
        $stmt->close();
        $connection->close();
        $succText="Successfully updated the donation category data";
    }
    function deactivateDonationCategory(){
        require("../custom-php/connector.php");
        echo("ni sud siya");
        $stmt = $connection->prepare("UPDATE Categories set catStatus=0 where catID=?");
        $stmt->bind_param("i",$_GET["deactID"]);
        $stmt->execute();
        $stmt->close();
        $connection->close();
        $succText="Successfully deactivated the donation category";
    }
    
     header("Location: ../staff-view/staff-donationcategory.php?success=".$succText);
    ?>
</body>
</html>