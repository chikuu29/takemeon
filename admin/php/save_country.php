<?php

include_once 'config.php';
$country_name = strtoupper(mysqli_real_escape_string($con,$_POST['country_name']));
$country_short_desc = mysqli_real_escape_string($con,$_POST['country_short_desc']);
$country_long_desc = mysqli_real_escape_string($con,$_POST['country_long_desc']);
$country_location = mysqli_real_escape_string($con,$_POST['country_location']);
$admin_id = mysqli_real_escape_string($con,$_POST['user_id']);

if(!empty($country_name)  && !empty($country_short_desc)  && !empty($country_location)){
         
          $sql=mysqli_query($con,"SELECT * FROM country WHERE country_name='{$country_name}'");
          if(mysqli_num_rows($sql)>0){
                   echo "Country Alrady Exit In Our Database";
                   exit();
          }else{
              
             if(isset($_FILES['country_image'])){
                $img_name=$_FILES['country_image']['name'];
                $img_type=$_FILES['country_image']['type'];
                $img_size=$_FILES['country_image']['size'];
                $img_temp_name=$_FILES['country_image']['tmp_name'];
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
                      $country_image_name=rand(111,999).$time.'.'.$img_extension;
                  
                      
                    
                      if(move_uploaded_file($img_temp_name,"upload/countries/".$country_image_name)){
                      
                        $sql="INSERT INTO country (country_name,Country_sort_desc,country_long_desc,google_map,admin_id,country_img)
                        VALUES ('{$country_name}','{$country_short_desc}','{$country_long_desc}','{$country_location}','{$admin_id}','{$country_image_name}')";
                        
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