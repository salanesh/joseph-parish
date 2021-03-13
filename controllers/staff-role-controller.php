<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>role controller</title>
</head>
<body>
    <?php
        if(isset($_POST["addRole"])){
            addRole();
        }

        function addRole(){
            require("../custom-php/connector.php");
            $rolename = $_POST["roleNames"];
            $roledesc = $_POST["roleDescription"];

            // var_dump($rolename);
            // echo "<br>";
            // var_dump($roledesc);
            $statement = $connection->prepare("INSERT INTO roles(roleName,roleDesc) values(?,?)");
            $statement->bind_param("ss",$rolename,$roledesc);
            $statement->execute();
            
            $statement->close();
            $connection->close();
            $succText="Successfully Added the user role.";
        }

        header("Location: ../staff-view/staff-manage-roles.php")
    ?>
</body>
</html>