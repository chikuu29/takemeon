<?php

include_once 'config.php';
date_default_timezone_set('Asia/Kolkata');
$country_name = mysqli_real_escape_string($con, $_POST['country_name']);
$state_name = mysqli_real_escape_string($con, $_POST['state_name']);
$city_name = mysqli_real_escape_string($con, $_POST['city_name']);
$place_seo_url = mysqli_real_escape_string($con, $_POST['place_seo_url']);
$place_short_desc = mysqli_real_escape_string($con,$_POST['place_short_desc']);
$place_name = ucfirst(strtolower(mysqli_real_escape_string($con, $_POST['place_name'])));
$place_content = mysqli_real_escape_string($con, $_POST['place_content']);
$place_location = mysqli_real_escape_string($con, $_POST['place_location']);
$user_id = mysqli_real_escape_string($con, $_POST['user_id']);
$place_id = mysqli_real_escape_string($con, $_POST['place_id']);
$place_img = mysqli_real_escape_string($con, $_POST['place_img']);
// require 'slug.php';
// $seo_taitel = slugify($post_name);
$date = date('d-m-Y');
if ($_FILES['place_img']['name'] !== "") {

    $img_name = $_FILES['place_img']['name'];
    $img_type = $_FILES['place_img']['type'];
    $img_size = $_FILES['place_img']['size'];
    $img_temp_name = $_FILES['place_img']['tmp_name'];

    if ($img_size > 50000) {

        echo "Please upload less than 5kb";

    } else {

        $img_expload = explode('.', $img_name);
        $img_extension = end($img_expload);
        $extension = ["png", "jpg", "jpeg"];

        if (in_array($img_extension, $extension) == true) {

            if (move_uploaded_file($img_temp_name, "upload/atraction/" . $place_img)) {

                $update = "UPDATE post SET post_slug='{$place_seo_url}',post_name='{$place_name}',short_desc='{$place_short_desc}',	post_content='{$place_content}',google_location='{$place_location}',admin_id='{$user_id}',
                post_date='{$date}' WHERE post_id='{$place_id}'";

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

    $update = "UPDATE post SET post_slug='{$place_seo_url}',post_name='{$place_name}',short_desc='{$place_short_desc}',	post_content='{$place_content}',google_location='{$place_location}',admin_id='{$user_id}',
              	post_date='{$date}' WHERE post_id='{$place_id}'";

    if (mysqli_query($con, $update)) {

        echo "DONE";
    } else {
        echo "Please Try After Some Time";
    }
}
