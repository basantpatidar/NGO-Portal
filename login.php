<?php
include('header.php');

if(!empty($loggedInUser)){
    header('Location: index.php');
    die();
}

$flag = $_GET['flag'];
?>

<div id="login" class="container-fluid">
    <div class="text-center modal-dialog form-size">
        <br><br><br><br><br>
        <form name="form-group center login" action="model/loginModel.php" method="post">
            <div class="inputs" >
                <h2>Login</h2>
                <img src="img/user-logo.jpg" class="img-logo"><br>
                Join us to help people... <a href="volunteerRegister.php">Sign Up</a> <br><br>
                <?php if($flag){print("<h5 style='color: red'>Invalid Credentials!</h5>");}?>
                <input type="text" class="form-control" name="username" value="" placeholder="Enter Email" required> <br>
                <input type="password" class="form-control" name="password" value="" placeholder="Enter Password" required> <br>
                <button class="btn btn-success" style="margin: 10px">Login</button>
            </div>
        </form>
    </div>
</div>

<?php include('footer.php') ?>