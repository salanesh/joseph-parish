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
    <div class="container-fluid mx-auto" style="width: 70rem">                     
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Role ID</th>
                    <th scope="col">Role Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                  
                <?php
                    $sql="SELECT * from roles where roleID !=1";
                    $shit=mysqli_query($connection,$sql); 
                    while($row = mysqli_fetch_assoc($shit)) {
                       echo "<tr>";
                       echo "<th>";
                       echo $row['roleID'];
                       echo "</th>";
                       echo "<td>";
                       echo $row['roleName'];
                       echo "</td>";
                       echo "<td>";
                       echo $row['roleDesc'];
                       echo "</td>";
                       echo "<td>";
                       echo "<button class='btn btn-secondary open-editUser' data-toggle='modal' data-id=".$row['roleID']." data-target='#editRoleModal'>Edit</button>";
                       echo "&nbsp";
                       echo "<a href='../controllers/staff-role-controller.php?deactID=".$row['roleID']."'><button class='btn btn-danger' onclick = 'return confirm(Are you sure?)'>Deactivate</button></a>";
                       echo "</td>";
                       echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <!-- add role modal -->
    <div class="modal fade" id="AddRoleModal" tabindex="-1" role="dialog" aria-labelledby="AddRoleLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddRoleLabel">Add A Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/staff-role-controller.php" method="POST" name="addRoleForm">
                        <div class="form-group">
                            <label for="rolename" >Role Name:</label>
                            <input type="text" class="form-control" id="rolename" name="roleNames">
                        </div>
                        <div class="form-group">
                            <label for="roleDescArea">Role Description:</label>
                            <textarea name="roleDescription" id="roleDescArea" class="form-control" columns= "10" rows="5"></textarea>
                        </div>   
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name="addRole">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit role modal -->
    <div class="modal fade" id="editRoleModal" tabindex="-1" role="dialog" aria-labelledby="EditRoleLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditRoleLabel">Edit Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/staff-role-controller.php" method="POST" name="editRoleForm">
                        <div class="form-group">
                            <input type="hidden" name="passedID" id="passedID">
                        </div>
                        <div class="form-group">
                            <label for="rolename" >Role Name:</label>
                            <input type="text" class="form-control" id="rolename" name="roleNames">
                        </div>
                        <div class="form-group">
                            <label for="roleDescArea">Role Description:</label>
                            <textarea name="roleDescription" id="roleDescArea" class="form-control" columns= "10" rows="5"></textarea>
                        </div>   
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name="editRole">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>