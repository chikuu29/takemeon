<?php
include_once 'config.php';
if (isset($_POST['country_name']) && isset($_POST['state_name']) && isset($_POST['city_name'])) {

    $country_name = mysqli_real_escape_string($con, $_POST['country_name']);
    $state_name = mysqli_real_escape_string($con, $_POST['state_name']);
    $city_name = mysqli_real_escape_string($con, $_POST['city_name']);
    $post_name = ucfirst(strtolower(mysqli_real_escape_string($con, $_POST['post_name'])));
    $post_short_desc = mysqli_real_escape_string($con, $_POST['post_short_desc']);
    $post_long_desc = mysqli_real_escape_string($con, $_POST['post_long_desc']);
    $yt_link = mysqli_real_escape_string($con, $_POST['yt_link']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $user_id = mysqli_real_escape_string($con, $_POST['userid']);

    if (!empty($post_name) && !empty($post_short_desc)) {

        if (!empty($post_long_desc)) {

            require 'slug.php';
            $seo_taitel = slugify($post_name);
            $check_post = mysqli_query($con, "SELECT post_slug FROM post WHERE post_slug = '{$seo_taitel}'");

            if (mysqli_num_rows($check_post) > 0) {

                echo "This Post Name Already Exit In Our Database";

            } else {

                $img_name = $_FILES['post_image']['name'];
                $img_type = $_FILES['post_image']['type'];
                $img_size = $_FILES['post_image']['size'];
                $img_temp_name = $_FILES['post_image']['tmp_name'];

                if ($img_size > 500000) {

                    echo "Please upload less than 500kb";

                } else {

                    $img_expload = explode('.', $img_name);
                    $img_extension = end($img_expload);
                    $extension = ["png", "jpg", "jpeg"];

                    if (in_array($img_extension, $extension) == true) {

                        $time = time();
                        $post_image_name = rand(111, 999) . $time . '.' . $img_extension;
                        $date = date('d-m-Y');
                        if (move_uploaded_file($img_temp_name, "upload/atraction/" . $post_image_name)) {
                            
                            $sql = "INSERT INTO post (post_slug,post_name,short_desc,post_content,country_name,state_name,city_name,google_location,yt_link,post_date,admin_id,post_img)
                                    VALUES ('{$seo_taitel}','{$post_name}','{$post_short_desc}','{$post_long_desc}','{$country_name}','{$state_name}','{$city_name}','{$location}','{$yt_link}','{$date}','{$user_id}','{$post_image_name}')";
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

} else {

    echo "Please Enter Country ,State & City";
}


?>