<?php
session_start();
include_once('config.php');
$email=mysqli_real_escape_string($con,$_POST['email']);
$pasw=mysqli_real_escape_string($con,$_POST['psw']);

if(!empty($email) && !empty($pasw)){

    if(filter_var($email,FILTER_VALIDATE_EMAIL)){

        if (preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $email) ){

            
               echo "Don't Right Any Special Charactor Except-@,.";
               
            }else{
               
                $sql ="SELECT * FROM admin WHERE email='{$email}'";
                $result=mysqli_query($con,$sql);

                if(mysqli_num_rows($result)>0){

                    $row=mysqli_fetch_assoc($result);

                    if($row['otp']==0){

                        $get_psw=$row['admin_psw'];

                        if(password_verify($pasw,$get_psw)){

                            $_SESSION['password']=$row['admin_psw'];
                            $_SESSION['admin_user_id']=$row['user_id'];
                            $_SESSION['user_name']=$row['fname'];
                            $_SESSION['fullname']=$row['fname']." ".$row['lname'];
                            $_SESSION['img']=$row['admin_img'];
                            $_SESSION['type']=$row['type'];
                           
                            if(isset($_POST['remember'])){

                                 setcookie("admin_email",$email,time()+86400,"/");
                                 setcookie("admin_psw",$pasw,time()+86400,"/");

                            }else{

                                 setcookie("admin_email",$email,30,"/");
                                 setcookie("admin_psw",$pasw,30,"/");

                            }

                            echo "DONE";
                            exit();

                        }else{
                            echo "incorrect Password";
                        }

                    }else{
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