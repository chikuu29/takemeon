<?php

session_start();
include_once '../admin/php/config.php';
require_once('../google-config.php');

if(isset($_GET['code'])){
	$token=$googleClient->fetchAccessTokenWithAuthCode($_GET['code']);
	
	if(!isset($token['error'])){
		
        $googleClient->setAccessToken($token["access_token"]);

        $_SESSION['access_token']=$token["access_token"];
       
        $google_service = new Google_Service_Oauth2($googleClient);
        $data = $google_service->userinfo->get();
          
        $token_id=$data['id'];
        $fname=$data['givenName'];
        $lname=$data['familyName'];
        $email=$data['email'];
        $user_img=$data['picture'];

      
        $sql=mysqli_query($con,"SELECT * FROM google_client WHERE token_no='{$token_id}'");
        if (!mysqli_num_rows($sql)>0) {

                $_SESSION['user_full_name']=$data['name'];
                $_SESSION['user_email']=$email;
                $_SESSION['user_img']=$user_img;
                $_SESSION['user_login']="YES";
                    
 
             $save_google_data_query="INSERT INTO google_client (token_no,fname,lname,email,user_img) VALUES ('{$token_id}','{$fname}','{$lname}','{$email}','{$user_img}')";
                 if(mysqli_query($con,$save_google_data_query)){
                     header('location:../index.php');
                     exit();
                       
                 }else{

                     
                     header('location:../index.php');
                     exit();
                  
                 }



            
        }else{
            $_SESSION['user_full_name']=$data['name'];
            $_SESSION['user_email']=$email;
            $_SESSION['user_img']=$user_img;
            $_SESSION['user_login']="YES";
            header('location:../index.php');
            exit();
        }


	}else{
			header('location:../index.php');
		}

}else{
	header('location:../index.php');
}


?>
