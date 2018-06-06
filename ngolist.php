<?php
require_once('model/config.php');
include('header.php');

$NGOList = fetchAllNGO();

?>
    <div id="ngolist" class="ngolist container">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-7">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <h4 class="navbar-brand">NGO List</h4>
                        </div>
                    </div>
                </nav>
                <?php foreach ($NGOList as $ngo) { ?>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <a href='showNgo.php?id=<?php print($ngo['NGOUniqueID']); ?>'><?php print($ngo['NGOName']);?></a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img width="100" height="100" src="img/logo.jpg">
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <ul class="list-unstyled list-inline text-right">
                                                <span class="glyphicon glyphicon-globe"></span><li value="<?php print($ngo['NGOPurpose']);?>"><?php print($ngo['NGOPurpose']);?></li>
                                                <span class="glyphicon glyphicon-map-marker"></span> <li value="<?php print($ngo['NGOLocation']);?>"><?php print($ngo['NGOLocation']);?></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-2">
                                            <a class="btn btn-primary" href="donation.php">Donate</a>
                                        </div>
                                    </div>
                                    <h5>About NGO</h5>
                                    <p class="text-justify"><?php print($ngo['NGOdescription']);?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php include('footer.php')?>