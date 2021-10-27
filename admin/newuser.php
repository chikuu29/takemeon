<?php include 'header.php' ?>

<div id="mySidenav" class="sidenav" style="display: block;">
    <div class="logo"> <img src="img/glogo.png" alt="takemeon"></div>
    <a href="dash.php" class="icon-a"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard</a>
    <a href="newuser.php" class="icon-a active"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;New Admin User</a>
    <a href="add-post.php" class="icon-a"><i class="fas fa-place-of-worship"></i>&nbsp;&nbsp;Add Place</a>
    <a href="post.php" class="icon-a"><i class="fas fa-rss-square"></i>&nbsp;&nbsp;All Post</a>
    <a href="user.php" class="icon-a"><i class="fas fa-users"></i>&nbsp;&nbsp;All Users</a>
</div>
<?php include 'sidenav.php' ?>

<?php
if ($_SESSION['type'] == 'admin') {
?>

    <div class="container">
        <div class="Headder-text m-5 text-center">Add New Admin User</div>
        <div class="col-md-offset-3 col-md-6 m-auto">
            <form id="admin-user-form" autocomplete="off">

                <div class="form-group mb-2">
                    <label>First Name</label>
                    <input type="text" class="form-control " name="fname" placeholder="Enter First Name" required>
                </div>

                <div class="form-group mb-2">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" required>
                </div>

                <div class="form-group mb-2">
                    <label>Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email" required>
                </div>

                <div class="form-group mb-2">
                    <label>Password</label>
                    <input type="password" class="form-control" name="psw" placeholder="Enter Password" required>
                </div>

                <div class="form-group mb-2">
                    <label>Please Upload Photo</label>
                    <input class="form-control" type="file" name="image" id="formFile">
                    <div id="emailHelp" class="form-text">less than 100kb</div>
                </div>

                <button type="button" class="btn btn-primary" id="save-admin-btn">Submit</button>
                <button type="reset" class="btn btn-warning">Reset</button>

            </form>
        </div>
        <hr>

    </div>



<?php

} else {
?>
   <div class="container text-center">
       <img src="img/access _denied.png" class="fs-1 " alt="">
       <h1>Opps!, Sorry You don't Have Permission</h1>
       <p>Please Contact The Admin</p>
   </div>


<?php
}

?>

<!-- model dialog -bbox -->
<div class="modal fade" id="admin_alert_model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="staticBackdropLabel">HYY <?php echo strtoupper($_SESSION['fullname']); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark text-center" id="admin_alert-msg">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<!-- TAKE OTO MODEL --->
<div class="modal fade" id="enter_otp_model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="staticBackdropLabel">Please Check Spam/email For otp</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="otp-form">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-dark">Enter OTP</label>
                        <input type="text" class="form-control" name="otp" id="otp-input" aria-describedby="emailHelp" placeholder="Enter OTP">

                    </div>
                    <button type="button" class="btn btn-warning" id="user-otp-submit">Submit</button>
                    <span class="alert-warning" id="post_alert"></span>
                </form>
            </div>

        </div>
    </div>
</div>



<?php include 'script.php' ?>
<script type="text/javascript">
    // preloder
    $(window).on('load', function() {
        $('#fetch-animation').hide();
    })
    $(document).ready(function() {

        $('.logout').on('click', function() {
            $('#staticBackdrop').modal('show');
        });

        //add admin database
        $('#save-admin-btn').on('click', function() {

            var admin_user_form = document.getElementById('admin-user-form');
            var formdata = new FormData(admin_user_form);
            $.ajax({
                url: "php/signup.php",
                type: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == "DONE") {
                        $('#enter_otp_model').modal('show');

                    } else {
                        $('#admin_alert-msg').html(data);
                        $('#admin_alert_model').modal('show');
                    }



                }
            });

        });
        //save user value value to the database
        $('#user-otp-submit').on('click', function() {
            var otp_form = document.getElementById('otp-form');
            var formdata = new FormData(otp_form);
            $.ajax({
                url: "php/otp-validation.php",
                type: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == "DONE") {

                        $('#admin_alert-msg').html("Congratulation User Is Now Verified");
                        $('#enter_otp_model').modal('hide');
                        $('#admin_alert_model').modal('show');
                        $('#admin-user-form')[0].reset();

                    } else {
                        $('#post_alert').html(data);
                    }

                }
            });
        });

    });
</script>
</body>

</html>