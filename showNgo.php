<?php
require_once('model/config.php');
include('header.php');

$NGOid = $_GET['id'];

$showNGO = fetchThisNGO($NGOid);
?>

<!-- Profile Section Start -->
<form name="form1" method="post">
    <input type="hidden" name="email" />
    <input type="hidden" name="command" />

    <div id="ngoprofile" class="container">
        <div class="well">
            <div class="row">
                <div class="col-xs-3 col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="img/logo.jpg" alt="logo">
                    </a>
                </div>
                <div class="col-xs-1 col-md-1"></div>
                <div class="col-xs-5 col-md-5">
                    <label>Name: </label> <span><?php print($showNGO['ngoName']); ?></span><br>
                    <label>Website: </label> <span><?php print($showNGO['ngoWebsite']); ?></span><br>
                    <label>Established Year: </label> <span><?php print($showNGO['ngoEstYear']); ?></span><br>
                    <label>NGO Type: </label> <span><?php print($showNGO['ngoType']); ?></span><br>
                    <label>NGO Cause: </label> <span><?php print($showNGO['ngoCause']); ?></span><br>
                    <label>People helped: </label> <span><?php print($showNGO['ngoPeopleHelped']); ?></span><br>
                </div>
                <div class="col-xs-3 col-md-3">
                    <a href="donation.php?id=<?php print($NGOid);?>" class="btn btn-primary">Donate Now</a>
                </div>
            </div>
            <div class="caption">
                <h2>Description</h2>
                <p><?php print($showNGO['ngoDescription'])?></p>
            </div>
        </div>
    </div>
</form>
<!-- Profile Section End -->

<!-- Picture Carousel Start -->
<div id="picturecarousel" class="container">
    <div class="well">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="6000">
            <!-- Indicators -->
            <ol class="carousel-indicators" hidden>
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="img/forest.jpg" alt="Los Angeles" style="width:250px; height: 150px">
                        </div>
                        <div class="col-md-3">
                            <img src="img/forest.jpg" alt="Los Angeles" style="width:250px; height: 150px">
                        </div>
                        <div class="col-md-3">
                            <img src="img/mountain.jpg" alt="Los Angeles" style="width:250px; height: 150px">
                        </div>
                        <div class="col-md-3">
                            <img src="img/nature.jpg" alt="Los Angeles" style="width:250px; height: 150px">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="img/mountain.jpg" alt="Los Angeles" style="width:250px; height: 150px">
                        </div>
                        <div class="col-md-3">
                            <img src="img/mountain.jpg" alt="Los Angeles" style="width:250px; height: 150px">
                        </div>
                        <div class="col-md-3">
                            <img src="img/nature.jpg" alt="Los Angeles" style="width:250px; height: 150px">
                        </div>
                        <div class="col-md-3">
                            <img src="img/forest.jpg" alt="Los Angeles" style="width:250px; height: 150px">
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="img/nature.jpg" alt="Los Angeles" style="width:250px; height: 150px">
                        </div>
                        <div class="col-md-3">
                            <img src="img/nature.jpg" alt="Los Angeles" style="width:250px; height: 150px">
                        </div>
                        <div class="col-md-3">
                            <img src="img/mountain.jpg" alt="Los Angeles" style="width:250px; height: 150px">
                        </div>
                        <div class="col-md-3">
                            <img src="img/forest.jpg" alt="Los Angeles" style="width:250px; height: 150px">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Left and Right Controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button"  data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<!-- Picture Carousel End -->

<?php include('footer.php');?>
