<?php
require_once('config.php');

$FirstName = $_POST['firstName'];
$LastName = $_POST['lastName'];
$Email = $_POST['email'];
$Phone = $_POST['phone'];
$DonationType = $_POST['donationType'];
$NGOUniqueID = $_POST['NGOList'];

if($DonationType === 'goodies' && !empty($_POST['good_list'])){
    $Donation = "";
    for($i = 0; $i < count($_POST['good_list']); $i++){
        $Donation .= $_POST['good_list'][$i].'; ';
    }
}else if($DonationType === 'time' && !empty($_POST['time_radio'])){
    $Donation .= $_POST['time_radio'];
}else if($DonationType === 'money' && !empty($_POST['money'])){
    $Donation = '$ '.$_POST['money'];
}

if($_POST['anonymous'] == "anonymous") {
    $makeDonation = makeDonation($DonationType, $NGOUniqueID, $Donation, "", "");
}else {
    $makeDonation = makeDonation($DonationType, $NGOUniqueID, $Donation, $FirstName, $LastName);
}

if($makeDonation){
    header('Location: ../donation.php?flag="t"');
}
?>