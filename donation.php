<?php
include('header.php');
require_once('model/config.php');

if(empty($loggedInUser) || $loggedInUser->userType == 'ngo'){
    header('Location: login.php');
    die();
}
//donation page
$flag = $_GET['flag'];
//NGO List
$NGOList = fetchAllNGO();

?>

<div id="donation" class="container">
    <div class="well">
        <h2 class="text-center">Donate Now</h2>
        <?php if($flag == "t"){print("<h5>Donation Made Successfully</h5>");}?>
        <hr>
        <form class="form-horizontal" method="post" action="model/donationModel.php">
            <div class="form-group">
                <label class="control-label col-sm-3" for="firstName">First Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="firstName" placeholder="?" name="firstName" value="<?php !empty($loggedInUser) ? print($loggedInUser->firstName):'' ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="lastName">Last Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="lastName" placeholder="?" name="lastName" value="<?php !empty($loggedInUser) ? print($loggedInUser->lastName):'' ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="email">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" placeholder="?" name="email" value="<?php !empty($loggedInUser) ? print($loggedInUser->Email):'' ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="phone">Phone</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="phone" placeholder="?" name="phone" value="<?php !empty($loggedInUser) ? print($loggedInUser->Phone):'' ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Listed NGO's</label>
                <div class="col-sm-7">
                    <select class="form-control" name="NGOList">
                        <option>Select one ...</option>
                        <?php foreach($NGOList as $ngo){?>
                        <option value="<?php print($ngo['NGOUniqueID']); ?>"><?php print($ngo['NGOName']) ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3">Donation Type</label>
                <div class="col-sm-7">
                    <select class="form-control" id="donationType" name="donationType" onchange="ShowHideDiv()" required>
                        <option value="">Select one ...</option>
                        <option value="goodies">Appliances</option>
                        <option value="time">Time</option>
                        <option value="money">Money</option>
                    </select>
                </div>
            </div>
            <div id="goodies" class="form-group" hidden>
                <label class="text-right col-sm-3">Appliances</label>
                <div class="col-sm-7">
                    <input type="checkbox" name="good_list[]" value="Food"> Food
                    <input type="checkbox" name="good_list[]" value="Clothes"> Clothes
                    <input type="checkbox" name="good_list[]" value="Home Appliances"> Home Appliances
                    <input type="checkbox" name="good_list[]" value="Other (Electronics, Books...)"> Other (Electronics, Books...)
                </div>
            </div>
            <div id="time" class="form-group" hidden>
                <label class="text-right col-sm-3">Time</label>
                <div class="col-sm-7">
                    <input type="radio" name="time_radio" value="Saturday 4:00 PM"> Saturday 4:00 PM
                    <input type="radio" name="time_radio" value="Sunday 5:00 PM"> Sunday 5:00 PM
                </div>
            </div>
            <div id="money" class="form-group" hidden>
                <label class="control-label col-sm-3">Money ($)</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="money" value="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 text-right">
                    <input type="checkbox" name="anonymous" value="anonymous">
                </div>
                <label class="col-sm-7">I want to stay Anonymous!</label>
            </div>
            <div class="form-group text-center">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Donate</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function ShowHideDiv() {
        var donationType = document.getElementById("donationType");

        if(donationType.value === "goodies"){
            document.getElementById("goodies").removeAttribute("hidden");
            document.getElementById("time").setAttribute("hidden", null);
            document.getElementById("money").setAttribute("hidden", null);
        }else if(donationType.value === "time"){
            document.getElementById("time").removeAttribute("hidden");
            document.getElementById("goodies").setAttribute("hidden", null);
            document.getElementById("money").setAttribute("hidden", null);
        }else if(donationType.value === "money"){
            document.getElementById("money").removeAttribute("hidden");
            document.getElementById("goodies").setAttribute("hidden", null);
            document.getElementById("time").setAttribute("hidden", null);
        }else{
            document.getElementById("goodies").setAttribute("hidden", null);
            document.getElementById("time").setAttribute("hidden", null);
            document.getElementById("money").setAttribute("hidden", null);
        }
    }
</script>

<?php include('footer.php'); ?>
