<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employees</title>
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
        <input class="form-control mr-sm-2" type="search" placeholder="Search Employees" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    
    
    <!-- <div class="container-fluid my-3 mx-auto" style="width: 20rem">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addEmployeeModal">Add Employee</button>
    </div> -->
    
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
                <!-- put back end shit here -->
            </tbody>
        </table>
    </div>
    </div>
    
    <!-- Edit Employee Modal -->

    <div class="modal fade" id="EditEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="EditEmployeeLabel" aria-hidden="true">
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
                            <label for="emp-name">Employee Name:</label>
                            <div class="input-group" id="emp-name">
                                <input type="text" class="form-control" placeholder="first name">
                                <input type="text" class="form-control" placeholder="middle name">
                                <input type="text" class="form-control" placeholder="last name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emp-bday-selector">Employee's Birthday:</label>
                            <input type="date" class="form-control" id="emp-bday-selector">
                        </div>
                        <div class="form-group">
                            <label for="emp-address-input">Employee's Address</label>
                            <textarea class="form-control" id="emp-address-input" rows="2" id="emp-address-input"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="emp-email-input">Employee's Email Address</label>
                            <input type="email" class="form-control" placeholder="example@email.com"id="emp-email-input">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" placeholder="" id="emp-password-reset">
                             <label for="emp-password-reset">Reset Password?</label>
                        </div>
                        <div class="form-group">
                            <label for="service-selector">Staff Position: </label>
                            <select class="form-control" id="service-selector">
                                <option>Position 1</option>
                                <option>Position 2</option>
                                <option>Position 3</option>
                            </select>
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