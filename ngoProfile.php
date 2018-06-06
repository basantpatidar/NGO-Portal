<?php
require_once('model/config.php');

#!add user type
if($loggedInUser->userType != 'ngo'){
    header('Location: http://localhost/project/login.php');
    die();
}

if(isset($_REQUEST['command']) && $_REQUEST['command'] == 'delete'){
    $result = deleteProfile($_REQUEST['email']);
    if($result){
        header('Location: http://localhost/project/thankyou.php');
    }
}
if(!empty($_POST)) {
    // $submit = $_POST['submit'];
    // if ($submit == 'Upload') {
    if (isset($_POST['submit'])) {
        $ngoID = $loggedInUser->NGOUniqueID;
        $imgID = uniqid('', true);
        $file = $_FILES['file'];
        //print_r($file);
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        // print_r($fileExt);

        $fileActualExt = strtolower(end($fileExt));
        //print"$fileActualExt";

        $allowed = array('jpg', 'jpeg', 'png');
        //print_r ($allowed);

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1240000) {
                    //echo"Correct Size";
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    //print"$fileNameNew";

                    $fileDestination = 'uploads/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);

                    $SaveFileName = addImg($imgID, $fileNameNew, $ngoID);

                    //print("Image uploaded");

                } else {
                    echo "Image file is too big";
                }
            } else {
                echo "There was an error uploading your image file";
            }
        } else {
            echo "You cannot upload this type of file";
        }
    }
}

include('header.php');
?>

<!-- Profile Section Start -->
<input type="hidden" name="email" />
<input type="hidden" name="command" />

<div id="ngoprofile" class="container">
    <div class="well">
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <a href="#" class="thumbnail">
                    <img src="img/logo.jpg" alt="logo">
                </a>
            </div>
            <div class="col-xs-1 col-md-1"></div>
            <div class="col-xs-5 col-md-5">
                <label>Name: </label> <span><?php print($loggedInUser->ngoName); ?></span><br>
                <label>License: </label> <span><?php print($loggedInUser->license); ?></span><br>
                <label>Email: </label> <span><?php print($loggedInUser->ngoEmail); ?></span><br>
                <label>Phone: </label> <span><?php print($loggedInUser->ngoPhone); ?></span><br>
                <label>Website: </label> <span><?php print($loggedInUser->ngoWebsite); ?></span><br>
                <label>Established Year: </label> <span><?php print($loggedInUser->ngoEstYear); ?></span><br>
                <label>NGO Type: </label> <span><?php print($loggedInUser->ngoType); ?></span><br>
                <label>NGO Cause: </label> <span><?php print($loggedInUser->ngoCause); ?></span><br>
                <label>Fundraiser Name: </label> <span><?php print($loggedInUser->ngoFundraiserName); ?></span><br>
                <label>People helped: </label> <span><?php print($loggedInUser->ngoPeopleHelped); ?></span><br>
            </div>
            <div class="col-xs-3 col-md-3">
                <a href="editProfile.php" class="btn btn-primary">Edit <span class="glyphicon glyphicon-edit"></span></a>
                <a href="javascript:del('<?php print($loggedInUser->ngoEmail); ?>')" class="btn btn-danger">Delete <span class="glyphicon glyphicon-trash"></span></a>
                <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data">
                    <div class="upload-img-btn">
                        <!--        <input type="file" name="file"> -->
                        <label class="custom-file-upload">
                            <input type="file" name="file"/>
                            Choose Image
                        </label>
                        <input type="submit" name="submit" value="Upload">
                    </div>
                </form>
            </div>
        </div>
        <div class="caption">
            <h2>Description</h2>
            <p><?php print($loggedInUser->description)?></p>
        </div>
    </div>
</div>

<!-- Profile Section End -->

<!-- Picture Carousel Start -->
<div id="picturecarousel" class="container">
    <div class="well">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="6000">
            <!-- Indicators -->
            <ol class="carousel-indicators" hidden>
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <ol class="carousel-indicators" hidden>
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                        <?php
                        $ngoID = $loggedInUser->NGOUniqueID;
                        $fetchImage = fetchImage($ngoID);
                        $imageCounter = 0;
                        //foreach($fetchImage as $displayImages){
                        for($i=0; $i<count($fetchImage); $i++){
                            $imageCounter ++;
                            $displayImages = $fetchImage[$i]['imgName']; ?>
                            <?php // echo '<img src="uploads/'.$profileImage.'" alt="Profile Image">'; ?>
                            <div class="col-md-3">
                                <img src="uploads/<?php echo $displayImages; ?>" alt="Los Angeles" style="width:250px; height: 150px">
                            </div>
                            <?php
                            if($imageCounter == 4)
                                break;
                        } ?>
                    </div>
                </div>
                <?php $j = 4;
                $loopCount = count($fetchImage)/4;
                do { ?>
                    <div class="item">
                        <div class="row">
                            <?php $counter = 0; for(; $j < count($fetchImage); $j++){ ?>
                                <div class="col-md-3">
                                    <img src="uploads/<?php echo $fetchImage[$j]['imgName']; ?>" alt="Los Angeles" style="width:250px; height: 150px">
                                </div>
                                <?php
                                $counter++;
                                if($counter == 4)
                                    break;
                            }   ?>
                        </div>
                    </div>
                    <?php $loopCount--;} while( $loopCount > 1 ); ?>
            </div>

            <!-- Left and Right Controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button"  data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<!-- Picture Carousel End -->

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