<?php
require_once('model/config.php');
include('header.php');

if(!empty($loggedInUser)){
    header('Location: index.php');
    die();
}

?>
//Registration page
<div id="ngoregister" class="container">
    <div class="well">
        <h2 class="text-center">Sign up</h2>
        <hr>
        <form class="form-horizontal" method="post" action="model/ngoRegisterModel.php">
            <div class="form-group">
                <label class="control-label col-md-3">Name</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nname" value="" placeholder="Enter Name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">License Number</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nlicense" value="" placeholder="Enter Licence Number" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Location</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="naddress" value="" placeholder="Enter Location" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Email</label>
                <div class="col-md-9">
                    <input type="email" class="form-control" name="nemail" value="" placeholder="Enter Email Address" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Create password</label>
                <div class="col-md-9">
                    <input type="password" class="form-control" name="pass1" id="pass1" value="" placeholder="Enter Password" required><br>
                    <input type="password" class="form-control" name="pass2" id="pass2" value="" placeholder="Re-Enter Password"
                           onkeyup="checkPass(); return false;" required>
                    <span class="confirmMessage" id="confirmMessage"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Phone</label>
                <div class="col-md-9">
                    <input type="text" class="form-control inputs" name="nphone" value="" placeholder="Enter Phone Number" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Website Name</label>
                <div class="col-md-9">
                    <input type="text" class="form-control inputs" name="nwebsite" value="" placeholder="Enter your website" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Cause</label>
                <div class="col-md-9">
                    <input type="text" class="form-control inputs" name="npurpose" value="" placeholder="Enter purpuse of NGO" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Type</label>
                <div class="col-md-9">
                    <input type="text" class="form-control inputs" name="ntype" value="" placeholder="Enter type of NGO" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">About</label>
                <div class="col-md-9">
                    <textarea class="form-control" name="nabout" rows="3" value=""></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Fundraisers</label>
                <div class="col-md-9">
                    <input type="text" class="form-control inputs" name="nfundraisers" value="" placeholder="Enter Fundraisers name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Capacity of Volunteers</label>
                <div class="col-md-9">
                    <input type="text" class="form-control inputs" name="ncapacity" value="100">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Establised Since</label>
                <div class="col-md-9">
                    <input type="number" class="form-control inputs" name="nestablished" min="1900" max="2018" step="1" value="2018">
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-success" name="submit" value="Sign Up">
                <input type="reset" class="btn btn-warning" name="reset" value="Reset">
            </div>
        </form>
    </div>
</div>

<?php
include('footer.php')
?>
