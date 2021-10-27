<?php
session_start();
include_once('config.php');

$user_otp_input=mysqli_real_escape_string($con,$_POST['otp']);


if(!empty($user_otp_input)){
    
       
        $email=$_SESSION['email'];
        $sql="SELECT * FROM admin WHERE email='{$email}'";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
             
            $fetch_result=mysqli_fetch_assoc($result);
            if($fetch_result['otp']==$user_otp_input && $fetch_result['status']=="unverified"){
                $update_sql="UPDATE admin SET otp=0,status='Verified' WHERE email='{$email}'";
                if (mysqli_query($con,$update_sql)) {
                    echo "DONE";
                    
                 
                }else{
                    echo "please Try After Some Time";
                }
            }else{
                echo "You OTP Is Incorect";
            }
             
        
        
        }else{
            echo "Your OTP Not Set";
        }
    
   
    
}else{

    echo "Please Enter Your OTP";
}
