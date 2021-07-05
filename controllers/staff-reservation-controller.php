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
            echo("<h1>Marriage Function</h1>");
            echo("<br>");
            $one = 1;
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
            if(isset($_POST["cenomar"])){
                $cenomar = $_POST["cenomar"];
            }else{
                $cenomar = 0;
            }
            if(isset($_POST["seminarCert"])){
                $seminarCert = $_POST["seminarCert"];
            }else{
                $seminarCert = 0;
            }
            if(isset($_POST["confession"])){
                $confession = $_POST["confession"];
            }else{
                $confession = 0;
            }
            if(isset($_POST["civilRegistration"])){
                $civilRegistration = $_POST["civilRegistration"];
            }else{
                $civilRegistration = 0;
            }

            //vardumps
            // var_dump($cenomar);
            // echo("<br>");
            // var_dump($seminarCert);
            // echo("<br>");
            // var_dump($confession);
            // echo("<br>");
            // var_dump($civilRegistration);
            // echo("<br>");
            // var_dump($gFullName);
            // echo("<br>");
            // var_dump($bFullName);
            // echo("<br>");
            // var_dump($gFatherFullName);
            // echo("<br>");
            // var_dump($gMotherFullName);
            // echo("<br>");
            // var_dump($bFatherFullName);
            // echo("<br>");
            // var_dump($bMotherFullName);
            // echo("<br>");
            // var_dump($gbday);
            // echo("<br>");
            // var_dump($bbday);
            // echo("<br>");
            // var_dump($inDate);
            // echo("<br>");
            // var_dump($outDate);
            // echo("<br>");
            // var_dump($userID);

            //statements
            //still need to get the actual userID logged in instead of a placeholder id of 1
            try{
                $connection->autocommit(false);//turns on transactions
                $stmt1 = $connection->prepare("INSERT INTO Reservations(userID,serviceID,reserveInDate,reserveOutDate,reserveStatus)values(?,?,?,?,?);");
                $stmt1->bind_param("iissi",$userID,$serviceID,$inDate,$outDate,$one);
                $stmt1->execute();
                $stmt1->close();
                $reserveID = $connection->insert_id;
                $stmt2 = $connection->prepare("INSERT INTO Marriage(reservationID,serviceID,groomName,groomDadName,groomMomName,groomBday,groomAddress,brideName,brideDadName,brideMomName,brideBday,brideAddress,cenomar,seminarCert,confession,civilRegistration)
                values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
                $stmt2->bind_param("iissssssssssiiii",$reserveID,$serviceID,$gFullName,$gFatherFullName,$gMotherFullName,$gbday,$groomAddress,$bFullName,$bFatherFullName,$bMotherFullName,$bbday,$brideAddress,$cenomar,$seminarCert,$confession,$civilRegistration);
                $stmt2->execute();
                $stmt2->close();
                $connection->autocommit(true);//turns off transactions and commits queued queries
            }catch(Exception $e){
                $connection->rollback();//remove all queries if error
                throw $e;
            }
            
            $connection->close();
            header("Location: ../staff-view/staff-reservation.php");
        }
        function addBaptism(){
            require("../custom-php/connector.php");
            echo("<h1>Baptism Function</h1>");
            echo("<br>");
            //catchers
            $one = 1;
            $userID = $_POST["userID"];
            $serviceID = $_POST["serviceID"];
            $childFname = $_POST["child-fname"];
            $childMname = $_POST["child-mname"];
            $childLname = $_POST["child-lname"];
            $fatherName = $_POST["father-name"];
            $motherName = $_POST["mother-name"];
            $birthPlace = $_POST["child-birthplace"];
            $bday = $_POST["child-bday"];
            $inDate = $_POST["inDate"];
            $outDate = $_POST["outDate"];
            if(isset($_POST["sponsorList"])){
                $sponsorList = $_POST["sponsorList"];
            }else{
                $sponsorList = 0;
            }
            //var dump checks
            // var_dump($sponsorList);
            // echo("<br>");
            // var_dump($userID);
            // echo("<br>");
            // var_dump($serviceID);
            // echo("<br>");
            // var_dump($childFname);
            // echo("<br>");
            // var_dump($childMname);
            // echo("<br>");
            // var_dump($childLname);
            // echo("<br>");
            // var_dump($fatherName);
            // echo("<br>");
            // var_dump($motherName);
            // echo("<br>");
            // var_dump($birthPlace);
            // echo("<br>");
            // var_dump($bday);
            // echo("<br>");
            // var_dump($inDate);
            // echo("<br>");
            // var_dump($outDate);
            // echo("<br>");
            //insert statements
            try{
                $connection->autocommit(false);//turns on transactions
                $stmt1 = $connection->prepare("INSERT INTO Reservations(userID,serviceID,reserveInDate,reserveOutDate,reserveStatus)values(?,?,?,?,?);");
                $stmt1->bind_param("iissi",$userID,$serviceID,$inDate,$outDate,$one);
                $stmt1->execute();
                $stmt1->close();
                $reserveID = $connection->insert_id;
                $stmt2 = $connection->prepare("INSERT INTO Baptism(reservationID,serviceID,childFname,childMname,childLname,momName,dadName,birthplace,birthdate,sponsorList)
                values(?,?,?,?,?,?,?,?,?);");
                $stmt2->bind_param("iisssssssi",$reserveID,$serviceID,$childFname,$childMname,$childLname,$fatherName,$motherName,$birthPlace,$bday,$sponsorList);
                $stmt2->execute();
                $stmt2->close();
                $connection->autocommit(true);//turns off transactions and commits queued queries
            }catch(Exception $e){
                $connection->rollback();//remove all queries if error
                throw $e;
            }
            $connection->close();
            //header("Location: ../staff-view/staff-reservation.php");
        }
        function addConfirmation(){
            require("../custom-php/connector.php");
            echo("<h1>Confirmation Function</h1>");
            echo("<br>");
            $one = 1;
            $userID = $_POST["userID"];
            $serviceID = $_POST["serviceID"];
            $childFname = $_POST["child-fname"];
            $childMname = $_POST["child-mname"];
            $childLname = $_POST["child-lname"];
            $fatherName = $_POST["father-name"];
            $motherName = $_POST["mother-name"];
            $birthPlace = $_POST["child-birthplace"];
            $baptismDate = $_POST["baptism-date"];
            $bday = $_POST["child-bday"];
            $inDate = $_POST["inDate"];
            $outDate = $_POST["outDate"];
            if(isset($_POST["baptismCert"])){
                $baptismCert = $_POST["baptismCert"];
            }else{
                $baptismCert = 0;
            }
            if(isset($_POST["sponsorOne"])){
                $sponsorOne = $_POST["sponsorOne"];
            }else{
                $sponsorOne = 0;
            }
            if(isset($_POST["sponsorTwo"])){
                $sponsorTwo = $_POST["sponsorTwo"];
            }else{
                $sponsorTwo = 0;
            }
            //var dump variable checks
            // var_dump($userID);
            // echo("<br>");
            // var_dump($serviceID);
            // echo("<br>");
            // var_dump($childFname);
            // echo("<br>");
            // var_dump($childMname);
            // echo("<br>");
            // var_dump($childLname);
            // echo("<br>");
            // var_dump($fatherName);
            // echo("<br>");
            // var_dump($motherName);
            // echo("<br>");
            // var_dump($birthPlace);
            // echo("<br>");
            // var_dump($bday);
            // echo("<br>");
            // var_dump($inDate);
            // echo("<br>");
            // var_dump($outDate);
            // echo("<br>");
            // var_dump($baptismDate);
            // echo("<br>");

            //insert statements
            try{
                $connection->autocommit(false);//turns on transactions
                $stmt1 = $connection->prepare("INSERT INTO Reservations(userID,serviceID,reserveInDate,reserveOutDate,reserveStatus)values(?,?,?,?,?);");
                $stmt1->bind_param("iissi",$userID,$serviceID,$inDate,$outDate,$one);
                $stmt1->execute();
                $stmt1->close();
                $reserveID = $connection->insert_id;
                $stmt2 = $connection->prepare("INSERT INTO Confirmation(reservationID,serviceID,confirmFname,confirmMname,confirmLname,momName,dadName,birthplace,birthdate,baptismdate,baptismCert,sponsorOne,sponsorTwo)
                values(?,?,?,?,?,?,?,?,?,?,?,?,?);");
                $stmt2->bind_param("iissssssssiii",$reserveID,$serviceID,$childFname,$childMname,$childLname,$fatherName,$motherName,$birthPlace,$bday,$baptismDate,$baptismCert,$sponsorOne,$sponsorTwo);
                $stmt2->execute();
                $stmt2->close();
                $connection->autocommit(true);//turns off transactions and commits queued queries
            }catch(Exception $e){
                $connection->rollback();//remove all queries if error
                throw $e;
            }
            $connection->close();
            //header("Location: ../staff-view/staff-reservation.php");
        }
    ?>
</body>
</html>