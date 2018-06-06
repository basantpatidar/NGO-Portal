<?php
require_once('config.php');

$nname = trim($_POST["nname"]);
$license = trim($_POST["nlicense"]);
$address = trim($_POST["naddress"]);
$email = (string)trim($_POST["nemail"]);
$password = trim($_POST["pass2"]);
$phone = trim($_POST["nphone"]);
$website = trim($_POST["nwebsite"]);
$purpose = trim($_POST["npurpose"]);
$type = trim($_POST["ntype"]);
$fundraisers = trim($_POST["nfundraisers"]);
$capacity = (string)trim($_POST["ncapacity"]);
$established = (string)trim($_POST["nestablished"]);
$description = trim($_POST["nabout"]);
$location = trim($_POST["naddress"]);

$createNGO = createNgo($nname, $license, $email, $phone, $website, $established, $type, $purpose, $fundraisers, $capacity, $password, $location, $description);

if($createNGO){
    header("Location: ../index.php");
}
?>