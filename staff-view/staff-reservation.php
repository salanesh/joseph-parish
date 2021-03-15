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
    require("../custom-php/connector.php");
    ?>
    <div class="container-fluid staff-content">
    <div class="container-fluid">
        <form class="form-inline my-2 mx-2">
        <input class="form-control mr-sm-2" type="search" placeholder="Search Reservations" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    
    
    <div class="container-fluid my-3 mx-auto" style="width: 20rem">
        <button type = "button" class="btn btn-primary" data-toggle="modal" data-target="#addStaffReservationModal">Add Walk-In Reservation</button>
    </div>
    <div class="container-fluid my-3 mx-auto" style="width: 20rem">
        <button type = "button" class="btn btn-primary" data-toggle="modal" data-target="#viewRequirementsModal">View Requirements</button>
    </div>
    
    <div class="container-fluid mx-auto" style="width: 70rem">
        <table class="table table-bordered table-hover">
            <thead class="bg-grey">
                <tr>
                    <th scope="col">Reservation ID</th>
                    <th scope="col">Requirement Details</th>
                    <th scope="col">Time Details</th>
                    <th scope="col">Reservation Type</th>
                    <th scope="col">Church Service</th>
                    <th scope="col">Reserved by</th>
                </tr>
            </thead>
            <tbody>
                    
            </tbody>
        </table>
    </div>

    </div>
    
    <!-- Staff Adding Reservations for walk-in Modal -->
    <div class="modal fade" id="addStaffReservationModal" tabindex="-1" role="dialog" aria-labelledby="addReservationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addReservationLabel">Add Reservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="service-selector">Select Service: </label>
                            <?php
    
                            $sql = "SELECT * FROM "
                            ?>
                            <select class="form-control" id="service-selector">
                                <option>Marriage</option>
                                <option>Baptism</option>
                                <option>Confirmation</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="groom-name">Groom Name:</label>
                            <div class="input-group" id="groom-name">
                                <input type="text" class="form-control" placeholder="first name">
                                <input type="text" class="form-control" placeholder="middle name">
                                <input type="text" class="form-control" placeholder="last name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="groom-bday-selector">Groom's Birthday:</label>
                            <input type="date" class="form-control" id="groom-bday-selector">
                        </div>
                        <div class="form-group">
                            <label for="groom-father-name">Groom's Father's Name:</label>
                            <div class="input-group" id="groom-father-name">
                                <input type="text" class="form-control" placeholder="first name">
                                <input type="text" class="form-control" placeholder="middle name">
                                <input type="text" class="form-control" placeholder="last name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="groom-mother-name">Groom's Mother's Name:</label>
                            <div class="input-group" id="groom-mother-name">
                                <input type="text" class="form-control" placeholder="first name">
                                <input type="text" class="form-control" placeholder="middle name">
                                <input type="text" class="form-control" placeholder="last name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="groom-address-input">Groom's Address</label>
                            <textarea class="form-control" id="groom-address-input" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="bride-name">Bride Name:</label>
                            <div class="input-group" id="bride-name">
                                <input type="text" class="form-control" placeholder="first name">
                                <input type="text" class="form-control" placeholder="middle name">
                                <input type="text" class="form-control" placeholder="last name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bride-bday-selector">Bride's Birthday:</label>
                            <input type="date" class="form-control" id="bride-bday-selector">
                        </div>
                        <div class="form-group">
                            <label for="bride-father-name">Bride's Father's Name:</label>
                            <div class="input-group" id="bride-father-name">
                                <input type="text" class="form-control" placeholder="first name">
                                <input type="text" class="form-control" placeholder="middle name">
                                <input type="text" class="form-control" placeholder="last name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bride-mother-name">Bride's Mother's Name:</label>
                            <div class="input-group" id="bride-mother-name">
                                <input type="text" class="form-control" placeholder="first name">
                                <input type="text" class="form-control" placeholder="middle name">
                                <input type="text" class="form-control" placeholder="last name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bride-address-input">Bride's Address</label>
                            <textarea class="form-control" id="bride-address-input" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="reservation-date-selector">Reservation Date:</label>
                            <input type="date" class="form-control" id="reservation-date-selector">
                        </div>
                        <div class="form-group">
                            <h2>Downpayment: 250<h2>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- View Reservation Requirements List Modal -->
    <div class="modal fade" id="viewRequirementsModal"tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reservation Requirements: Marriage</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <div class="modal-body">
        <table class="table table-bordered table-hover">
            <thead class="bg-grey">
                <tr>
                    <th scope="col">Requirement Name</th>
                    <th scope="col">Submited On</th>
                    <th scope="col">Actions/Status</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                    <th scope="col">Cenomar</th>
                    <th scope="col">10/10/20</th>
                    <th scope="col">OK</th>
                </tr>
            </tbody>
        </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
    </div>


</body>
</html>