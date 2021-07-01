<?php
session_start();
?>
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
    if(!$_SESSION['userID']){
        header('Location: ../loginpage.php');
    }
    ?>
<script src="../custom-js/staff-functions.js"></script>
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
    <?php
        if (isset($_GET['success'])){
            $success = $_GET['success'];
            echo '<div class="alert alert-success text-center">';
            echo '<button class="close" data-dismiss="alert">X</button>';
            echo $success;
            echo '</div>';
        }
    ?>
    <div class="container-fluid mx-auto" style="width: 70rem">                     
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Staff ID</th>
                    <th scope="col">Staff Name</th>
                    <th scope="col">Job</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                  
                <?php
                    $sql="SELECT u.userID, u.fName, u.mName, u.lName, r.roleName from Users u,Roles r where u.roleID=r.roleID and u.roleID!=1 and u.userStatus = 1";
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
                       echo "<button class='btn btn-secondary open-editUser' data-toggle='modal' data-id=".$row['userID']." data-target='#editEmployeeModal'>Edit</button>";
                       echo "&nbsp";
                       echo "<a href='../controllers/staff-management-controller.php?deactID=".$row['userID']."'><button class='btn btn-danger' onclick = 'return confirm(Are you sure?)'>Deactivate</button></a>";
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
                    <form action="../controllers/staff-management-controller.php" method="POST" name="employeeSignupForm" onsubmit="return(staffValidator());">
                        <div class="form-group">
                            <label for="emp-name">Employee Name:</label>
                            <div class="input-group" id="emp-name">
                                <input type="text" class="form-control" placeholder="first name"  name="fname">
                                <input type="text" class="form-control" placeholder="middle name"  name="mname">
                                <input type="text" class="form-control" placeholder="last name"  name="lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emp-bday-selector" >Employee's Birthday:</label>
                            <input type="date" class="form-control" id="emp-bday-selector" name="empbday">
                        </div>
                        <div class="form-group">
                            <label for="emp-address-input">Employee's Address</label>
                            <textarea class="form-control" id="emp-address-input" rows="2" id="emp-address-input" name ="empaddress"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="emp-email-input">Employee's Email Address</label>
                            <input type="email" class="form-control" placeholder="example@email.com"id="emp-email-input" name="empemail" >
                        </div>   
                        <div class="form-group">
                            <label for="emp-pass-input">Employee Password</label>
                            <input type="password" id="emp-pass-input" name="emppassword">
                        </div>
                        <div class="form-group">
                            <label for="service-selector">Staff Position: </label>
                            <select class="form-control" id="service-selector" name="rolekey">
                            <?php
                                $sql="SELECT * FROM Roles";
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
    <div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="EditEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditEmployeeLabel">Edit Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/staff-management-controller.php" method="POST" name="employeeUpdateForm">
                        <div class="form-group">
                            <input type="hidden" name="passedID" id="passedID">
                        </div>
                        <div class="form-group">
                            <label for="emp-name">Employee Name:</label>
                            <div class="input-group" id="emp-name">
                                <input type="text" class="form-control" placeholder="first name"  name="fname">
                                <input type="text" class="form-control" placeholder="middle name"  name="mname">
                                <input type="text" class="form-control" placeholder="last name"  name="lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emp-bday-selector" >Employee's Birthday:</label>
                            <input type="date" class="form-control" id="emp-bday-selector" name="empbday">
                        </div>
                        <div class="form-group">
                            <label for="emp-address-input">Employee's Address</label>
                            <textarea class="form-control" id="emp-address-input" rows="2" id="emp-address-input" name ="empaddress"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="emp-email-input">Employee's Email Address</label>
                            <input type="email" class="form-control" placeholder="example@email.com"id="emp-email-input" name="empemail" >
                        </div>   
                        <div class="form-group">
                            <label for="emp-pass-input">Employee Password</label>
                            <input type="password" id="emp-pass-input" name="emppassword">
                        </div>
                        <div class="form-group">
                            <label for="service-selector">Staff Position: </label>
                            <select class="form-control" id="service-selector" name="rolekey">
                            <?php
                                $sql="SELECT * FROM Roles";
                                $results=mysqli_query($connection,$sql); 
                                while($row = mysqli_fetch_assoc($results)) {
                                    echo "<option value='$row[roleID]'>".$row["roleName"]."</option>";
                                }
                            ?>
                            </select>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name="editEmployee">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>