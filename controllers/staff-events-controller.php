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

    if(isset($_POST["addEvent"])){
        addEvent();
    }
    if(isset($_POST["editEvent"])){
        editEvent();
    }
    if(isset($_GET["deactID"])){
        deactivateEvent();
        }


    function addEvent(){
        require("../custom-php/connector.php");
        $eventName = $_POST["eventname"];
        $eventDesc = $_POST["eventDesc"];
        $eventStartDate = $_POST["eventStartDate"];
        $eventStartTime = $_POST["eventStartTime"];
        $eventEndDate = $_POST["eventEndDate"];
        $eventEndTime = $_POST["eventEndTime"];
        $eventImage = $_POST["eventImage"];
        $eventStatus = $_POST["eventStatus"];
        $donationGoal = $_POST["donationGoal"];
    
    
    $statement = $connection->prepare("INSERT INTO Events(eventName,eventDesc,eventStartDate,eventStartTime,eventEndDate,eventEndTime,eventImage,eventStatus,donationGoal) values(?,?,?,?,?,?,?,?,?)");
    $statement->bind_param("sssisisii",$eventName,$eventDesc,$eventStartDate,$eventStartTime,$eventEndDate,$eventEndTime,$eventImage,$eventStatus,$donationGoal);
    $statement->execute();
    
    $statement->close();
    $connection->close();
    $succText="Successfully Added the employee";
    }

    function editEvent(){
        require("../custom-php/connector.php");


        //use var_dump to check if the variables are holding the right data
        //   echo("<br>");
        //   var_dump($_POST["eventname"]);
        //   var_dump($_POST["eventDesc"]);
        //   echo("<br>");
        //   var_dump($_POST["eventStartDate"]);
        //   echo("<br>");
        //   var_dump($_POST["eventStartTime"]);
        //   echo("<br>");
        //   var_dump($_POST["eventEndDate"]);
        //   echo("<br>");
        //   var_dump($_POST["eventEndTime"]);
        //   echo("<br>");
        //   var_dump($_POST["eventImage"]);
        //   echo("<br>");
        //   var_dump($_POST["eventStatus"]);
        //   echo("<br>");
        //   var_dump($_POST["donationGoal"]);
        //   echo("<br>");
        //   var_dump($_POST["passedID"]);
         $param1="";
         $sqlSelector = "UPDATE Events set";
         if(!empty($_POST["eventname"])){
             $sqlSelector .=" eventName=?,";
             $param1 .="s";
             $param2[] = $_POST["eventname"];
         }
         if(!empty($_POST["eventdesc"])){
             $sqlSelector .=" eventDesc=?,";
             $param1 .="s";
             $param2[] = $_POST["eventdesc"];
         }
         if(!empty($_POST["eventStartDate"])){
             $sqlSelector .=" eventStartDate=?,";
             $param1 .="s";
             $param2[] = $_POST["eventStartDate"];
         }
         if(!empty($_POST["eventStartTime"])){
             $sqlSelector .=" eventStartTime=?,";
             $param1 .="i";
             $param2[] = $_POST["eventStartTime"];
         }
         if(!empty($_POST["eventEndDate"])){
             $sqlSelector .=" eventEndDate=?,";
             $param1 .="s";
             $param2[] = $_POST["eventEndDate"];
         }
         if(!empty($_POST["eventEndTime"])){
             $sqlSelector .=" eventEndTime=?,";
             $param1 .="i";
             $param2[] = $_POST["eventEndTime"];
         }
         if(!empty($_POST["eventImage"])){
             $sqlSelector .=" eventImage=?,";
             $param1 .="s";
             $param2[] = $_POST["eventImage"];
         }
         if(!empty($_POST["eventStatus"])){
             $sqlSelector .=" eventStatus=?,";
             $param1 .="i";
             $param2[] = $_POST["eventStatus"];
         }
         if(!empty($_POST["donationGoal"])){
            $sqlSelector .=" donationGoal=?,"; 
            $param1 .="i";
            $param2[] = $_POST["donationGoal"];
        }
         $param1 .="i";
         $param2[]=$_POST["passedID"];
         $sqlSelector=substr_replace($sqlSelector,"",-1);
         $sqlSelector.=" where eventID=?";
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
           $succText="Successfully updated the event data";
    }

    function deactivateEvent(){
        require("../custom-php/connector.php");
        $stmt = $connection->prepare("UPDATE Events set eventStatus=0 where eventID=?");
        $stmt->bind_param("i",$_GET["deactID"]);
        $stmt->execute();
        $stmt->close();
        $connection->close();
        $succText="Successfully deactivated the event";
    }
    

     header("Location: ../staff-view/staff-events.php?success=".$succText);
    ?>
</body>
</html>