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
        <!-- Search Bar code -->
        <div class="container-fluid">
            <form class="form-inline my-2 mx-2">
                <input class="form-control mr-sm-2" type="search" placeholder="Search Donations" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        <div class="container-fluid my-3 mx-auto" style="width: 20rem">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addDonationModal">Add Donation</button>
        </div>

        <div class="container-fluid mx-auto" style="width: 70rem">
            <table class="table table-bordered table-hover">
                <thead class="bg-grey">
                    <tr>
                        <th scope="col">Donated By</th>
                        <th scope="col">Donation Category</th>
                        <th scope="col">Goods/Amount Donated</th>
                        <th scope="col">Date Donated</th>
                        <th scope="col">Donation Type</th>
                    </tr>
                </thead>
                <tbody>
                <!-- put back end shit here -->
                </tbody>
            </table>
        </div>

        <div class="container-fluid my-3 mx-auto" style="width: 20rem">
            <button class="btn btn-primary" data-toggle="modal" data-target="#donationCategoryModal">Add Donation Category</button>
        </div>

        <div class="container-fluid mx-auto" style="width: 70rem">
            <table class="table table-bordered table-hover">
                <thead class="bg-grey">
                    <tr>
                        <th scope="col">Category Name</th>
                        <th scope="col">Category Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <!-- put back end shit here -->
                </tbody>
            </table>
        </div>
        <!-- Add donation modal -->
        <div class="modal fade" id="addDonationModal" tabindex="-1" role="dialog" aria-labelledby="addDonationLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDonationLabel">Add Donation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
        
                        <div class="form-group">
                            <label for="donor-name">Donor Name(Can be Anonymous):</label>
                            <div class="input-group" id="donor-name">
                                <input type="text" class="form-control" placeholder="donated by">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="donation-amount-input">Donation Amount/Goods</label>
                            <input type="text" class="form-control" placeholder="" id="donation-amount-input">
                        </div>
                        <div class="form-group">
                            <label for="donation-type-selector">Donation Type: </label>
                            <select class="form-control" id="donation-type-selector">
                                <option>Cash</option>
                                <option>In Kind</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="donation-category-selector">Donation Category: </label>
                            <select class="form-control" id="donation-category-selector">
                                <option>Roof Repair</option>
                                <option>Relief Goods</option>
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
        <!-- Donation Category Modal -->
        <div class="modal fade" id="donationCategoryModal" tabindex="-1" role="dialog" aria-labelledby="donationCategoryLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="donationCategoryLabel">Add Donation Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
        
                        <div class="form-group">
                            <label for="category-name">Donation Category:</label>
                            <div class="input-group" id="category-name">
                                <input type="text" class="form-control" placeholder="category">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="donation-category-desc">Donation Category Description</label>
                            <textarea class="form-control" id="donation-category-desc" rows="2" id="emp-address-input"></textarea>
                        </div>
                        <div class="container text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
        </div>

    </div>
</body>
</html>