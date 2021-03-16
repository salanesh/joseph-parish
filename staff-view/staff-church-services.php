<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Announcements</title>
    <?php
    include("../shared-html/header-links-loggedin.html");
    ?>
    <script src="../custom-js/staff-functions.js"></script>
    <script>
    <!-- validation modal -->
    function validate(evt){
            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode( key );
            var regex = /[0-9]|\./;
            if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
            }
        }
        function validateForm(){
            var servicenames = document.getElementById("servicenames").value;
            if(servicenames == ""){
                alert("Please Enter Service Name");
                return false;
            }
            var servicedescs = document.getElementById("servicedescs").value;
            if(servicedescs == ""){
                alert("Please Enter Service Description");
                return false;
            }
            var serviceprices = document.getElementById("serviceprices").value;
            if(serviceprices == ""){
                alert("Please Enter Downpayment Cost");
                return false;
            }
            var servicepics = document.getElementById("servicepics").value;
            if(servicepics == ""){
                alert("Please Enter Service Picture");
                return false;
            }
            var servicereqss = document.getElementById("servicereqss").value;
            if(servicereqss == ""){
                alert("Please Enter Service Requirements");
                return false;
            }
            var message = document.getElementById("message").value;
            if(message == ""){
                alert("Please Enter Message");
                return false;
            }

        }
    </script>
</head>
<body>
    <?php
    require("../shared-html/staffnav.html");
    require("../custom-php/connector.php");
    ?>
    <div class="container-fluid staff-content">

    	 <div class="container-fluid">
            <form class="form-inline my-2 mx-2">
            
            </form>
        </div>

        <div class="container-fluid my-3 mx-auto" style="width:20rem">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addServices">Add Services</button>
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
                <?php
                    $test = "SELECT * FROM church_services";
                    $result=mysqli_query($connection,$test);
                    if($result){
                       while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td>$row[3]</td>";
                        echo "<td class='desc text-center'>";   
                        // echo "<button class='btn btn-outline-secondary open-viewUser' data-toggle='modal' data-id=".$row['serviceID']." data-target='#viewServiceModal'>View</button>";
                        echo "<button class='btn btn-outline-primary open-editUser' data-toggle='modal' data-id=".$row['serviceID']." data-target='#editServiceModal'>Edit</button>";
                        echo "&nbsp";
                        echo "<a href='../controllers/staff-service-controller.php?deleteID=".$row['serviceID']."'><button class='btn btn-outline-danger'>Delete</button></a>";
                        echo "</td>";
                        echo "</tr>";
                       }
                    }else{
                        echo("<script>console.log('sod');</script>");
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>	
</div>
<!-- add services modal -->
<div class="modal fade" id="addServices" tabindex="-1" role="dialog" aria-labelledby="addServices" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addServices">Add Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/staff-service-controller.php" method="POST" name="form" id="form" onsubmit="return validateForm()"> 
        
                        <div class="form-group">
                            <label for="service-name">Service Name:</label>
                            <!-- <div class="input-group" id="service-name"> -->
                                <input type="text" class="form-control" name="servicenames" id="servicenames">
                            <!-- </div> -->
                        </div>
                        <div class="form-group">
                            <label for="service-desc">Service Description:</label>
                            <textarea class="form-control" id="servicedescs" rows="2" name="servicedescs"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="service-price">Downpayment Cost:</label>
                            <input type="number" class="form-control" placeholder="₱000.00"id="serviceprices" name="serviceprices">
                        </div>
                        <div class="form-group">
                            <label for="service-pic">Event Picture</label>
                            <input type="file" class="form-control" placeholder="picture"id="servicepics" name="servicepics">
                        </div>
                        <div class="form-group">
                            <label for="service-reqs">Requirements:</label>
                            <textarea class="form-control" id="servicereqss" rows="2" name="servicereqss" ></textarea>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name=addID>Submit</button>    
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- edit services modal -->
<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="EditSerivceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditServiceLabel">Edit Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/staff-service-controller.php" method="POST" name="editServiceForm">
                        <div class="form-group">
                            <input type="hidden" name="passedID" id="passedID">
                        </div>
                        <div class="form-group">
                            <label for="servicenames" >Service Name:</label>
                            <input type="text" class="form-control" id="servicenames" name="serviceNames">
                        </div>
                        <div class="form-group">
                            <label for="servicedecs" >Service Description:</label>
                            <input type="text" class="form-control" id="servicedecs" name="serviceDescs">
                        </div>
                        <div class="form-group">
                            <label for="service-price">Downpayment Cost:</label>
                            <input type="number" class="form-control" placeholder="₱000.00"id="serviceprices" name="servicePrices">
                        </div>
                        <div class="form-group">
                            <label for="service-pic">Event Picture</label>
                            <input type="file" class="form-control" placeholder="picture"id="servicepics" name="servicePics">
                        </div>
                        <div class="form-group">
                            <label for="servicereqs" >Requirements:</label>
                            <input type="text" class="form-control" id="servicereqs" name="serviceReqss">
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name="editID">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- view service modal -->
</body>
</html>