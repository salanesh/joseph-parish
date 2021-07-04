<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Reservations</title>
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
    <script src="../custom-js/staff-functions.js"></script>
    <?php
    require("../shared-html/staffnav.html");
    require("../custom-php/connector.php");
    ?>
    <div class="container-fluid staff-content">
        <div class="container-fluid">
            <form class="form-inline my-2 mx-2">
                <input class="form-control mr-sm-2" type="search" placeholder="Search Reservations" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>


        <div class="container-fluid my-3 mx-auto">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#massReservationModal">Reserve Mass</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#marriageReservationModal">Marriage</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#baptismReservationModal">Baptism</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmationReservationModal">Confirmation</button>
        </div>


        <div class="container-fluid mx-auto" style="width: 70rem">
            <table class="table table-bordered table-hover">
                <thead class="bg-grey">
                    <tr>
                        <th scope="col">Reservation ID</th>
                        <th scope="col">Requirement Details</th>
                        <th scope="col">Time Details</th>
                        <!-- <th scope="col">Reservation Type</th> -->
                        <th scope="col">Church Service</th>
                        <th scope="col">Reserved by</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT r.reservationID, r.serviceID, r.reserveStatus,r.reserveInDate,r.reserveOutDate, u.fName,u.mName,u.lName,s.serviceName FROM reservations r, users u, church_services s WHERE u.userID = r.userID AND r.serviceID = s.serviceID;";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo ("<tr>");
                        echo ("<th>");
                        echo $row['reservationID'];
                        echo ("</th>");
                        echo ("<td>");
                        echo ("<button class='btn btn-secondary open-editUser' data-toggle='modal' data-id=" . $row['serviceID'] . " data-target='#requirementsModal'>Requirements</button>");
                        echo ("</td>");
                        echo ("<td>");
                        echo ("<button class='btn btn-secondary open-editUser' data-toggle='modal' data-id=" . $row['reservationID'] . " data-target='#timeDetailModal'>Time</button>");
                        echo ("</td>");
                        echo ("<td>");
                        echo $row['serviceName'];
                        echo ("</td>");
                        echo ("<td>");
                        echo $row['fName'] . "&nbsp" . $row['mName'] . "&nbsp" . $row['lName'];
                        echo ("</td>");
                        echo ("</tr>");
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
    <!-- marriage modal -->
    <div class="modal fade" id="marriageReservationModal" tabindex="-1" role="dialog" aria-labelledby="addReservationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addReservationLabel">Reserve Marriage</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/staff-reservation-controller.php" method="POST">
                        <div class="form-group">
                            <!-- need to make user id value from static to dynamic -->
                            <input type="hidden" value="1" name="userID">
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="1" name="serviceID">
                        </div>
                        <div class="form-group">
                            <label for="groom-name">Groom Name:</label>
                            <div class="input-group" id="groom-name">
                                <input type="text" class="form-control" placeholder="first name" name="g-fname">
                                <input type="text" class="form-control" placeholder="middle name" name="g-mname">
                                <input type="text" class="form-control" placeholder="last name" name="g-lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="groom-bday-selector">Groom's Birthday:</label>
                            <input type="date" class="form-control" id="groom-bday-selector" name="gbday">
                        </div>
                        <div class="form-group">
                            <label for="groom-father-name">Groom's Father's Name:</label>
                            <div class="input-group" id="groom-father-name">
                                <input type="text" class="form-control" placeholder="first name" name="g-father-fname">
                                <input type="text" class="form-control" placeholder="middle name" name="g-father-mname">
                                <input type="text" class="form-control" placeholder="last name" name="g-father-lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="groom-mother-name">Groom's Mother's Name:</label>
                            <div class="input-group" id="groom-mother-name">
                                <input type="text" class="form-control" placeholder="first name" name="g-mother-fname">
                                <input type="text" class="form-control" placeholder="middle name" name="g-mother-mname">
                                <input type="text" class="form-control" placeholder="last name" name="g-mother-lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="groom-address-input">Groom's Address</label>
                            <textarea class="form-control" id="groom-address-input" rows="2" name="groomAddress"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="bride-name">Bride Name:</label>
                            <div class="input-group" id="bride-name">
                                <input type="text" class="form-control" placeholder="first name" name="b-fname">
                                <input type="text" class="form-control" placeholder="middle name" name="b-mname">
                                <input type="text" class="form-control" placeholder="last name" name="b-lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bride-bday-selector">Bride's Birthday:</label>
                            <input type="date" class="form-control" id="bride-bday-selector" name="bbday">
                        </div>
                        <div class="form-group">
                            <label for="bride-father-name">Bride's Father's Name:</label>
                            <div class="input-group" id="bride-father-name">
                                <input type="text" class="form-control" placeholder="first name" name="b-father-fname">
                                <input type="text" class="form-control" placeholder="middle name" name="b-father-mname">
                                <input type="text" class="form-control" placeholder="last name" name="b-father-lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bride-mother-name">Bride's Mother's Name:</label>
                            <div class="input-group" id="bride-mother-name">
                                <input type="text" class="form-control" placeholder="first name" name="b-mother-fname">
                                <input type="text" class="form-control" placeholder="middle name" name="b-mother-mname">
                                <input type="text" class="form-control" placeholder="last name" name="b-mother-lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bride-address-input">Bride's Address</label>
                            <textarea class="form-control" id="bride-address-input" rows="2" name="brideAddress"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="in-date-selector">Reservation Start Date:</label>
                            <input type="datetime-local" class="form-control" id="in-date-selector" name="inDate">
                        </div>
                        <div class="form-group">
                            <label for="out-date-selector">Reservation End Date:</label>
                            <input type="datetime-local" class="form-control" id="out-date-selector" name="outDate">
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1" value=1 name="cenomar">
                            <label class="custom-control-label" for="customSwitch1">Cenomar</label>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch2" value=1 name="seminarCert">
                            <label class="custom-control-label" for="customSwitch2">Seminar Certificate</label>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch3" value=1 name="confession">
                            <label class="custom-control-label" for="customSwitch3">Confession</label>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch4" value=1 name="civilRegistration">
                            <label class="custom-control-label" for="customSwitch4">Civil Registration</label>
                        </div>

                        <div class="form-group">
                            <h2>Downpayment: 250000<h2>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name="addMarriage">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- baptism modal -->
    <div class="modal fade" id="baptismReservationModal" tabindex="-1" role="dialog" aria-labelledby="addBaptismLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBaptismLabel">Reserve Baptism</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/staff-reservation-controller.php" method="POST">
                        <div class="form-group">
                            <!-- need to make user id value from static to dynamic -->
                            <input type="hidden" value="1" name="userID">
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="3" name="serviceID">
                        </div>
                        <div class="form-group">
                            <label for="child-name">Child Name:</label>
                            <div class="input-group" id="child-name">
                                <input type="text" class="form-control" placeholder="first name" name="child-fname">
                                <input type="text" class="form-control" placeholder="middle name" name="child-mname">
                                <input type="text" class="form-control" placeholder="last name" name="child-lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="father-name">Father Name:</label>
                            <input type="text" id="father-name" name="father-name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="mother-name">Mother Name:</label>
                            <input type="text" id="mother-name" name="mother-name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="birthplace">Child birthplace</label>
                            <input type="text" id="birthplace" class="form-control" name="child-birthplace">
                        </div>
                        <div class="form-group">
                            <label for="child-bday">Child Birthdate:</label>
                            <input type="date" class="form-control" id="child-bday" name="child-bday">
                        </div>
                        <div class="form-group">
                            <label for="bapstism-in-date">Reservation Start:</label>
                            <input type="datetime-local" class="form-control" id="baptism-in-date" name="inDate">
                        </div>
                        <div class="form-group">
                            <label for="bapstism-end-date">Reservation End:</label>
                            <input type="datetime-local" class="form-control" id="baptism-end-date" name="outDate">
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch5" value=1 name="sponsorList">
                            <label class="custom-control-label" for="customSwitch5">Sponsor List</label>
                        </div>

                        <div class="form-group">
                            <h2>Downpayment: 250<h2>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name="addBaptism">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- confirmation modal -->
    <div class="modal fade" id="confirmationReservationModal" tabindex="-1" role="dialog" aria-labelledby="addConfirmationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addConfirmationLabel">Reserve Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/staff-reservation-controller.php" method="POST">
                        <div class="form-group">
                            <!-- need to make user id value from static to dynamic -->
                            <input type="hidden" value="1" name="userID">
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="2" name="serviceID">
                        </div>
                        <div class="form-group">
                            <label for="child-name">Child Name:</label>
                            <div class="input-group" id="child-name">
                                <input type="text" class="form-control" placeholder="first name" name="child-fname">
                                <input type="text" class="form-control" placeholder="middle name" name="child-mname">
                                <input type="text" class="form-control" placeholder="last name" name="child-lname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="father-name">Father Name:</label>
                            <input type="text" class="form-control" placeholder="Father Name" id="father-name" name="father-name">
                        </div>
                        <div class="form-group">
                            <label for="mother-name">Mother Name:</label>
                            <input type="text" class="form-control" placeholder="Mother Name" id="mother-name" name="mother-name">
                        </div>
                        <div class="form-group">
                            <label for="birthplace">Child birthplace</label>
                            <input type="text" id="birthplace" class="form-control" name="child-birthplace">
                        </div>
                        <div class="form-group">
                            <label for="child-bday">Child Birthdate:</label>
                            <input type="date" class="form-control" id="child-bday" name="child-bday">
                        </div>
                        <div class="form-group">
                            <label for="baptism-date">Baptism Date:</label>
                            <input type="date" class="form-control" id="baptism-date" name="baptism-date">
                        </div>
                        <div class="form-group">
                            <label for="confirmation-in-date">Reservation Start:</label>
                            <input type="datetime-local" class="form-control" id="confirmation-in-date" name="inDate">
                        </div>
                        <div class="form-group">
                            <label for="confirmation-end-date">Reservation End:</label>
                            <input type="datetime-local" class="form-control" id="confirmation-end-date" name="outDate">
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch6" value=1 name="baptismCert">
                            <label class="custom-control-label" for="customSwitch6">Baptism Certificate</label>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch7" value=1 name="sponsorOne">
                            <label class="custom-control-label" for="customSwitch7">Sponsor One</label>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch8" value=1 name="sponsorTwo">
                            <label class="custom-control-label" for="customSwitch8">Sponsor Two</label>
                        </div>
                        <div class="form-group">
                            <h2>Downpayment: 250<h2>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name="addConfirm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- reservation requirements modal -->
<div class="modal fade" id="requirementsModal" tabindex="-1" aria-labelledby="requirementsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="requirementsModalLabel">Requirements For Reservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                    <!-- put the shit in here -->
                </div>
                <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
            </div>
        </div>
    </div>
    <!-- time details modal -->
    <div class="modal fade" id="timeDetailModal" tabindex="-1" aria-labelledby="timeDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="timeDetailModalLabel">Time Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/staff-reservation-controller.php">
                        <div class="form-group">
                            <input type="hidden" name="passedID" id="passedID">
                        </div>
                        <?php
                            $sql = "SELECT reserveInDate,reserveOutDate from Reservations where reservationID = 22";
                            $result = mysqli_query($connection,$sql);
                            $row = mysqli_fetch_assoc($result);
                            echo "<div class='form-group'>";
                            echo "<label for='inDate'>Reservation In Date</label>";
                            echo "<input type='date' class='form-control' id='inDate' name='inDate' value=$row[reserveInDate]>";
                            echo "</div>";
                            echo "<div class='form-group'>"; 
                            echo "<label for='outDate'>Reservation Out Date</label>";
                            echo "<input type='date' class='form-control' id='outDate' name='outDate' value=$row[reserveOutDate]>";
                            echo "</div>";
                        ?>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name="editTime">Submit</button>
                        </div>
                    </form>
                    <!-- put more shit in here -->
                </div>
                <!-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
            </div>
        </div>
    </div>


</body>

</html>