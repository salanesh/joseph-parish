<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing Modals and shit</title>
    <?php
    include("../shared-html/header-links-loggedin.html");
    require("../custom-php/connector.php");
    ?>
    <script src="../custom-js/staff-functions.js"></script>
</head>
<body>
    <div class="container-fluid staff-content">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#marriageReservationModal">Marriage</button>
    </div>
</body>
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
</html>