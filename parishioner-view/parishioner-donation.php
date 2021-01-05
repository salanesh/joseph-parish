<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate to Church</title>
    <?php
    include("../shared-html/header-links-loggedin.html");
    ?>
</head>
<body>
    <?php
    require("../shared-html/parishionernav.html");
    ?>
    <div class="container-fluid staff-content">
        <div class="container-fluid">
            <form class="form-inline my-2 mx-2">
                <input class="form-control mr-sm-2" type="search" placeholder="Search Donations" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div> 
      
      <div class="container mx-auto my-5" style="width: 120rem; background-color:blue" >
      <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselIndicators" data-slide-to="1"></li>
        </ol>
  <div class="carousel-inner">
  <div class="carousel-item active">
    <div class="row">
              <div class="card col-5">
                <img src="../img/feeding.jpg" class="card-img-top" alt="..." style="width:100%; margin:10px;">
                <div class="card-body">
                  <h5 class="card-title">Christmas Food Drive</h5>
                  <p class="card-text">Please support us in helping needy children this christmas</p>
                </div>
              </div>
              <div class="col-2"></div>
              <div class="card col-5">
                <img src="../img/child-choir.jpg" class="card-img-top" alt="..." style="width:100%; padding-left:0px;">
                <div class="card-body">
                  <h5 class="card-title">Child Choir</h5>
                  <p class="card-text">Please help us in bringing out the talent of our youth through the choir</p>
                </div>
              </div>
         </div>
    </div>
    <div class="carousel-item">
         <div class="row">
              <div class="card col-5">
                <img src="..." class="card-img-top" alt="..." style="width:100%; margin:10px;">
                <div class="card-body">
                  <h5 class="card-title">Card 1</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
              <div class="col-2"></div>
              <div class="card col-5">
                <img src="..." class="card-img-top" alt="..." style="width:100%; margin:10px;">
                <div class="card-body">
                  <h5 class="card-title">Card 2</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
         </div>
          
    </div>
  <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


      
</div> 
</div>
<div class="container-fluid my-3 mx-auto" style="width: 10rem">
        	<button class="btn btn-primary" data-toggle="modal" data-target="#addEventModal">Submit</button>
</div>

</div>

</body>
</html>