<?php
if(isset($_REQUEST['command']) && $_REQUEST['command'] == 'delete'){
    $result = deleteProfile($_REQUEST['email'], $loggedInUser->userType);
    if($result){
        header('Location: ../index.php');
    }
}
?>