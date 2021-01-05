<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserve Church Services</title>
    <?php
    include("../shared-html/header-links-loggedin.html");
    ?>
</head>
<body>
    <?php
    require("../shared-html/parishionernav.html");
    ?>
    <div class="container-fluid staff-content">

        <div class="container-fluid mx-auto" style="width: 75rem">
            <table class="table table-bordered table-hover">
                <thead class="bg-grey">
                    <tr>
                        <th scope="col" class ="text-center">Service Name</th>
                        <th scope="col" class="text-center">Time Slot</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <th scope = "row">
                            Wedding
                        </th>
                        <td>
                            Mondays to Sundays 10:00 am, 1:30pm, 3:30pm
                        </td>
                    </tr>
                    <tr>
                        <th scope = "row">
                            Group Baptism
                        </th>
                        <td>
                            Every Sunday 11:30am
                        </td>
                    </tr>
                <!-- put back end shit here -->
                </tbody>
            </table>
        </div>
        
         <div class="card mx-auto my-5 special-card" style="width: 30rem">
            <div class="card-body">
                <h2 class="text-center">Reserve an Event Slot</h2>
                <form>
                    <div class="form-group">
                            <label for="login-email-input">Choose Desired Date:</label>
                            <input type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="desired-service-selector">Choose Desired Service:</label>
                         <select class="form-control" id="desired-service-selector">
                            <option selected>Choose...</option>
                            <option value="1">Wedding</option>
                            <option value="2">Group Baptism</option>
                         </select>
                    </div>
                    <h2>Requirements List: </h2>
                    <ul>
                        <li>New Baptismal Certificate</li>
                        <li>Marriage License</li>
                        <li>Canonical Interview</li>
                        <li>Marriage Seminar Certificate</li>
                        <li>Wedding Permit</li>
                        <li>Wedding Banns</li>
                        <li>New Birth Certificate and Cenomar</li>
                        <li>List of Names and principal sponsors</li>
                        <li>Confession</li>
                        <li>Downpayment of 250 pesos</li>
                    <ul>

                    <!-- Code for the paypal/paymaya/gcash button here -->
                    <div class="container text-center">
                    <button type="submit" class="btn btn-primary">Reserve</button>
                    </div>
                </form>
            </div>
        </div>
    	





    </div>
</body>
</html>