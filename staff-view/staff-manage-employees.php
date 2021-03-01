<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employees</title>
    <?php
    include("../shared-html/header-links-loggedin.html");
    require("../custom-php/connector.php");
    ?>
</head>
<body>
    <?php
    require("../shared-html/staffnav.html");
    ?>
    <div class="container-fluid staff-content">
    <div class="container-fluid">
        <form class="form-inline my-2 mx-2">
        <input class="form-control mr-sm-2" type="search" placeholder="Search Employees" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    
    
    <div class="container-fluid my-3 mx-auto" style="width: 20rem">
        <button class="btn btn-primary" data-toggle="modal" data-target="#AddEmployeeModal">Add Employee</button>
    </div>
    
    <div class="container-fluid mx-auto" style="width: 70rem">                     
        <table class="table table-bordered table-hover">
            <thead class="bg-grey">
                <tr>
                    <th scope="col">Staff ID</th>
                    <th scope="col">Staff Name</th>
                    <th scope="col">Job</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                  
                <?php
                    $sql="SELECT u.userID, u.fName, u.mName, u.lName, r.roleName from users u,roles r where u.roleID=r.roleID and u.roleID!=1";
                    $shit=mysqli_query($connection,$sql); 
                    while($row = mysqli_fetch_assoc($shit)) {
                       echo "<tr>";
                       echo "<th>";
                       echo $row['userID'];
                       echo "</th>";
                       echo "<td>";
                       echo $row['fName']."&nbsp".$row['mName']."&nbsp".$row['lName'];
                       echo "</td>";
                       echo "<td>";
                       echo $row['roleName'];
                       echo "</td>";
                       echo "<td>";
                       echo "<button class='btn btn-secondary'>Edit</button>";
                       echo "&nbsp";
                       echo "<button class='btn btn-danger'>Delete</button>";
                       echo "</td>";
                       echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    </div>
    
    <!-- Add Employee Modal -->

    <div class="modal fade" id="AddEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="AddEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddEmployeeLabel">Add Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/staff-controller.php" method="POST" name="employeeSignupForm" onsubmit="return(staffValidator());">
                        <div class="form-group">
                            <label for="emp-name">Employee Name:</label>
                            <div class="input-group" id="emp-name">
                                <input type="text" class="form-control" placeholder="first name" required name="fname">
                                <input type="text" class="form-control" placeholder="middle name" required name="mname">
                                <input type="text" class="form-control" placeholder="last name" required name="lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emp-bday-selector" required>Employee's Birthday:</label>
                            <input type="date" class="form-control" id="emp-bday-selector" name="empbday">
                        </div>
                        <div class="form-group">
                            <label for="emp-address-input">Employee's Address</label>
                            <textarea class="form-control" id="emp-address-input" rows="2" id="emp-address-input" name ="empaddress"required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="emp-email-input">Employee's Email Address</label>
                            <input type="email" class="form-control" placeholder="example@email.com"id="emp-email-input" name="empemail" required>
                        </div>   
                        <div class="form-group">
                            <label for="emp-pass-input">Employee Password</label>
                            <input type="password" id="emp-pass-input" name="emppassword">
                        </div>
                        <div class="form-group">
                            <label for="service-selector">Staff Position: </label>
                            <select class="form-control" id="service-selector" name="rolekey">
                            <?php
                                $sql="SELECT * FROM roles";
                                $results=mysqli_query($connection,$sql); 
                                while($row = mysqli_fetch_assoc($results)) {
                                    echo "<option value='$row[roleID]'>".$row["roleName"]."</option>";
                                }
                            ?>
                            </select>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name="addEmployee">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- edit employees modal -->
    
<script src="../custom-js/staff-functions.js"></script>
<?php

?>
</body>
</html>