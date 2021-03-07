<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Parishioners</title>
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
    <div class="container-fluid">
        <form class="form-inline my-2 mx-2">
        <input class="form-control mr-sm-2" type="search" placeholder="Search Parishioners" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    
    
    <div class="container-fluid my-3 mx-auto" style="width: 20rem">
        <button class="btn btn-primary" data-toggle="modal" data-target="#AddParishionersModal">Add Parishioner</button>
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
                    <th scope="col">Parishioner ID</th>
                    <th scope="col">Parishioner Name</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    require("../custom-php/connector.php");
                    $sql="SELECT * from users where userStatus !=0";
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
                       echo $row['userBday'];
                       echo "</td>";
                       echo "<td>";
                       echo $row['userAddress'];
                       echo "</td>";
                       echo "<td>";
                       echo $row['email'];
                       echo "</td>";
                       echo "<td>";
                       echo $row['userPass'];
                       echo "</td>";
                       echo "<td>";
                       echo $row['userStatus'];
                       echo "</td>";
                       echo "<td>";
                       echo "<button class='btn btn-secondary open-editUser' data-toggle='modal' data-id=".$row['userID']." data-target='#editParishionersModal'>Edit</button>";
                       echo "&nbsp";
                       echo "<a href='../controllers/parishioners-controller.php?deactID=".$row['userID']."'><button class='btn btn-danger' onclick = 'return confirm(Are you sure?)'>Deactivate</button></a>";
                       echo "</td>";
                       echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    </div>
    

    <!-- Add Employee Modal -->

    <div class="modal fade" id="AddParishionersModal" tabindex="-1" role="dialog" aria-labelledby="AddParishionersLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddParishionersLabel">Add Parishioner</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/parishioners-controller.php" method="POST" name="parishionersSignupForm" onsubmit="return(staffValidator());">
                        <div class="form-group">
                            <label for="parishioners-name">Parishioner Name:</label>
                            <div class="input-group" id="parishioners-name">
                                <input type="text" class="form-control" placeholder="first name"  name="fname">
                                <input type="text" class="form-control" placeholder="middle name"  name="mname">
                                <input type="text" class="form-control" placeholder="last name"  name="lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="parishioners-bday-selector" >Parishioner's Birthday:</label>
                            <input type="date" class="form-control" id="parishioners-bday-selector" name="parishionersBday">
                        </div>
                        <div class="form-group">
                            <label for="parishioners-address-input">Parishioners's Address</label>
                            <textarea class="form-control" id="parishioners-address-input" rows="2" id="parishioners-address-input" name ="parishionersAddress"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="parishioners-email-input">Parishioner's Email Address</label>
                            <input type="email" class="form-control" placeholder="example@email.com"id="parishioners-email-input" name="parishionersEmail" >
                        </div>   
                        <div class="form-group">
                            <label for="parishioners-pass-input">Parishioner Password</label>
                            <input type="password" id="parishioners-pass-input" name="parishionersPassword">

                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name="addparishioners">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- edit employees modal -->
    <div class="modal fade" id="editParishionersModal" tabindex="-1" role="dialog" aria-labelledby="editParishionersLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editParishionersLabel">Edit Parishioner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/parishioners-controller.php" method="POST" name="parishionersUpdateForm">
                        <div class="form-group">
                            <input type="hidden" name="passedID" id="passedID">
                        </div>
                        <div class="form-group">
                            <label for="parishioners-name">Parishioner Name:</label>
                            <div class="input-group" id="parishioners-name">
                                <input type="text" class="form-control" placeholder="first name"  name="fname">
                                <input type="text" class="form-control" placeholder="middle name"  name="mname">
                                <input type="text" class="form-control" placeholder="last name"  name="lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="parishioners-bday-selector" >Parishioner's Birthday:</label>
                            <input type="date" class="form-control" id="parishioners-bday-selector" name="parishionersBday">
                        </div>
                        <div class="form-group">
                            <label for="parishioners-address-input">Parishioners's Address</label>
                            <textarea class="form-control" id="parishioners-address-input" rows="2" id="parishioners-address-input" name ="parishionersAddress"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="parishioners-email-input">Parishioner's Email Address</label>
                            <input type="email" class="form-control" placeholder="example@email.com"id="parishioners-email-input" name="parishionersEmail" >
                        </div>   
                        <div class="form-group">
                            <label for="parishioners-pass-input">Parishioner Password</label>
                            <input type="password" id="parishioners-pass-input" name="parishionersPassword">
                        </div>
                        
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
                            <button type="submit" class="btn btn-primary" name="editParishioners">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>