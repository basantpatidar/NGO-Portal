<?php
require_once('model/config.php');
include('header.php');

if(empty($loggedInUser)){
    header('Location: login.php');
    die();
}
?>
//edit user profile
<?php if($loggedInUser->userType == 'ngo'){ ?>
<div id="ngoregister" class="container">
    <div class="well">
        <h2 class="text-center">Edit Profile</h2>
        <hr>
        <form class="form-horizontal" method="post" action="../model/editProfileModel.php">
            <div class="form-group">
                <label class="control-label col-md-3">Name</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nname" value="<?php print($loggedInUser->ngoName)?>" placeholder="Enter Name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">License Number</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="nlicense" value="<?php print($loggedInUser->license)?>" disabled required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Location</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="naddress" value="<?php print($loggedInUser->location)?>" placeholder="Enter Address">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Email</label>
                <div class="col-md-9">
                    <input type="email" class="form-control" name="nemail" value="<?php print($loggedInUser->ngoEmail)?>" disabled required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Phone</label>
                <div class="col-md-9">
                    <input type="text" class="form-control inputs" name="nphone" value="<?php print($loggedInUser->ngoPhone)?>" placeholder="Enter Phone Number" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Website Name</label>
                <div class="col-md-9">
                    <input type="text" class="form-control inputs" name="nwebsite" value="<?php print($loggedInUser->ngoWebsite)?>" placeholder="Enter your website" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Cause</label>
                <div class="col-md-9">
                    <input type="text" class="form-control inputs" name="npurpose" value="<?php print($loggedInUser->ngoCause)?>" placeholder="Enter purpuse of NGO" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Type</label>
                <div class="col-md-9">
                    <input type="text" class="form-control inputs" name="ntype" value="<?php print($loggedInUser->ngoType)?>" placeholder="Enter type of NGO" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">About</label>
                <div class="col-md-9">
                    <textarea class="form-control" name="nabout" rows="3"><?php print($loggedInUser->description)?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Fundraisers</label>
                <div class="col-md-9">
                    <input type="text" class="form-control inputs" name="nfundraisers" value="<?php print($loggedInUser->ngoFundraiserName)?>" placeholder="Enter Fundraisers name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Capacity of Volunteers</label>
                <div class="col-md-9">
                    <input type="text" class="form-control inputs" name="ncapacity" value="100">
                </div>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-success" name="submit" value="Save">
                <input type="reset" class="btn btn-warning" name="reset" value="Reset">
            </div>
        </form>
    </div>
</div>

<?php }elseif($loggedInUser->userType == 'volunteer'){ ?>
    <div id="volunteerregister" class="container">
        <div class="well">
            <h2 class="text-center">Edit Profile</h2>
            <hr>
            <form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label class="control-label col-md-3">First Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control inputs" name="vfname" value="<?php print($loggedInUser->firstName); ?>" placeholder="Enter First Name" required><br>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Last Name</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control inputs" name="vlname" value="<?php print($loggedInUser->lastName); ?>" placeholder="Enter Last Name" required><br>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Email</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control inputs" name="vemail" value="<?php print($loggedInUser->Email); ?>" placeholder="Enter Email Address" disabled><br>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Phone</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control inputs" name="vphone" value="<?php print($loggedInUser->Phone); ?>" placeholder="Enter Phone Number" required><br>
                    </div>
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-success" name="submit" value="Save">
                    <input type="reset" class="btn btn-warning" name="reset" value="Reset">
                </div>
            </form>
        </div>
    </div>
<?php } ?>

<?php include('footer.php');?>
