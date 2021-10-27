<?php

use function Composer\Autoload\includeFile;
session_start();
include_once 'config.php';
include_once ('sendemail.php');
// fISRT WE RECIEVED ALL USER INPUT VALUE EXCEPT FILE
$fname=strtoupper(mysqli_real_escape_string($con,$_POST['fname']));
$lname=strtoupper(mysqli_real_escape_string($con,$_POST['lname']));
$email=mysqli_real_escape_string($con,$_POST['email']);
$passwprd=mysqli_real_escape_string($con,$_POST['psw']);

// HEAR WE CHECK ANY EMPTY VALUE IN USER INPUT 
if(!empty($fname) && !empty($lname) && !empty($email) && !empty($passwprd)){
//    IF ANY VALUE IS NOT EMPTY
// THEN CHECK USER EMAIL IS RIGHT OR NOT
   if(filter_var($email,FILTER_VALIDATE_EMAIL)){
    //    IF EMIL VALUE IS RIGHT
    // CHECK THE EMAIL IS ALRADY EXIT OR NOT
    $sqli_query_for_user_check=mysqli_query($con,"SELECT * FROM admin WHERE email='{$email}'");
 
    if(mysqli_num_rows($sqli_query_for_user_check)>0){

         
      
           echo $email."-Alrady Someone Save In Our Database";
        }
    // IF USER NOT EXIT THEN EXECUTE THIS ELSE PART
       else{
          
        if(isset($_FILES['image'])){
            //HEAR WE GET ALL THE FILE INFORMATION
            $img_name=$_FILES['image']['name'];
            $img_type=$_FILES['image']['type'];
            $img_size=$_FILES['image']['size'];
            $img_temp_name=$_FILES['image']['tmp_name'];
            //IF FILE SIZE LESS THAN 50KB
          if($img_size>100000){
              //IF IF FILE SIZE GRETER THAN 50KB
              echo "please Upload Image Less than 50kb";
          }//IF FILE SIZE IS LESS THAN 50KB
          else{

             $img_expload=explode('.',$img_name);//SEPARATE THE FILE NAME AFTER " . "
             $img_extension=end($img_expload);//ONLY STORE THE FILE EXTENSION
             $extension=["pnj","jpg","jpeg"];// OUR REQUERMENT EXTENSTION
             //CHECK USER INPUT FILE EXTENSION IS MATCH OUR EXETENTION
             if(in_array($img_extension,$extension)==true){
                   
                $time=time();
                $new_image_name=rand(111,999).$time.'.'.$img_extension;
              
                if(move_uploaded_file($img_temp_name,"upload/admin/".$new_image_name)){

                    $user_id=rand(11,99).$time;
                    $type='subadmin';
                     $otp=rand(111111,999999);
                    $status="unverified";
                    $hasg_password=password_hash($passwprd,PASSWORD_BCRYPT);
                   
                    $head="Takemeon OTP Verification";
                    $body ="<h3 style='text-align:center;'>Thank You For Join Us<h3>";
                    $body .="<P>Hello"." ".$fname."</P>";
                    $body .="Your One Time OTP Is"." "."<span style='color:red;'>$otp</span>";
                     
                    $sql="INSERT INTO admin (user_id,type,fname,lname,email,admin_psw,otp,admin_img,status)
                    VALUES ('{$user_id}','{$type}','{$fname}','{$lname}','{$email}','{$hasg_password}',{$otp},'{$new_image_name}','{$status}')";
                
                    //  if($otp_check==1){
                    if(mysqli_query($con,$sql)){

                       if(send_email($email,$head,$body)){
                        $_SESSION['otp']=$otp;
                        $_SESSION['status']=$status;
                        $_SESSION['email']=$email;
                        echo "DONE";
                        exit();
                       }else{
                           echo "Failed while sending code!";

                       }
                       
                    }else{
                         echo "We Are Not Able To Connect";
                     }
                   





                }else{
                    echo "Please Try After Sometime Other wise Contact Admin";
                }
            
             }//IF USER FILE NOT MATCH IN OUR EXTENSION
             else{
                 echo 'please Upload Only pnj,jpg,JPEG';
             }
          }
           

        }

       }

   }// IF USER EMAIL IS NOT RIGHT
   else{
       echo "Please Enter Valide Email-id";
   }


}//    IF ANY INPUT VALUE IS  EMPTY
else{

    echo "Please Fill all the input field";
}
