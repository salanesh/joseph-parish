<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Register</title>
    <?php
    include('shared-html/header-links.html');
    ?>
</head>
<body>
<script type="text/javascript" src="custom-js/validation-functions.js"></script>
    <?php
   require('shared-html/navbar.html');
   ?>
    <div class="general-content">
        <div class="card mx-auto my-5 special-card" style="width: 30rem">
            <div class="card-body">
                <h2 class="text-center">Login</h2>
                <form action="controllers/login-controller.php"  method="POST" name="login-form">
                    <div class="form-group">
                        <label for="login-email-input">Email address</label>
                        <div class="input-group" id="login-email-input">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <img src="bootstrap-icons-1.0.0-alpha5/person.svg">
                                </span>
                            </div>
                            <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                        </div>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div> 
                    <div class="form-group">
                        <label for="login-password-input">Password</label>
                        <div class="input-group" id="login-password-input">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <img src="bootstrap-icons-1.0.0-alpha5/lock-fill.svg">
                                </span>
                            </div>
                        <input type="password" class="form-control" placeholder="Password" name="userPass">
        
                    </div>
                        
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Keep me logged in</label>
                    </div>
                    <div class="container text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".register-modal">Register Here</button>
            </div>
        </div>
    </div>


    <!-- modal content -->
    <div class="modal fade register-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registration Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
    
        <div class="modal-body">
            <form action="controllers/login-registration-controller.php" method="POST" name="parish-registration-form" onsubmit="return validateRegistration()">
                    <div class="form-group">
                        <label for="firstNameInput">First Name</label>
                        <input type="text" class="form-control" id="firstNameInput" placeholder="Enter first name" name="parishionersfname" required>
    
                    </div>
                    <div class="form-group">
                        <label for="middleNameInput">Middle Name</label>
                        <input type="text" class="form-control" id="middleNameInput" placeholder="Enter middle name" name="parishionersmname" required>
                    </div>
                    <div class="form-group">
                        <label for="lastNameInput">Last Name</label>
                        <input type="text" class="form-control" id="lastNameInput" placeholder="Enter last name" name="parishionerslname" required>
                    </div>
                    <div class="form-group">
                        <label for="bday-selector">Birthday</label>
                        <input type="date" class="form-control" id="bday-selector" name="parishionersbday">
                    </div>
                    <div class="form-group">
                        <label for="homeAddressInput">Home Address</label>
                        <input type="text" class="form-control" id="homeAddressInput" aria-describedby="emailHelp" placeholder="Home Address" name="parishionersaddress">
                    </div>
                    <div class="form-group">
                            <label for="parishioner-contact-input">Contact Number</label>
                            <input type="number" class="form-control" placeholder="+63"id="parishioner-contact-input" name="parishionerscontact">
                        </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="parishionersemail">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>

                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="parishionerspassword">
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