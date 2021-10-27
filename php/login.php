<?php
session_start();
include_once('../admin/php/config.php');
$email=mysqli_real_escape_string($con,$_POST['username']);
$pasw=mysqli_real_escape_string($con,$_POST['password']);


 if(!empty($email) && !empty($pasw)){

    if(filter_var($email,FILTER_VALIDATE_EMAIL)){

         if (preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $email) )
            {
               echo "Don't Right Any Special Charactor Except-@,.";

            }else{
               
                $sql ="SELECT * FROM users WHERE email='{$email}'";
                $result=mysqli_query($con,$sql);

                if(mysqli_num_rows($result)>0){

                    $row=mysqli_fetch_assoc($result);

                    if($row['otp']==0){

                        $get_psw=$row['password'];

                        if(password_verify($pasw,$get_psw)){

                            $_SESSION['user_id']=$row['unique_id'];
                            $_SESSION['user_email']=$email;
                            $_SESSION['user_name']=$row['fname'];
                            $_SESSION['user_full_name']=$row['fname']." ".$row['lname'];
                            // $_SESSION['otp_status']="Verified";
                            $_SESSION['user_login']="YES";
                  
                            if(isset($_POST['remember'])){

                            setcookie("user_email",$email,time()+86400,"/");
                            setcookie("user_psw",$pasw,time()+86400,"/");

                            }else{

                                 setcookie("user_email","",30,"/");
                                 setcookie("user_psw","",30,"/");

                            }

                            echo "DONE";
                            
                            exit();

                        }else{
                            echo "incorrect Password";
                        }

                    }else{


                        setcookie("otp_status","unverified",time()+3600,"/");
                        setcookie("user_temp_email",$email,time()+3600,"/");

                    
                        echo "Your Email-id OTP Not Verified";
                        
                    }
                   
                }else{
                    echo "Your Email & Password Not Verified Contact the Admin";
                }

            }

     }else{
         echo "Please Enter Correct Email-id";
     }


 }else{
     echo "Fill the all input";
    
 } 







?>