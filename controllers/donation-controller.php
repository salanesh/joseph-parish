<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donations Controller</title>
</head>   
<body>
    <?php

    if(isset($_POST["addDonation"])){
        addDonation();
    }
    if(isset($_POST["editDonation"])){
        editDonation();
    }

    if(isset($_POST["AddDonationCategory"])){
        addDonationCategory();
    }
   


    function addDonation(){
        require("../custom-php/connector.php");
        $roleSelected = 1;
        $donationID = $_POST["donID"];
        $userID = $_POST["userid"];
        $catID = $_POST["catid"];
        $eventID = $_POST["eventid"];
        $donationamount = $_POST["donAmount"];
        $donationdate = $_POST["donDate"];
        $donationtype = $_POST["donType"];
       


       //statements now//
        $statement = $connection->prepare("INSERT INTO donations(donationID,userID,catID,eventID,donationAmount,donationDate,donationType) values(?,?,?,?,?,?,?)");
        $statement->bind_param("iiiiiiis",$roleSelected,$donationID,$userID,$catID,$eventID,$donationamount,$donationdate,$donationtype);
        $statement->execute();
        // echo('the shit has been added');
       $statement->close();
        $connection->close();
        $succText="Successfully Added the donation";
    }

    function editdonation(){
        require("../custom-php/connector.php");


         $param1="";
         $sqlSelector = "UPDATE users set";
         if(!empty($_POST["rolekey"])){
             $sqlSelector .=" roleID=?,";
             $param1 .="i";
             $param2[] = $_POST["rolekey"];
         }
         if(!empty($_POST["donationID"])){
             $sqlSelector .=" donationID=?,";
             $param1 .="s";
             $param2[] = $_POST["donationId"];
         }
         if(!empty($_POST["userID"])){
             $sqlSelector .=" userID=?,";
             $param1 .="s";
             $param2[] = $_POST["userID"];
         }
         if(!empty($_POST["catID"])){
             $sqlSelector .=" catID=?,";
             $param1 .="s";
             $param2[] = $_POST["catID"];
         }
         if(!empty($_POST["eventID"])){
             $sqlSelector .=" eventID=?,";
             $param1 .="i";
             $param2[] = $_POST["eventID"];
         }
         if(!empty($_POST["donationamount"])){
             $sqlSelector .=" donationamount=?,";
             $param1 .="s";
             $param2[] = $_POST["donationamount"];
         }
         if(!empty($_POST["donationdate"])){
             $sqlSelector .=" donationdate=?,";
             $param1 .="s";
             $param2[] = $_POST["donationdate"];
         }
         if(!empty($_POST["donationtype"])){
             $sqlSelector .=" donationtype=?,";
             $param1 .="s";
             $param2[] = $_POST["donationtype"];
         }
        

          $stmt = $connection->prepare($sqlSelector);
          $stmt->bind_param($param1,...$param2);
          $stmt->execute();
          $stmt->close();
          $connection->close();
          $succText="Successfully updated the donation data";
    }

    function addDonationCategory(){
        require("../custom-php/connector.php");
        $roleSelected = 1;
        $catName = $_POST["catName"];
        $catDesc = $_POST["catDesc"];
        
       //statements now//
        $statement = $connection->prepare("INSERT INTO categories(catName,catDesc) values(?,?)");
        $statement->bind_param("sss",$roleSelected,$catName,$catDesc);
        $statement->execute();
        // echo('the shit has been added');
       $statement->close();
        $connection->close();
        $succText="Successfully Added the donation category";
    
    

    header("Location: ../staff-view/staff-donation.php?success=".$succText);
    ?>
</body>
</html>