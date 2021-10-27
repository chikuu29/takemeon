<?php

session_start();
// if(!isset($_SESSION['user_email']) && !isset($_SESSION['otp_status'])){
// 	header('location:registation.php');
// }
// if($_SESSION['otp_status']=="Verified"){
// 	header('location:index.php');
// }
if(!isset($_COOKIE['user_temp_email']) && !isset($_COOKIE['otp_status'])){
      
      header('location:index.php');
}


?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="img/urllogo.png" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OTP Validation</title>
	<!-- <link rel="stylesheet" href="css/login-signup.css"> -->
	<!-- font awosome icon javascript -->
	<script src="https://kit.fontawesome.com/267324de9d.js" crossorigin="anonymous"></script>
	<!-- font awosome icon javascript -->
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/registration.css"> -->
	<style type="text/css">
           body{
           	    background: url('img/puri.jpg') no-repeat;
				 background-size: cover;
				

				 overflow:auto;
				 height: 100vh;
				 object-fit:cover;
				 display: flex;
				 justify-content: center;
				 margin: 50px;
				

           }
		.container {

			text-align: center;
			width: 360px;
			height: 300px;
			display: flex;
			margin: auto;


			justify-content: center;
			align-items: center;
		}

		.otp-form {
			border: 2px solid red;
			border-radius: 14px;

			display: flex;
			flex-direction: column;
			padding: 20px;
			min-width: 250px;
			justify-content: center;

			
		}
		.otp-form img{
			filter: brightness(1) invert(1);
			width: 150px;
			text-align: center;

		}

		h1 {
			color: #f1f1f1;
			font-size: 18px;
			padding-bottom: 7px;
			margin-bottom: 10px;
			border-bottom: 1px solid #8888;
			font-style: italic;
		}

		.clm {
			display: flex;
			flex-direction: column;

		}

		input {
			padding: 7px;
			border: none;
			outline: none;
			border-radius: 10px;
			margin-bottom: 20px;

		}

		input[type="number"]:focus {
			box-shadow: 0px 0px 7px red;
		
		}

		
		
	</style>

</head>

<body>
	 <div id="preloader">

    </div>
	<div class="container">
		<form class="otp-form">
			<div style="text-align: center;">
				<img src="img/takemeon.png">
			</div>
			<p style="color: red;" id="resend">OTP send Succesfull</p>
			<h1>Enter Your OTP</h1>
			<div class="clm">
				<input type="number" name="otp" id="user_input" placeholder="Enter OTP">
				
				<button type="button" class="btn btn-success" id="otp-submit-btn">Submit</button>
				<br>
				<button type="button" class="btn btn-danger" id="resend-otp-btn">Resend OTP</button>
				
			</div>
		</form>

	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript">
    
       
        $(window).on('load',function(){
			$('#preloader').hide();
		})

   $(document).ready(function(){
   	$('#otp-submit-btn').on('click',function() {
            var input=$('#user_input').val();
           $.ajax({
                url:'php/otp-validation.php',
                type:"POST",
                data:{input:input},
                success:function (data) {
                	if(data=="DONE"){

                		 swal({
                                                  title: "Good Job!",
                                                  text: "Congratulation Your Account Is Know Verified",
                                                  icon: "success",
                                                
                                                  buttons: true,
                                                  dangerMode: true,

                                                })
                                       .then((go) => {

                                                  if (go) {

                                                    location.href="index.php";

                                                  } else {

                                                     location.href="index.php";
                                                  }
                                            });







                     
                       




                	}else{

                            swal({
                                   
                                    title: "Sorry",
                                    text: data,
                                    icon: "error",          

                                     });





                		
                	}
                }

 
           });
   		
   	});
   });
</script>

</body>

</html>