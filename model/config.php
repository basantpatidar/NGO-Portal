<?php

ob_start();

require_once("db_settings.php");     //required DB connection
require_once("function.php");       //all function are declared and defined
require_once("ngo.php");           //class for ngo
require_once("user.php");           //class for user

session_start();

if(isset($_SESSION["thisUser"]) && is_object($_SESSION["thisUser"])) {
    $loggedInUser = $_SESSION["thisUser"];
}

?>