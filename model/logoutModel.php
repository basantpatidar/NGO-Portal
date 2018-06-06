<?php
require_once("config.php");
session_unset();
header('Location: ../login.php');
exit;
?>