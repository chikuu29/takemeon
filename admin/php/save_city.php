<?php
include_once 'config.php';
$country_name = mysqli_real_escape_string($con,$_POST['country_name']);
$state_name=mysqli_real_escape_string($con,$_POST['state_name']);
$city_name=strtoupper(mysqli_real_escape_string($con,$_POST['city_name']));
$city_short_desc = mysqli_real_escape_string($con,$_POST['city_short_desc']);
$city_long_desc = mysqli_real_escape_string($con,$_POST['city_long_desc']);
$city_location = mysqli_real_escape_string($con,$_POST['city_location']);
$admin_id = mysqli_real_escape_string($con,$_POST['user_id']);
$slug=strtolower($city_name);

if(!empty($country_name)  && !empty($city_name) && !empty($state_name) && !empty($city_short_desc)  && !empty($city_location)){
         
          $sql=mysqli_query($con,"SELECT * FROM city WHERE city_name='{$city_name}'");
          if(mysqli_num_rows($sql)>0){
                   echo "City Alrady Exit In Our Database";
                   exit();
          }else{
              
             if(isset($_FILES['city_image'])){
                $img_name=$_FILES['city_image']['name'];
                $img_type=$_FILES['city_image']['type'];
                $img_size=$_FILES['city_image']['size'];
                $img_temp_name=$_FILES['city_image']['tmp_name'];
                if($img_size>10000000){
                    //IF IF FILE SIZE GRETER THAN 50KB
                    echo "please Upload Image Less than 1mb";
                }//IF FILE SIZE IS LESS THAN 50KB
                else{
      
                   $img_expload=explode('.',$img_name);//SEPARATE THE FILE NAME AFTER " . "
                   $img_extension=end($img_expload);//ONLY STORE THE FILE EXTENSION
                   $extension=["pnj","jpg","jpeg"];// OUR REQUERMENT EXTENSTION
                   //CHECK USER INPUT FILE EXTENSION IS MATCH OUR EXETENTION
                   if(in_array($img_extension,$extension)==true){
                         
                      $time=time();
                      $city_image_name=rand(111,999).$time.'.'.$img_extension;
                  
                      
                    
                      if(move_uploaded_file($img_temp_name,"upload/city/".$city_image_name)){
                      
                        $sql="INSERT INTO city (city_name,slug,city_short_desc,city_long_desc,city_location,country_name,state_name,admin_id,city_img)
                        VALUES ('{$city_name}','{$slug}','{$city_short_desc}','{$city_long_desc}','{$city_location}','{$country_name}','{$state_name}','{$admin_id}','{$city_image_name}')";
                        
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
