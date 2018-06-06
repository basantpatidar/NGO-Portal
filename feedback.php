<?php
include('header.php');
?>
<section class="feedback-form">
    <div class="container all-feedback">
        <div class="row">
            <h2>We're happy to hear from you</h2>
        </div>
        <div class="row">
            <form class="form-group" action="model/feedbackModel.php" method="post" >
                <div class="form-group">
                    <input type="text" class="form-control name" name="fname" placeholder="First Name" required>
                    <input type="text" class="form-control name" name="lname" placeholder="Last Name" required>
                    <input type="tel" class="form-control name" name="phone" placeholder="Phone Number" required>
                    <input type="text" class="form-control email" name="email" placeholder="Email Address" required>
                    <textarea rows="4" cols="50" class="form-control message" name="feedback" placeholder="Enter your Feedback" required></textarea>
                    <input type="submit" name="submit" class="btn btn-feedback" value="submit">
                </div>

            </form>
        </div>
    </div>
</section>

<?php include('footer.php')?>
