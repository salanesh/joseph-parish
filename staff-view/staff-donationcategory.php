<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Donation Category</title>
    <?php
    include("../shared-html/header-links-loggedin.html");
    require("../custom-php/connector.php");
    require("../custom-js/staff-functions.js");
    ?>
</head>
<body>
<script src="../custom-js/staff-functions.js"></script>
    <?php
    require("../shared-html/staffnav.html");
    ?>
    <div class="container-fluid staff-content">
    <div class="container-fluid">
        <form class="form-inline my-2 mx-2">
        <input class="form-control mr-sm-2" type="search" placeholder="Search Donation Category" aria-label="Search">
        <button class="btn btn-outline-success my-1 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    
    
    <div class="container-fluid my-3 mx-auto" style="width: 20rem">
        <button class="btn btn-primary" data-toggle="modal" data-target="#addDonationCategoryModal">Add Donation Category</button>
    </div>
    <?php
        if (isset($_GET['success'])){
            $success = $_GET['success'];
            echo '<div class="alert alert-success text-center">';
            echo '<button class="close" data-dismiss="alert">X</button>';
            echo $success;
            echo '</div>';
        }
    ?>
    <div class="container-fluid mx-auto" style="width: 70rem">                     
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Category ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Category Description</th>
                    <th scope="col">Actions</th>
                
                </tr>
            </thead>
            <tbody>
                  
                <?php
                    $sql="SELECT * from Categories where catStatus!=0";
                    $shit=mysqli_query($connection,$sql); 
                    while($row = mysqli_fetch_assoc($shit)) {
                       echo "<tr>";
                       echo "<th>";
                       echo $row['catID'];
                       echo "</th>";
                       echo "<td>";
                       echo $row['catName'];
                       echo "</td>";
                       echo "<td>";
                       echo $row['catDesc'];
                       echo "</td>";
                       echo "<td>";
                       echo "<button class='btn btn-secondary open-editUser' data-toggle='modal' data-id=".$row['catID']." data-target='#editDonationCategoryModal'>Edit</button>";
                       echo "&nbsp";
                       echo "<a href='../controllers/donationcategory-controller.php?deactID=".$row['catID']."'><button class='btn btn-danger' onclick = 'return confirm(Are you sure?)'>Deactivate</button></a>";
                       echo "</td>";
                       echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    </div>
    

    <div class="modal fade" id="addDonationCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addDonationCategoryLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDonationCategoryLabel">Add Donation Category</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/donationcategory-controller.php" method="POST" name="DonationCategoryForm" onsubmit="return(staffValidator());">
                        <div class="form-group">
                            <label for="donationcategory-name">Category Name:</label>
                            <input type="text" class="form-control" id="donationcategory-name" name="catName">
                        </div>
                        <div class="form-group">
                            <label for="catDescArea">Category Description: </label>
                            <textarea name="catDesc" id="catDescArea" class="form-control" columns= "10" rows="5"></textarea>
                        </div>
                        
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name="addDonationCategory">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- edit employees modal -->
    <div class="modal fade" id="editDonationCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editDonationCategoryLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDonationCategoryLabel">Edit Donation Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controllers/donationcategory-controller.php" method="POST" name="DonationCategoryUpdateForm">
                        <div class="form-group">
                            <input type="hidden" name="passedID" id="passedID">
                        </div>
                        <div class="form-group">
                            <label for="donationcategory-name">Category Name:</label>
                            <input type="text" class="form-control" id="donationcategory-name" name="catName">
                        </div>
                        <div class="form-group">
                            <label for="catDescArea">Category Description: </label>
                            <textarea name="catDesc" id="catDescArea" class="form-control" columns= "10" rows="5"></textarea>
                            </div>
                        
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary" name="editDonationCategory">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>