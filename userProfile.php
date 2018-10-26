<?php
require_once('model/config.php');
//login validation

if($loggedInUser->userType != 'volunteer'){
    header('Location: login.php');
    die();
}

include('model/deleteProfileModel.php');
include('header.php');
?>

<!-- Profile Section Start -->
<form name="form1" method="post">
    <input type="hidden" name="email" />
    <input type="hidden" name="command" />

    <div id="userprofile" class="container">
        <div class="well">
            <div class="row">
                <div class="col-xs-3 col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="img/user2.jpeg" alt="logo">
                    </a>
                </div>
                <div class="col-xs-1 col-md-1"></div>
                <div class="col-xs-5 col-md-5">
                    <label>Name: </label> <span><?php print($loggedInUser->firstName); ?></span><br>
                    <label>License: </label> <span><?php print($loggedInUser->lastName); ?></span><br>
                    <label>Email: </label> <span><?php print($loggedInUser->Email); ?></span><br>
                    <label>Phone: </label> <span><?php print($loggedInUser->Phone); ?></span><br>
                    <label>Birthdate: </label> <span><?php print($loggedInUser->Birthdate); ?></span><br>
                </div>
                <div class="col-xs-3 col-md-3">
                    <a href="editProfile.php" class="btn btn-primary">Edit <span class="glyphicon glyphicon-edit"></span></a>
                    <a href="javascript:del('<?php print($loggedInUser->Email); ?>')" class="btn btn-danger">Delete <span class="glyphicon glyphicon-trash"></span></a>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Profile Section End -->

<script type="text/javascript">
    function del(email) {
        if(confirm('Do you really mean to delete your profile?')){
            document.form1.email.value = email;
            document.form1.command.value = 'delete';
            document.form1.submit();
        }
    }
</script>

<?php include('footer.php') ?>
