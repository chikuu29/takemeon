<?php

session_start();
require_once('google-config.php');


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="img/urllogo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registation</title>
    <!-- <link rel="stylesheet" href="css/login-signup.css"> -->
    <!-- font awosome icon javascript -->
    <script src="https://kit.fontawesome.com/267324de9d.js" crossorigin="anonymous"></script>
    <!-- font awosome icon javascript -->
    
    <link rel="stylesheet" href="css/responsive-login.css">
    <link rel="stylesheet" href="css/registration.css">
</head>

<body>
    <div id="preloader">

    </div>

    <div id="please-wait">

    </div>

    <!-- registation html code start hear-->
    <div class="registration" id="sighup">
        <div class="registation-form">
            <form action="" class="form-content" id="new_user_form">

                <div class="registration-msg">
                    <img src="img/takemeon.png" alt="">
                    <h1>Create Account</h1>
                    <!-- <span id="registration-alert" style="color:black;font-size: 18px;"></span> -->

                </div>
                <div class="social-login">
                    <a href="#" class="btn-face ">
                        <i class="fab fa-facebook-square"></i>
                        Facebook
                    </a>
                    <a href="#" class="btn-google " onclick="window.location='<?php echo $login_url;?>'">
                        <img src="img/icon-google.png" alt="GOOGLE">
                        Google
                    </a>
                </div>

                <div class="par-msg">
                    <p>Or Use Your Email Account</p>
                </div>
                <div class="r-input-field">
                    <div class="name-holder">
                            <div class="input-field">
                                <label for="fname">First Name</label>
                                <input  type="text" name="fname" placeholder="Fast Name" required >
                            </div>
                            <div class="input-field">
                                <label for="lname">First Name</label>
                                <input  type="text" name="lname" placeholder="Last Name">
                            </div>
                     
                    </div>
                    <div class="email">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Email">
                    </div>
                    <div class="password">
                        <label for="Password">Password</label>
                        <input type="password" name="psw" placeholder="Password" autocomplete>
                    </div>
                    <div class="send-otp">
                        <button type="button" id="registration_btn_submit">Send OTP</button>
                    </div>
                    <div class="send-otp">
                        <button type="button" style="margin-top: 10px;"><a href="index.php">Already Have Account</a></button>
                    </div>
                </div>
            </form>
        </div>
    </div>


 <!-- preloader script -->
 <script>
    var ploader = document.getElementById("preloader");
   

    window.addEventListener('load', function () {

   setTimeout(function(){
    ploader.style.display = "none";


   },3000);
       
  

     

    })

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       
       $('#registration_btn_submit').on('click',function(){
                 $('#please-wait').show();
                 var registrationform=document.getElementById('new_user_form');
                 var formdata=new FormData(registrationform);
                 $.ajax({
                     url:"php/save-user-data.php",
                     type:"POST",
                     data:formdata,
                     contentType:false,
                     processData:false,
                     success:function(data){

                        if (data=="DONE") {

                            $('#please-wait').hide();

                             swal({
                                                  title: "Great",
                                                  text: "We Send OTP To Your Email Plase Check Your Spam/inbox Folder",
                                                  icon: "success",
                                                  buttons: true,
                                                  dangerMode: true,

                                                })
                                       .then((go) => {

                                                  if (go) {

                                                    location.href="otp-verification.php";


                                                  } else {

                                                     location.href="index.php";
                                                  }
                                            });









                        }else{

                            $('#please-wait').hide();
                            swal({

                                  title: "Error",
                                  text: data,
                                  icon: "warning",

                                });

                            // $('#registration-alert').html(data);
                        }
                     }
                 });
       });
      

    });
</script>








</body>

</html>