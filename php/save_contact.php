<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
include_once('../admin/php/config.php');
$user_name = mysqli_real_escape_string($con,$_POST['username']);
$user_email= mysqli_real_escape_string($con,$_POST['useremail']);
$user_msg= mysqli_real_escape_string($con,$_POST['subject']);
$user_id= mysqli_real_escape_string($con,$_POST['user_id']);

if(isset($_SESSION['user_login'])){
    
    if(empty($user_msg)){
        echo '{"error":"error","msg":"Please Enter Your Query","title":"Sorry"}';
        

    }else{
    
        $remove[]=";";
        $remove[]='"';
        $remove[]="'";
        $remove[]="~";
        $remove[]="=";
        $remove[]="&&";
        $remove[]="%";
        $remove[]="*";
        $finalstring=str_replace($remove," ",$user_msg);
        $date = date('d/m/Y h:i a', time());
        $query_refernce_no =rand(11,99)*time();
        $savedata="INSERT INTO help (help_reference_no,fname,user_id,email,date,user_msg) VALUES
         ('$query_refernce_no','$user_name','$user_id','$user_email','$date','$user_msg')";
        
         $user_reciept="Query No-".$query_refernce_no." ".$date;
         if(mysqli_query($con,$savedata)){

            $result=array("error"=>"success","title"=>"Thank You!","msg"=>$user_reciept);

            $convert_jsion = json_encode($result);
            echo $convert_jsion;

            // echo '{"error":"success","msg":"","title"="Thank You!"}';

         }else{
            echo '{"error":"error","msg":"Sorry for inconvenience","title":"Sorry!"}';
         }





      
      
      
    }
 
    


}else{
  
    echo "nan";

}





?>