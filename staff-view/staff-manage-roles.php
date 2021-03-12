<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Roles</title>
    <?php
    include("../shared-html/header-links-loggedin.html");
    require("../custom-php/connector.php");
    ?>
</head>
<body>
<script src="../custom-js/staff-functions.js"></script>
    <?php
    require("../shared-html/staffnav.html");
    ?>

<div class="container-fluid staff-content">
    <div class="container-fluid my-3 mx-auto" style="width: 20rem">
        <button class="btn btn-primary" data-toggle="modal" data-target="#AddRoleModal">Add Role</button>
    </div>
</div>
</body>
</html>