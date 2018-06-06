<?php
require_once('config.php');

if($loggedInUser->userType == 'ngo') {
    $nname = trim($_POST["nname"]);
    $email = $loggedInUser->ngoEmail;
    $address = trim($_POST["naddress"]);
    $phone = trim($_POST["nphone"]);
    $website = trim($_POST["nwebsite"]);
    $purpose = trim($_POST["npurpose"]);
    $type = trim($_POST["ntype"]);
    $fundraisers = trim($_POST["nfundraisers"]);
    $capacity = (string)trim($_POST["ncapacity"]);
    $description = trim($_POST["nabout"]);
    $location = trim($_POST["naddress"]);

    $updateNGO = updateNgo($nname, $email, $phone, $website, $type, $purpose, $fundraisers, $capacity, $location, $description);

    if ($updateNGO) {
        $loggedInUser->ngoName = $updateNGO['ngoName'];
        $loggedInUser->license = $updateNGO['license'];
        $loggedInUser->ngoPhone = $updateNGO['ngoPhone'];
        $loggedInUser->ngoWebsite = $updateNGO['ngoWebsite'];
        $loggedInUser->ngoEstYear = $updateNGO['ngoEstYear'];
        $loggedInUser->ngoType = $updateNGO['ngoType'];
        $loggedInUser->ngoCause = $updateNGO['ngoCause'];
        $loggedInUser->ngoFundraiserName = $updateNGO['ngoFundraiserName'];
        $loggedInUser->ngoPeopleHelped = $updateNGO['ngoPeopleHelped'];
        $loggedInUser->description = $updateNGO['ngoDescription'];
        $loggedInUser->location = $updateNGO['ngoLocation'];

        $_SESSION['thisUser'] = $loggedInUser;

        header('Location: ../ngoProfile.php');
    }
}elseif($loggedInUser->userType == 'volunteer'){
    $fname = $_POST['vfname'];
    $lname = $_POST['vlname'];
    $email = $loggedInUser->Email;
    $phone = $_POST['vphone'];

    $updateUser = updateUser($fname, $lname, $email, $phone);
    if ($updateUser) {
        $loggedInUser->firstName = $updateUser['firstName'];
        $loggedInUser->lastName = $updateUser['lastName'];
        $loggedInUser->Phone = $updateUser['phone'];

        $_SESSION['thisUser'] = $loggedInUser;

        header('Location: ../userProfile.php');
    }
}
?>