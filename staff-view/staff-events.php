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
    <script src="../custom-js/staff-functions.js"></script>
    <div class="container-fluid staff-content">
    	<div class="container-fluid">
	        <form class="form-inline my-2 mx-2">
	        <input class="form-control mr-sm-2" type="search" placeholder="Search Employees" aria-label="Search">
	        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	        </form>
    	</div>

    	<div class="container-fluid my-3 mx-auto" style="width: 20rem">
        	<button class="btn btn-primary" data-toggle="modal" data-target="#addEventModal">Add Event</button>
    	</div>
    
	    <div class="container-fluid mx-auto" style="width: 70rem">
	        <table class="table table-bordered table-hover">
	            <thead class="bg-grey">
	                <tr>
                        <th scope="col">Event ID</th>
	                    <th scope="col">Event Name</th>
	                    <th scope="col">Date Start</th>
	                    <th scope="col">Date End</th>
	                    <th scope="col">Description</th>
	                    <th scope="col">Actions</th>
	                </tr>
	            </thead>
	            <tbody>
	                <!-- put back end shit here -->
                    <?php
                    require ("../custom-php/connector.php");
                    $sql="SELECT * from events" ;
                    $shit=mysqli_query($connection,$sql); 
                    while($row = mysqli_fetch_assoc($shit)) {
                       echo "<tr>";
                       echo "<th>";
                       echo $row['eventID'];
                       echo "</th>";
                       echo "<td>";                       
                       echo $row['eventName'];
                       echo "<td>";
                       echo $row['eventStartDate'];
                       echo "</td>";
                       echo "<td>";
                       echo $row['eventEndDate'];
                       echo "</td>";
                       echo "<td>";
                       echo $row['eventDesc'];
                       echo "</td>";
                       echo "<td>";
                       echo "<button class='btn btn-secondary open-editUser' data-toggle='modal' data-id=".$row['eventID']." data-target='#editEventModal'>Edit</button>";
                       echo "&nbsp";
                       echo "<a href='../controllers/staff-events-controller.php?deactID=".$row['eventID']."'><button class='btn btn-danger' onclick = 'return confirm(Are you sure?)'>Deactivate</button></a>";
                       echo "</td>";
                       echo "</tr>";
                    }
                ?>
	            </tbody>
	        </table>
	    </div>

    </div>

    <!-- Add Event Modal -->
    <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEventLabel">Add Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/staff-events-controller.php" method="POST">
                    
                        <div class="form-group">
                            <label for="event-name">Event Name:</label>
                            <input type="text" class="form-control" placeholder="event name" id="event-name" name="eventname">    
                        </div>
                        <div class="form-group">
                            <label for="event-start-selector">Event Start:</label>
                            <div class ="input-group"id="event-start-selector">
                            	 <input type="date" class="form-control" name="eventStartDate">
                            	 <input type="time" class="form-control" name="eventStartTime">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="event-end-selector">Event End:</label>
                            <div class ="input-group"id="event-end-selector">
                            	 <input type="date" class="form-control" name="eventEndDate">
                            	 <input type="time" class="form-control" name="eventEndTime">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="event-desc-input">Event Description</label>
                            <textarea class="form-control" id="event-desc-input" rows="2" name="eventDesc"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="event-pic-input">Event Picture</label>
                            <input type="file" class="form-control" placeholder="picture"id="event-pic-input" name="eventImage">
                        </div>
                       <div class="form-group">
                            <label for="event-donation-goal">Donation Goal</label>
                            <input type="number" class="form-control" placeholder="0"id="event-donation-goal" name="donationGoal">
                        </div>
                        <div class="form-group">
                            <label for="event-status">Event Status</label>
                            <input type="checkbox" name="eventStatus" id="event-status" value="1">
                        </div>
                    
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name="addEvent">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Event Modal -->
    <div class="modal fade" id="editEventModal" tabindex="-1" role="dialog" aria-labelledby="editEventLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEventLabel">Edit Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/staff-events-controller.php" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="passedID" id="passedID">
                    </div>
        
                        <div class="form-group">
                            <label for="event-name">Event Name:</label>
                            <input type="text" class="form-control" placeholder="event name" id="event-name" name="eventname">    
                        </div>
                        <div class="form-group">
                            <label for="event-start-selector">Event Start:</label>
                            <div class ="input-group"id="event-start-selector">
                            	 <input type="date" class="form-control" name="eventStartDate">
                            	 <input type="time" class="form-control" name="eventStartTime">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="event-end-selector">Event End:</label>
                            <div class ="input-group"id="event-end-selector">
                            	 <input type="date" class="form-control" name="eventEndDate">
                            	 <input type="time" class="form-control" name="eventEndTime">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="event-desc-input">Event Description</label>
                            <textarea class="form-control" id="event-desc-input" rows="2" name="eventDesc"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="event-pic-input">Event Picture</label>
                            <input type="file" class="form-control" placeholder="picture"id="event-pic-input" name="eventImage">
                        </div>
                       <div class="form-group">
                            <label for="event-donation-goal">Donation Goal</label>
                            <input type="number" class="form-control" placeholder="0"id="event-donation-goal" name="donationGoal">
                        </div>
                        <div class="form-group">
                            <label for="event-status">Event Status</label>
                            <input type="checkbox" name="eventStatus" id="event-status" value="1">
                        </div>
                    
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name="editEvent">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>