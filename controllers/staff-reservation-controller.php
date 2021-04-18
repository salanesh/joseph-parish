<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff RESERVATION CONTROLLER</title>
</head>
<body>
    <?PHP
        if(isset($_POST["addMarriage"])){
            addMarriage();
        }   
        if(isset($_POST["addConfirm"])){
            addConfirmation();
        }
        if(isset($_POST["addBaptism"])){
            addBaptism();
        }
        function addMarriage(){
            require("../custom-php/connector.php");
            $userID = $_POST["userID"];
            $serviceID = $_POST["serviceID"];
            $inDate = $_POST["inDate"];
            $outDate = $_POST["outDate"];
            //groom info
            // $gFname = $_POST["g-fname"];
            // $gMname = $_POST["g-mname"];
            // $gLname = $_POST["g-lname"];
            $gbday = $_POST["gbday"];
            // $gFatherFname = $_POST["g-father-fname"];
            // $gFatherMname = $_POST["g-father-mname"];
            // $gFatherLname = $_POST["g-father-lname"];
            // $gMotherMname = $_POST["g-mother-mname"];
            // $gMotherFname = $_POST["g-mother-fname"];
            // $gMotherLname = $_POST["g-mother-lname"];
            $groomAddress = $_POST["groomAddress"];
            //bride info
            // $bFname = $_POST["b-fname"];
            // $bMname = $_POST["b-mname"];
            // $bLname = $_POST["b-lname"];
            $bbday = $_POST["bbday"];
            // $bFatherFname = $_POST["b-father-fname"];
            // $bFatherMname = $_POST["b-father-mname"];
            // $bFatherLname = $_POST["b-father-lname"];
            // $bMotherMname = $_POST["b-mother-mname"];
            // $bMotherFname = $_POST["b-mother-fname"];
            // $bMotherLname = $_POST["b-mother-lname"];
            $brideAddress = $_POST["brideAddress"];
            //combined names
            $gFullName = $_POST["g-fname"].$_POST["g-mname"].$_POST["g-lname"];
            $gFatherFullName = $_POST["g-father-fname"].$_POST["g-father-mname"].$_POST["g-father-lname"];
            $gMotherFullName = $_POST["g-mother-fname"].$_POST["g-mother-mname"].$_POST["g-mother-lname"];
            $bFullName = $_POST["b-fname"].$_POST["b-mname"].$_POST["b-lname"];
            $bFatherFullName = $_POST["b-father-fname"].$_POST["b-father-mname"].$_POST["b-father-lname"];
            $bMotherFullName = $_POST["b-mother-fname"].$_POST["b-mother-mname"].$_POST["b-mother-lname"];
            //statements

            try{
                $mysqli->autocommit(false)//turns on transactions
                $stmt1 = $mysqli->prepare("INSERT INTO reservations(serviceID,reserveInDate,reserveOutDate,reserveStatus)values(1,?,?,1);");
                $stmt2 = $mysqli->prepare("INSERT INTO marriage(reservationID,serviceID,groomName,groomDadName,groomMomName,groomAge,groomAddress,brideName,brideDadName,brideMomName,brideAge,brideAddress)
                values(LAST_INSERT_ID(),1,?,?,?,?,?,?,?,?,?,?");
                $stmt1->bind_param("ii",$inDate,$outDate);
                $stmt2->bind_param("sssissssis",$gFullName,$gFatherFullName,$gMotherFullName);
                $stmt1->execute();
                $stmt2->execute();
                $stmt1->close();
                $stmt2->close();
                $mysqli->autocommit(true);//turns off transactions and commits queued queries
            }catch(Exception $e){
                $mysqli->rollback();//remove all queries if error
                throw $e;
            }
            header("Location: ../staff-view/staff-reservation.php");
        }
        function addBaptism(){
            require("../custom-php/connector.php");

            
        }
        function addConfirmation(){
            require("../custom-php/connector.php");


            
        }
    ?>
</body>
</html>