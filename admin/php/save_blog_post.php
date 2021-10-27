<?php
include_once 'config.php';

$country_name='none';
$state_name ='none';
$city_name ='none';

if (isset($_POST['country_name']) && isset($_POST['state_name']) && isset($_POST['city_name'])) {
    $country_name = mysqli_real_escape_string($con, $_POST['country_name']);
    $state_name = mysqli_real_escape_string($con, $_POST['state_name']);
    $city_name = mysqli_real_escape_string($con, $_POST['city_name']);
}
    
    $post_name = ucfirst(strtolower(mysqli_real_escape_string($con, $_POST['post_name'])));
    $post_seo_desc= mysqli_real_escape_string($con, $_POST['post_seo_desc']);
    $post_short_desc = mysqli_real_escape_string($con, $_POST['post_short_desc']);
    $post_long_desc = mysqli_real_escape_string($con, $_POST['post_long_desc']);
    $user_id = mysqli_real_escape_string($con, $_POST['userid']);

   

    if (!empty($post_name) && !empty($post_short_desc)) {

        if (!empty($post_long_desc)) {

            require 'slug.php';
            $seo_taitel = slugify($post_name);
            $check_post = mysqli_query($con, "SELECT blog_post_slug FROM blog_post WHERE blog_post_slug = '{$seo_taitel}'");

            if (mysqli_num_rows($check_post) > 0) {

                echo "This Post Name Already Exit In Our Database";

            } else {

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

                        $time = time();
                        $post_image_name = rand(111, 999) . $time . '.' . $img_extension;
                        $date = date('d-m-Y');
                        if (move_uploaded_file($img_temp_name, "upload/post/" . $post_image_name)) {
                            
                            $sql = "INSERT INTO blog_post (blog_post_slug,blog_post_seo_desc,blog_post_name,blog_post_desc,blog_post_content,blog_post_countries,blog_post_state,blog_post_city,admin_user_id,blog_post_date,blog_post_img)
                                    VALUES ('{$seo_taitel}','{$post_seo_desc}','{$post_name}','{$post_short_desc}','{$post_long_desc}','{$country_name}','{$state_name}','{$city_name}','{$user_id}','{$date}','{$post_image_name}')";
                            if (mysqli_query($con, $sql)) {

                                echo "DONE";

                            } else {

                                echo "Some Problem in Our Database";
                            }

                        } else {

                            echo "We Face Some Error Please Try After Some Time";
                        }

                    } else {

                        echo "please Upload Only png,jpg,JPEG";
                    }
                }
            }

        } else {

            echo "Please Enter Post Content";
        }

    } else {

        echo "Please Enter Post Titel & Desc";
    }




?>