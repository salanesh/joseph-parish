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

    $statement = $connection->prepare("INSERT INTO events(eventName,eventDesc,eventStartDate,eventStartTime,eventEndDate,eventEndTime,eventImage,eventStatus,donationGoal) values(?,?,?,?,?,?,?,?,?)");
    $statement->bind_param("sssisisii",$eventName,$eventDesc,$eventStartDate,$eventStartTime,$eventEndDate,$eventEndTime,$eventImage,$eventStatus,$donationGoal);
    $statement->execute();
    //echo('the shit has been added');
    
    $statement->close();
    $connection->close();

    header("Location: ../staff-view/staff-events.php");
    ?>
</body>
</html>