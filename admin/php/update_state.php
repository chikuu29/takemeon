<?php

include_once 'config.php';
date_default_timezone_set('Asia/Kolkata');

$country_name = mysqli_real_escape_string($con, $_POST['country_name']);
$state_name = mysqli_real_escape_string($con, $_POST['state_name']);
$state_short_desc = mysqli_real_escape_string($con, $_POST['state_short_desc']);
$state_long_desc = mysqli_real_escape_string($con, $_POST['state_long_desc']);
$user_id = mysqli_real_escape_string($con, $_POST['userid']);
$state_id = mysqli_real_escape_string($con, $_POST['state_id']);
$image_name = mysqli_real_escape_string($con, $_POST['state_name']);
$state_map = mysqli_real_escape_string($con,$_POST['state_map']);

$date = date('d-m-Y');
if ($_FILES['state_image']['name'] !== "") {

    $img_name = $_FILES['state_image']['name'];
    $img_type = $_FILES['state_image']['type'];
    $img_size = $_FILES['state_image']['size'];
    $img_temp_name = $_FILES['state_image']['tmp_name'];

    if ($img_size > 5000000) {

        echo "Please upload less than 5mb";
    } else {
        $img_expload = explode('.', $img_name);
        $img_extension = end($img_expload);
        $extension = ["png", "jpg", "jpeg"];

        if (in_array($img_extension, $extension) == true) {

            if (move_uploaded_file($img_temp_name, "upload/state/" . $image_name)) {
               
                $update = "UPDATE state SET state_short_desc='{$state_short_desc}',state_long_desc='{$state_long_desc}',
                admin_user_id='{$user_id}',state_location='{$state_map}',admin_user_id='{$user_id}',state_img='{$image_name}' WHERE state_id='{$state_id}'";

                if (mysqli_query($con, $update)) {

                    echo "DONE";
                } else {
                    echo "Please Try After Some Time";
                }
            }
        } else {
            echo "please Upload Only png,jpg,JPEG";
        }
    }
} else {

    $update = "UPDATE state SET state_short_desc='{$state_short_desc}',state_long_desc='{$state_long_desc}',
    admin_user_id='{$user_id}',state_location='{$state_map}' WHERE state_id='{$state_id}'";

    if (mysqli_query($con, $update)) {

        echo "DONE";
    } else {
        echo "Please Try After Some Time";
    }
}
