<?php
require_once('config.php');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];

$savefeedback = addfeedback($fname, $lname, $phone, $email, $feedback);

if($savefeedback){
    header('Location: ../index.php');
}
?>