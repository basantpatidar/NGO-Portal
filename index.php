<?php
    include('header.php'); //header file
    require_once('model/config.php');
    //Fetching all the testimonials
    $fetchTest = getAllTest();
?>

<!-- Cover Start -->
<div class="container-fluid">
    <div class="col-md-12 hover-slide text-center">
        <a href="donation.php" class="btn btn-danger start-me">Donate Now</a>
        <a href="ngolist.php" class="btn btn-danger start-me">List of NGO's</a>
    </div>
    <div id="myCarousel" class="carousel fade" data-ride="carousel" data-interval="3000">
        <!-- Indicators -->
        <ol class="carousel-indicators" hidden>
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="img/banner1.jpg" alt="banner img1" style="width:100%; height: 100%">
            </div>
            <div class="item">
                <img src="img/banner2.jpg" alt="banner img2" style="width:100%;">
            </div>
            <div class="item">
                <img src="img/banner3.jpg" alt="banner img3" style="width:100%;">
            </div>
        </div>
    </div>

</div>
<!-- Cover End -->


<!-- Our Mission Start -->
<div id="mission" class="mission">
    <div class="container">
        <div class="row">
            <h2>Our Vision</h2>
            <i>"Deeds of giving are the very foundations of the world"</i>
        </div>
    </div>
</div>
<!-- Our Mission End -->


<!-- Team Intro Start -->
<div id="myTeam" class="team">
    <div class="container">
        <div class="row">
            <h2>Meet Our Team</h2>
            <p>Meet the Brain Stormers, Developer and the Designers.  </p>

        </div>
        <div class="col-lg-3 col-md-3 detailssection">
            <img src="img/user1.jpg" class="img-circle" alt="akshay">
            <h4>Akshay Gupta</h4>
            <b>Developer</b><br>
            <a><i class="fa fa-linkedin" style="font-size:24px"></i></a>
        </div>
        <div class="col-lg-3 col-md-3">
            <img src="img/user2.jpeg" class="img-circle" alt="akshay">
            <h4>Basant Patidar</h4>
            <b>Developer</b><br>
            <a><i class="fa fa-linkedin" style="font-size:24px"></i></a>
        </div>
        <div class="col-lg-3 col-md-3">
            <img src="img/user3.png" class="img-circle" alt="akshay">
            <h4>Reshma Regi</h4>
            <b>UX Designer</b><br>
            <a><i class="fa fa-linkedin" style="font-size:24px"></i></a>
        </div>
        <div class="col-lg-3 col-md-3">
            <img src="img/user4.jpg" class="img-circle" alt="akshay">
            <h4>Ruchi</h4>
            <b>Content witer</b><br>
            <a><i class="fa fa-linkedin" style="font-size:24px"></i></a>
        </div>
    </div>
</div>
</div>
<!-- Team Intro End -->


<!-- Testimonial Start-->
<div class="container-fluid">
    <div id="testimonial" class="carousel slide" data-ride="carousel">
        <div class="transparent">

            <!-- Header -->
            <div class="testimonial_header">
                <h2>Testimonials</h2>
            </div>

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#testimonial" data-slide-to="0" class="active"></li>
                <li data-target="#testimonial" data-slide-to="1"></li>
                <li data-target="#testimonial" data-slide-to="2"></li>
                <li data-target="#testimonial" data-slide-to="3"></li>
            </ol>

            <!-- Wrapping Slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="testimonial_slide">
                        <?php echo '<p>'.$fetchTest[0]['test'].'</p>' ?>
                        <h4>Rayn Tenon</h4>
                    </div>
                </div>
                <?php for ($x = 1; $x < 4; $x++) {
                    echo '<div class="item">';
                    echo '<div class="testimonial_slide">';
                    echo '<p>'.$fetchTest[$x]['test'].'</p>';
                    echo '<h4>SHenon</h4>';
                    echo '</div>';
                    echo '</div>';
                }?>
            </div>

            <!-- Left and Right Controls -->
            <a class="left carousel-control" href="#testimonial" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#testimonial" role="button"  data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
</div>
<!-- Testimonial End-->

<?php include('footer.php') ?>
