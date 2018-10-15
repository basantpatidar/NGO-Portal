<?php require_once('model/config.php'); ?>
//html header 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NGO Navigator</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>

<!-- Navbar Start -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">NGO Navigator</a>
        </div>
        <div class="collapse navbar-collapse navbar-responsive-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php

                if(empty($loggedInUser)) {
                    echo '<li><a href="volunteerRegister.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
                    echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                }else if(($loggedInUser->userType == 'ngo')){
                    echo '<li><a href="ngoProfile.php"><span class="glyphicon glyphicon-user"></span> ' .$loggedInUser->ngoName.'</a></li>';
                    echo '<li><a href="model/logoutModel.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
                }else if(($loggedInUser->userType == 'volunteer')){
                    echo '<li><a href="userProfile.php"><span class="glyphicon glyphicon-user"></span> ' .$loggedInUser->firstName.'</a></li>';
                    echo '<li><a href="model/logoutModel.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar End -->
