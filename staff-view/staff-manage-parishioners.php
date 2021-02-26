<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Announcements</title>
    <?php
    include("../shared-html/header-links-loggedin.html");
    ?>
</head>
<body>
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
    	
        <div class="container-fluid my-3 mx-auto" style="width:20rem">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addParishionerModal">Add Parishioner</button>
    	</div>

    	<div class="container-fluid mx-auto" style="width: 70rem">
            <table class="table table-bordered table-hover">
                <thead class="bg-grey">
                    <tr>
                        <th scope="col">Parishioner Name</th>
                        <th scope="col">Parishioner ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <!-- put back end shit here -->
                </tbody>
            </table>
        </div>
 </div>
 <!-- Add Parishioner Modal -->
 <div class="modal fade" id="addParishionerModal" tabindex="-1" role="dialog" aria-labelledby="EditEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditEmployeeLabel">Edit Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/parishioners-controller.php" method="POST" name="parishionersSignupForm">
        
                        <div class="form-group">
                            <label for="parishioner-name">Parishioner Name:</label>
                            <div class="input-group" id="parishioner-name">
                                <input type="text" class="form-control" placeholder="first name" name="parishionersfname">
                                <input type="text" class="form-control" placeholder="middle name" name="parishionersmname">
                                <input type="text" class="form-control" placeholder="last name" name ="parishionerslname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="parishioner-bday-selector">Parishioner's Birthday:</label>
                            <input type="date" class="form-control" id="parishioner-bday-selector" name="parishionersbday">
                        </div>
                        <div class="form-group">
                            <label for="parishioner-address-input">Parishioner's Address</label>
                            <textarea class="form-control" id="parishioner-address-input" rows="2" id="parishioner-address-input" name ="parishionersaddress"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="parishioner-contact-input">Parishioner's Contact Number</label>
                            <input type="number" class="form-control" placeholder="00000000000"id="parishioner-contact-input" name="parishionerscontact">
                        </div>
                        <div class="form-group">
                            <label for="parishioner-email-input">Parishioner's Email Address</label>
                            <input type="email" class="form-control" placeholder="example@email.com"id="parishioner-email-input" name ="parishionersemail">
                        </div>
                        <div class="form-group">
                        	<label for="parishioner-password-reset">Password</label>
                            <input type="password" class="form-ccontrol" placeholder="" id="parishioner-password-reset" name="parishionerspasswordgi">
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Parishioner Modal -->
    <div class="modal fade" id="editParishionerModal" tabindex="-1" role="dialog" aria-labelledby="EditEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditEmployeeLabel">Edit Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form> 
        
                        <div class="form-group">
                            <label for="parishioner-name">Parishioner Name:</label>
                            <div class="input-group" id="parishioner-name">
                                <input type="text" class="form-control" placeholder="first name">
                                <input type="text" class="form-control" placeholder="middle name">
                                <input type="text" class="form-control" placeholder="last name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="parishioner-bday-selector">Parishioner's Birthday:</label>
                            <input type="date" class="form-control" id="parishioner-bday-selector">
                        </div>
                        <div class="form-group">
                            <label for="parishioner-address-input">Parishioner's Address</label>
                            <textarea class="form-control" id="parishioner-address-input" rows="2" id="parishioner-address-input"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="parishioner-contact-input">Parishioner's Contact Number</label>
                            <input type="number" class="form-control" placeholder="00000000000"id="parishioner-contact-input">
                        </div>
                        <div class="form-group">
                            <label for="parishioner-email-input">Parishioner's Email Address</label>
                            <input type="email" class="form-control" placeholder="example@email.com"id="parishioner-email-input">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" placeholder="" id="parishioner-password-reset">
                             <label for="parishioner-password-reset">Reset Password?</label>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>