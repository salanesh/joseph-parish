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
    $roleSelected = $_POST["rolekey"];
    $empFname = $_POST["fname"];
    $empLname = $_POST["lname"];
    $empMname = $_POST["mname"];
    var_dump($empFname);
    var_dump($empMname);
    var_dump($empLname);
    var_dump($roleSelected);
    ?>
</body>
</html>