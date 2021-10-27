<?php
date_default_timezone_set('Asia/Kolkata');
   session_start();
   include_once '../admin/php/config.php';
   include_once '../admin/php/sendemail.php';
   $email=$_SESSION['recovery_email'];
   if(isset($_POST['rpswotp'])){
     
      if(is_numeric($_POST['rpswotp'])){
       
         $otp=mysqli_real_escape_string($con,$_POST['rpswotp']);
         $get_otp_result=mysqli_query($con,"SELECT * FROM users WHERE email='{$email}'");
         $fetch_result=mysqli_fetch_assoc($get_otp_result);
         if($otp==$fetch_result['otp']){

            mysqli_query($con,"UPDATE users SET otp=0 WHERE email='{$email}'");

           
            echo '{"error":"success","msg":"Your OTP is now Veryfy","title":"Look Good!"}';

         }else{
            echo '{"error":"error","msg":"Incorrect OTP","title":"Invalid!"}';
         }
      
      }
   }

   if(isset($_POST['pswchange'])){

      $psw=mysqli_real_escape_string($con,$_POST['pswchange']);
      $hash_psw = password_hash($psw, PASSWORD_BCRYPT);
      $date = date('d/m/Y h:i a', time());
      if(mysqli_query($con,"UPDATE users SET password='{$hash_psw}' WHERE email='{$email}'")){

         
         $head = "Password Change Conformation";
         $body = '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
                                 <div style="margin:50px auto;width:70%;padding:20px 0">
                                     <div style="border-bottom:1px solid #eee;text-align: center;">
                                         <img src="https://takemeon.in/img/glogo.png" alt="Takemeon" style="width: 150px;">
                                     </div>';
         $body .=
             '<p style="font-size:1.1em">Hi,' .
             '</p>
                                     <p>Thank you for joining Us</p>
                                     <p>Your Password Succesfully Change on '.$date.'</p>
                                     <a href="https://takemeon.in">Login Now</a> ';
         $body .=
             '<h2
                                         style="background: #527b8f;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">
                                         '.
             '</h2>
                                     <p style="font-size:0.9em;">Regards,<br />Takemeon</p>
                                     <hr style="border:none;border-top:1px solid #eee" />
                                     <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
                                         <p>Takemeon</p>
                                         <p>India</p>
                                     </div>
                                 </div>
                             </div>';
                  send_email($email, $head, $body);

                  echo '{"error":"success","msg":"Congratulation Your Password Successfully change","title":"Great!"}';

      }else{
         echo '{"error":"error","msg":"Please Try after some time","title":"Sory!"}';
      }





   }
   




?>