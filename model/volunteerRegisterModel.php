<?php
require_once('config.php');

$fname = $_POST['vfname'];
$lname = $_POST['vlname'];
$email = $_POST['vemail'];
$password = $_POST['pass1'];
$repassword = $_POST['pass2'];
$phone = $_POST['vphone'];
$birthday = $_POST['vbirthday'];
$date = date_create($birthday);
$bday = date_format($date,"Ymd");

if($password==$repassword) {
    $newUser = createUser($fname, $lname, $email, $phone, $bday, $password);
    if ($newUser) {
        header('Location: ../index.php');
    }
}

?>