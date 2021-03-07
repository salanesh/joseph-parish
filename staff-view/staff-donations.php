<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Donations</title>
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
        <input class="form-control mr-sm-2" type="search" placeholder="Search Donations" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    
    
    <div class="container-fluid my-3 mx-auto" style="width: 20rem">
        <button class="btn btn-primary" data-toggle="modal" data-target="#AddDonationModal">Add Donation</button>
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
                    <th scope="col">Donated by</th>
                    <th scope="col">Donation Category</th>
                    <th scope="col">Event Donation</th>
                    <th scope="col">Donation Amount</th>
                    <th scope="col">Donation Date</th>
                    <th scope="col">Donation Type</th>
                </tr>
            </thead>
            <tbody>
                  
                <?php
                    $sql="SELECT * from donations";
                    $shit=mysqli_query($connection,$sql); 
                    while($row = mysqli_fetch_assoc($shit)) {
                       echo "<tr>";
                       echo "<th>";
                       echo $row['donationID'];
                       echo "</th>";
                       echo "<td>";
                       echo $row['userID'];
                       echo "</td>";
                       echo "<td>";
                       echo $row['catID'];
                       echo "</td>";
                       echo "<td>";
                       echo $row['eventID'];
                       echo "</td>";
                       echo "<td>";
                       echo $row['donationamount'];
                       echo "</td>";
                       echo "<td>";
                       echo $row['donationdate'];
                       echo "</td>";
                       echo "<td>";
                       echo $row['donationtype'];
                       echo "</td>";
                       echo "<td>";
                       echo "<button class='btn btn-secondary open-editUser' data-toggle='modal' data-id=".$row['userID']." data-target='#editParishionerModal'>Edit</button>";
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

    <div class="modal fade" id="AddDonationModal" tabindex="-1" role="dialog" aria-labelledby="AddDonationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddDonationLabel">Add Donation</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/donation-controller.php" method="POST" name="DonationForm" onsubmit="return(staffValidator());">
                        <div class="form-group">
                            <label for="donators-name">Donated By:</label>
                            <input type="name" class="form-control" id="donation-by-input" name="donatedby" >
                            <div class="input-group" id="userID">
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="service-selector">Donation Category: </label>
                            <select class="form-control" id="service-selector" name="rolekey">
                            <?php
                                $sql="SELECT * FROM categories";
                                $results=mysqli_query($connection,$sql); 
                                while($row = mysqli_fetch_assoc($results)) {
                                    echo "<option value='$row[catID]'>".$row["catName"]."</option>";
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="service-selector">Event Donation: </label>
                            <select class="form-control" id="service-selector" name="rolekey">
                            <?php
                                $sql="SELECT * FROM  events";
                                $results=mysqli_query($connection,$sql); 
                                while($row = mysqli_fetch_assoc($results)) {
                                    echo "<option value='$row[eventID]'>".$row["eventName"]."</option>";
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="donation-amount-input">Donation Amount</label>
                            <input type="number" class="form-control" id="donation-amount-input" name="donationamount" >
                        </div>   
                        <div class="form-group">
                            <label for="donation-date-input">Donation Date</label>
                            <input type="date" id="donation-date-input" name="donationdate">
                            <div class="form-group">
                            <label for="service-selector">Donation Type: </label>
                            <select class="form-control" id="service-selector" name="rolekey">
                            <?php
                                $sql="SELECT * FROM  donations";
                                $results=mysqli_query($connection,$sql); 
                                while($row = mysqli_fetch_assoc($results)) {
                                    echo "<option value='$row[donationID]'>".$row["donationType"]."</option>";
                                }
                            ?>
                            </select>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name="adddonation">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- edit employees modal -->
    <div class="modal fade" id="EditDonationModal" tabindex="-1" role="dialog" aria-labelledby="EditDonationsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditDonationLabel">Edit Donation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/donation-controller.php" method="POST" name="DonationUpdateForm">
                        <div class="form-group">
                            <input type="hidden" name="passedID" id="passedID">
                        </div>
                        <div class="form-group">
                            <label for="donators-name">Donated By:</label>
                            <div class="input-group" id="userID">
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="service-selector">Donation Category: </label>
                            <select class="form-control" id="service-selector" name="rolekey">
                            <?php
                                $sql="SELECT * FROM categories";
                                $results=mysqli_query($connection,$sql); 
                                while($row = mysqli_fetch_assoc($results)) {
                                    echo "<option value='$row[catID]'>".$row["catName"]."</option>";
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="service-selector">Event Donation: </label>
                            <select class="form-control" id="service-selector" name="rolekey">
                            <?php
                                $sql="SELECT * FROM  events";
                                $results=mysqli_query($connection,$sql); 
                                while($row = mysqli_fetch_assoc($results)) {
                                    echo "<option value='$row[eventID]'>".$row["eventName"]."</option>";
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="donation-amount-input">Donation Amount</label>
                            <input type="number" class="form-control" id="donation-email-amount-input" name="donationamount" >
                        </div>   
                        <div class="form-group">
                            <label for="donation-date-input">Donation Date</label>
                            <input type="date" id="donation-date-input" name="donationdate">
                            <div class="form-group">
                            <label for="service-selector">Donation Type: </label>
                            <select class="form-control" id="service-selector" name="rolekey">
                            <?php
                                $sql="SELECT * FROM  donations";
                                $results=mysqli_query($connection,$sql); 
                                while($row = mysqli_fetch_assoc($results)) {
                                    echo "<option value='$row[donationID]'>".$row["donationType"]."</option>";
                                }
                            ?>
                            </select>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name="editDonation">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
        



    
    </div>
</body>
</html>