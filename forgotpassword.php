<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

</head>

<body>
    <div class="container" id="before_veryfied">
        <p class="h1 text-center" style="font-family: sans-serif;">Forgot Password</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" name="recoveryemail" placeholder="Enter email" autocomplete="on">
                <small id="emailHelp" class="form-text text-muted">Enter Your Register Email Id</small>
            </div>
            <button type="submit" name="psw-recovery-btn" class="btn btn-primary mt-2">Recovery Password</button>

        </form>

    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <div class="container" id="after_veryfied">
        <p class="h1 text-center" style="font-family: sans-serif;">Enter Your Password</p>

        <form id="change_psw_form">

            <div class="form-group">

                <input type="password" class="form-control mb-3" id="psw" aria-describedby="emailHelp" name="recoveryemail" placeholder="New Password">
                <input type="text" class="form-control" id="cpsw" aria-describedby="emailHelp" name="recoveryemail" placeholder="Conform Password">

            </div>
            <button type="button" id="change_psw" class="btn btn-primary mt-2">Change Password</button>

        </form>

    </div>
    <script>
        $(document).ready(function() {

            $('#after_veryfied').hide();

        })
    </script>

    <?php

    if (isset($_POST['psw-recovery-btn'])) {

        include_once 'admin/php/config.php';
        $user_recovery_email = mysqli_real_escape_string($con, $_POST['recoveryemail']);

        if (!empty($user_recovery_email)) {

            $sql = mysqli_query($con, "SELECT * FROM users WHERE email='{$user_recovery_email}'");

            if (mysqli_num_rows($sql) >= 1) {

                $username = mysqli_fetch_assoc($sql);

                include 'admin/php/sendemail.php';
                $otp = rand(11111, 999999);

                $head = "Recovery Password OTP";
                $body = '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
                                        <div style="margin:50px auto;width:70%;padding:20px 0">
                                            <div style="border-bottom:1px solid #eee;text-align: center;">
                                                <img src="https://takemeon.in/img/glogo.png" alt="Takemeon" style="width: 150px;">
                                            </div>';
                $body .=
                    '<p style="font-size:1.1em">Hi,' .
                    '</p>
                                            <p>Thank you for still joining Us. Use the following OTP to complete your Recovery Password procedures.</p>';
                $body .=
                    '<h2
                                                style="background: #527b8f;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">
                                                ' .
                    $otp .
                    '</h2>
                                            <p style="font-size:0.9em;">Regards,<br />Takemeon</p>
                                            <hr style="border:none;border-top:1px solid #eee" />
                                            <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
                                                <p>Takemeon</p>
                                                <p>India</p>
                                            </div>
                                        </div>
                                    </div>';

                mysqli_query($con, "UPDATE users SET otp={$otp} WHERE email='{$user_recovery_email}'");

                if (send_email($user_recovery_email, $head, $body)) {
                    session_start();

                    $_SESSION['recovery_email'] = $user_recovery_email;


    ?>
                    <script>
                        function otp_validation() {

                            swal("We send OTP To your email:", {

                                    content: "input",

                                    button: {
                                        text: "submit",

                                    },


                                })
                                .then((value) => {

                                    if (!value) {
                                        swal({
                                            title: "Sorry!",
                                            text: "Field should not be empty",
                                            icon: "error",

                                        }).then((okfine) => {

                                            if (okfine) {
                                                otp_validation();

                                            } else {
                                                otp_validation();

                                            }



                                        });

                                    } else {

                                        $.ajax({
                                            url: 'php/forgot-psw.php',
                                            type: 'POST',
                                            data: {
                                                rpswotp: value
                                            },
                                            success: function(data) {

                                                const obj = JSON.parse(data);
                                                if (obj.error == "success") {

                                                    swal({
                                                        title: obj.title,
                                                        text: obj.msg,
                                                        icon: obj.error,

                                                    }).then((done) => {
                                                        if (done) {

                                                            $('#before_veryfied').hide();
                                                            $('#after_veryfied').show();

                                                        }

                                                    });


                                                } else {
                                                    swal({
                                                        title: obj.title,
                                                        text: obj.msg,
                                                        icon: obj.error,

                                                    }).then((ok) => {
                                                        if (ok) {
                                                            otp_validation();

                                                        } else {
                                                            otp_validation();

                                                        }

                                                    });



                                                }




                                            }


                                        })



                                    }





                                });

                        }
                        otp_validation();
                    </script>



    <?php


                } else {
                    echo '
                                        <script>
                                        
                                        swal({
                                            title: "Sorry!",
                                            text: "Please Try after some time we are facing some problem ",
                                            icon: "error",
                                          });    
                                        </script>';
                }
            } else {

                echo '
            <script>
            
            swal({
                title: "Sorry!",
                text: "Your Email not register in our database!",
                icon: "warning",
              });    
            </script>';
            }
        } else {

            echo '
        <script>
        
        swal({
            title: "Sorry!",
            text: "Please Enter Your Email!",
            icon: "warning",
          });    
        </script>';
        }
    }




    ?>

    <script>
        $(document).ready(function() {
            $('#change_psw').on('click', function() {
                var psw = $('#psw').val();
                var cpsw = $('#cpsw').val();



                if (psw != "" && cpsw != "") {
                    if (psw == cpsw) {

                        $.ajax({
                            url: 'php/forgot-psw.php',
                            type: 'POST',
                            data: {
                                pswchange: psw
                            },
                            success: function(data) {
                                const obj = JSON.parse(data);
                                if (obj.error == "success") {

                                    swal({
                                        title: obj.title,
                                        text: obj.msg,
                                        icon: obj.error,

                                    }).then((done) => {
                                        if (done) {

                                            location.href = "index.php";

                                        }

                                    });


                                } else {
                                    swal({
                                        title: obj.title,
                                        text: obj.msg,
                                        icon: obj.error,

                                    });

                                }

                            }

                        })



                    } else {
                        swal({
                            title: "Mismatch!",
                            text: "Please Check Password",
                            icon: "warning",
                        });

                    }

                } else {
                    swal({
                        title: "Sorry",
                        text: "Input field Should not be Empty",
                        icon: "warning",
                    });

                }



            });

        });
    </script>


</body>

</html>