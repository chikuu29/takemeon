<?php

include_once 'config.php';
$country_name = mysqli_real_escape_string($con,$_POST['country_name']);
$state_name = strtoupper(mysqli_real_escape_string($con,$_POST['state_name']));
$slug_name = strtolower($state_name);
$state_short_desc = mysqli_real_escape_string($con,$_POST['state_short_desc']);
$state_long_desc = mysqli_real_escape_string($con,$_POST['state_long_desc']);
$state_location = mysqli_real_escape_string($con,$_POST['state_location']);
$admin_id = mysqli_real_escape_string($con,$_POST['user_id']);

if(!empty($country_name) && !empty($state_name) && !empty($state_short_desc)  && !empty($state_location)){
         
          $sql=mysqli_query($con,"SELECT * FROM state WHERE state_name='{$state_name}'");
          if(mysqli_num_rows($sql)>0){
                   echo "State Alrady Exit In Our Database";
                   exit();
          }else{
              
             if(isset($_FILES['state_image'])){
                $img_name=$_FILES['state_image']['name'];
                $img_type=$_FILES['state_image']['type'];
                $img_size=$_FILES['state_image']['size'];
                $img_temp_name=$_FILES['state_image']['tmp_name'];
                if($img_size>10000000){
                    //IF IF FILE SIZE GRETER THAN 50KB
                    echo "please Upload Image Less than 5mb";
                }//IF FILE SIZE IS LESS THAN 50KB
                else{
      
                   $img_expload=explode('.',$img_name);//SEPARATE THE FILE NAME AFTER " . "
                   $img_extension=end($img_expload);//ONLY STORE THE FILE EXTENSION
                   $extension=["pnj","jpg","jpeg"];// OUR REQUERMENT EXTENSTION
                   //CHECK USER INPUT FILE EXTENSION IS MATCH OUR EXETENTION
                   if(in_array($img_extension,$extension)==true){
                         
                      $time=time();
                      $state_image_name=rand(111,999).$time.'.'.$img_extension;
                
                      
                    
                      if(move_uploaded_file($img_temp_name,"upload/state/".$state_image_name)){
                      
                        $sql="INSERT INTO state (state_name,slug_name,state_short_desc,state_long_desc,	state_location,	country_name,admin_user_id,state_img)
                        VALUES ('{$state_name}','{$slug_name}','{$state_short_desc}','{$state_long_desc}','{$state_location}','{$country_name}',{$admin_id},'{$state_image_name}')";
                        
                         if(mysqli_query($con,$sql)){
                             echo "DONE";
                         }else{
                             echo "query Failed";
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





          

 }else{
    
    echo "Plase field all the Input";
    

}

?>
