<?php
session_start();
include_once '../admin/php/config.php';
$input_value=mysqli_real_escape_string($con,$_POST['input']);


if (!empty($input_value)) {

	$email=$_COOKIE['user_temp_email'];

        $sql="SELECT * FROM users WHERE email='{$email}'";

        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
             
            $fetch_result=mysqli_fetch_assoc($result);

            if($fetch_result['otp']==$input_value && $fetch_result['status']=="unverified"){

                $update_sql="UPDATE users SET otp=0,status='Verified' WHERE email='{$email}'";

                if (mysqli_query($con,$update_sql)) {
                    
                    $_SESSION['otp_status']="Verified";
                     setcookie("user_temp_email","",30,"/");
                     setcookie("otp_status","",30,"/");

                      echo "DONE";

                }else{

                    echo "Please Try After Some Time";
                }

            }else{

                echo "Your OTP Is Incorect";
            }
             
        
        
        }else{

            echo "Your OTP Not Set";
        }
    
	
}else{

	echo "Please Enter The OTP";
}








?>