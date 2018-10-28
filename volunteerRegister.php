<?php
require_once('model/config.php');
include('header.php');

if(!empty($loggedInUser)){
    header('Location: index.php');
    die();
}
?>
<!-- NGO Registration -->
<div id="volunteerregister" class="container">
    <div class="well">
        <h2 class="text-center">Volunteer Sign up</h2>
        <hr>
        <form class="form-horizontal" method="post" action="model/volunteerRegisterModel.php">
            <div class="form-group">
                <label class="control-label col-md-3">First Name</label>
                <div class="col-md-9">
                    <input type="text" class="form-control inputs" name="vfname" value="" placeholder="Enter First Name" required><br>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Last Name</label>
                <div class="col-md-9">
                    <input type="text" class="form-control inputs" name="vlname" value="" placeholder="Enter Last Name" required><br>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Email Address</label>
                <div class="col-md-9">
                    <input type="email" class="form-control inputs" name="vemail" value="" placeholder="Enter Email Address" required><br>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Password</label>
                <div class="col-md-9">
                    <input type="password" class="form-control inputs" name="pass1" id="pass1" value="" placeholder="Enter Password" required><br>
                    <input type="password" class="form-control inputs" name="pass2" id="pass2" value="" placeholder="Re-Enter Password"
                           onkeyup = "checkPass(); return false;" required><br>
                    <span class="confirmMessage" id="confirmMessage"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Phone Number</label>
                <div class="col-md-9">
                    <input type="text" class="form-control inputs" name="vphone" value="" placeholder="Enter Phone Number" required><br>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Birthday</label>
                <div class="col-md-9">
                    <input type="date" class="form-control inputs" name="vbirthday" value="" placeholder="Enter Birthday Date" required><br>
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-success" name="submit" value="Sign Up">
                <input type="reset" class="btn btn-warning" name="reset" value="Reset">
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function checkPass(){
        //Store the password field objects into variables ...
        var pass1 = document.getElementById('pass1');
        var pass2 = document.getElementById('pass2');

        //Store the Confimation Message Object ...
        var message = document.getElementById('confirmMessage');

        //Set the colors we will be using ...
        var goodColor = "#66cc66";
        var badColor = "#ff6666";

        //Compare the values in the password field
        //and the confirmation field
        if(pass1.value == pass2.value){
            //The passwords match.
            //Set the color to the good color and inform
            //the user that they have entered the correct password
            message.style.color = goodColor;
            message.innerHTML = "Matched!";
        }else{
            //The passwords do not match.
            //Set the color to the bad color and
            //notify the user.
            message.style.color = badColor;
            message.innerHTML = "Invalid Match!";
        }
    }
</script>

<?php include('footer.php');?>
