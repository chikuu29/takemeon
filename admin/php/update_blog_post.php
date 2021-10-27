<?php

include_once 'config.php';
date_default_timezone_set('Asia/Kolkata');
$country_name = mysqli_real_escape_string($con, $_POST['country_name']);
$state_name = mysqli_real_escape_string($con, $_POST['state_name']);
$city_name = mysqli_real_escape_string($con, $_POST['city_name']);
$post_seo_name = mysqli_real_escape_string($con, $_POST['post_seo_name']);
$post_seo_desc = mysqli_real_escape_string($con,$_POST['post_seo_desc']);
$post_name = ucfirst(strtolower(mysqli_real_escape_string($con, $_POST['post_name'])));
$post_short_desc = mysqli_real_escape_string($con, $_POST['post_short_desc']);
$post_long_desc = mysqli_real_escape_string($con, $_POST['post_long_desc']);
$user_id = mysqli_real_escape_string($con, $_POST['userid']);
$post_id = mysqli_real_escape_string($con, $_POST['post_id']);
$image_name = mysqli_real_escape_string($con, $_POST['img_name']);
// require 'slug.php';
// $seo_taitel = slugify($post_name);
$date = date('d-m-Y');
if ($_FILES['post_image']['name'] !== "") {

    $img_name = $_FILES['post_image']['name'];
    $img_type = $_FILES['post_image']['type'];
    $img_size = $_FILES['post_image']['size'];
    $img_temp_name = $_FILES['post_image']['tmp_name'];

    if ($img_size > 5000000) {

        echo "Please upload less than 5mb";
    } else {
        $img_expload = explode('.', $img_name);
        $img_extension = end($img_expload);
        $extension = ["png", "jpg", "jpeg"];

        if (in_array($img_extension, $extension) == true) {

            if (move_uploaded_file($img_temp_name, "upload/post/" . $image_name)) {

                $update = "UPDATE blog_post SET blog_post_slug='{$post_seo_name}',blog_post_seo_desc='{$post_seo_desc}',blog_post_name='{$post_name}',blog_post_desc='{$post_short_desc}',blog_post_content='{$post_long_desc}',
              	blog_post_date='{$date}'";

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

    $update = "UPDATE blog_post SET blog_post_slug='{$post_seo_name}',blog_post_seo_desc='{$post_seo_desc}',blog_post_name='{$post_name}',blog_post_desc='{$post_short_desc}',blog_post_content='{$post_long_desc}',
    blog_post_date='{$date}' WHERE blog_post_id='{$post_id}'";

    if (mysqli_query($con, $update)) {

        echo "DONE";
    } else {
        echo "Please Try After Some Time";
    }
}
