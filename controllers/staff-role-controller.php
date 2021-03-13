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
        if(isset($_POST["editRole"])){
            editRole();
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
        function editRole(){
            require("../custom-php/connector.php");
            $param1="";
            $sqlSelector = "UPDATE roles set";
            if($_POST["roleNames"]){
                $sqlSelector .= " roleName=?,";
                $param1 .="s";
                $param2[] = $_POST["roleNames"];
            }
            if($_POST["roleDescription"]){
                $sqlSelector = " roleDesc=?,";
                $param1 .="s";
                $param2[] = $_POST["roleDescription"];
            }
            $param1 .="i";
            $param2[]=$_POST["passedID"];
            $sqlSelector = substr_replace($sqlSelector,"",-1);
            $sqlSelector.=" where roleID=?";
            
            var_dump($param1);
            echo('<br>');
            var_dump($param2);
            echo("<br>");
            var_dump($sqlSelector);

            // $statement->bind_param($param1,$param2);
            // $statement->execute();

            // $statement->close();
            // $connection->close();
            // $succText="Successfully edited user role";
        }

        //header("Location: ../staff-view/staff-manage-roles.php")
    ?>
</body>
</html>