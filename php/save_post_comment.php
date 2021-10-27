<?php

session_start();
date_default_timezone_set('Asia/Kolkata');

include_once '../admin/php/config.php';

if(isset($_POST['post_id']) && isset($_POST['comment'])){

$post_id = mysqli_escape_string($con,$_POST['post_id']);
$comment = mysqli_escape_string($con,$_POST['comment']);
$username = "Unknow";
$user_id = "";
$date = date('d/m/Y h:i a', time());
 
if(isset($_SESSION['user_id'])){
    $username=$_SESSION['user_full_name'];
    $user_id =$_SESSION['user_id'];
}
if(empty($comment)){
 
    echo '{"error":"error","titel":"Sorry!","msg":"Message Box Should Not Be Empty"}';


}else{


    $sql="INSERT INTO blog_post_comment (post_id,blog_user_id,user_name,comment_msg,comment_date) VALUES('{$post_id}','{$user_id}',
    '{$username}','{$comment}','{$date}')";
    if(mysqli_query($con,$sql)){

        echo '{"error":"success","titel":"Thank You!","msg":"Your comment is Help Us"}';

    }else{
        echo '{"error":"error","titel":"Sorry!","msg":"Please Try After Some Time"}';
    }
}




}
?>