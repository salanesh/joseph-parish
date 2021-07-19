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

    if(isset($_GET["deactID"])){
        deactivateDonation();
    }

    
   


    function addDonation(){
        require("../custom-php/connector.php");
        $roleSelected = 1;
        $userID = $_POST["userID"];
        $catID = $_POST["catID"];
        $eventID = $_POST["eventID"];
        $donationamount = $_POST["donAmount"];
        $donationdate = $_POST["donDate"];
        $donationtype = $_POST["donType"];
        $donationStatus = 1;
       //var_dump($userID);
       //var_dump($catID);
       //var_dump($eventID);
       //var_dump($donationamount);
       //var_dump($donationdate);


        //statements now
         $statement = $connection->prepare("INSERT INTO Donations(userID,catID,eventID,donationAmount,donationDate,donationType,donationStatus) values(?,?,?,?,?,?,?)");
         $statement->bind_param("iiiiiii",$userID,$catID,$eventID,$donationamount,$donationdate,$donationtype,$donationStatus);
         $statement->execute();
         echo('the shit has been added');
         $statement->close();
         $connection->close();
         $succText="Successfully Added the donation";
    }

    function editdonation(){
        require("../custom-php/connector.php");
        echo($_POST["donationID"]);

         $param1="";
         $sqlSelector = "UPDATE Donations set";
         if(!empty($_POST["donationID"])){
            $sqlSelector .=" donationID=?,";
            $param1 .="i";
            $param2[] = $_POST["donationID"];
        }
         if(!empty($_POST["userID"])){
             $sqlSelector .=" userID=?,";
             $param1 .="i";
             $param2[] = $_POST["userID"];
         }
         if(!empty($_POST["catID"])){
             $sqlSelector .=" catID=?,";
             $param1 .="i";
             $param2[] = $_POST["catID"];
         }
         if(!empty($_POST["eventID"])){
             $sqlSelector .=" eventID=?,";
             $param1 .="i";
             $param2[] = $_POST["eventID"];
         }
         if(!empty($_POST["donationamount"])){
             $sqlSelector .=" donationamount=?,";
             $param1 .="i";
             $param2[] = $_POST["donationamount"];
         }
         if(!empty($_POST["donationdate"])){
             $sqlSelector .=" donationdate=?,";
             $param1 .="i";
             $param2[] = $_POST["donationdate"];
         }
         
         if(!empty($_POST["donationSatus"])){
            $sqlSelector .=" donationStatus=?,";
            $param1 .="i";
            $param2[] = $_POST["donationStatus"];
        }
        

          $stmt = $connection->prepare($sqlSelector);
          $stmt->bind_param($param1,...$param2);
          $stmt->execute();
          $stmt->close();
          $connection->close();
          $succText="Successfully updated the donation data";
    
        }

        
    function deactivateDonation(){
        require("../custom-php/connector.php");
        $stmt = $connection->prepare("UPDATE Donations set donationStatus=0 where donationID=?");
        $stmt->bind_param("i",$_GET["deactID"]);
        $stmt->execute();
        $stmt->close();
        $connection->close();
        $succText="Successfully deactivated the donation";
    }
    
        
    //  header("Location: ../staff-view/staff-donations.php?success=".$succText);
    ?>
</body>
</html>
