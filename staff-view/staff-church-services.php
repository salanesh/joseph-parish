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
	    
        <div class="container-fluid mx-auto" style="width: 70rem">
            <table class="table table-bordered table-hover">
                <thead class="bg-grey">
                    <tr>
                        <th scope="col">Service Name</th>
                        <th scope="col">Requirements</th>
                        <th scope="col">Downpayment Costs</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <!-- put back end shit here -->
                </tbody>
            </table>
        </div>


    </div>	
</body>
</html>