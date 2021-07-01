<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Announcements</title>
    <?php
    include("../shared-html/header-links-loggedin.html");
    ?>
</head>
<body>
    <?php
    require("../shared-html/staffnav.html");
    if(!$_SESSION['userID']){
        header('Location: ../loginpage.php');
    }
    ?>
            <div class="card mx-auto special-card my-3 special-card" style="width: 48rem">
            <div class="card-body">
                <h2 class="text-center">ANNOUNCEMENTS</h2>
                <p align="justify" style="text-indent: 20px">In celebration of the 500 years of Christianity in the Philippines, our parish celebrates a year-long Jubilee. 
                We have a program every month. Just this month of June we had Ayos/Linis Kapilya wherein all chapels in the parish do cleaning and repairing their chapels.</p>
            </div>
</body>
</html>