<?php
include_once('../admin/php/config.php');
$input_string = mysqli_real_escape_string($con,$_POST['q']);
$sql=mysqli_query($con,"SELECT * FROM state WHERE state_name LIKE '%{$input_string}%'");
$output="";
if(mysqli_num_rows($sql)>=1){
    while($row=mysqli_fetch_assoc($sql)){
        $output=$output."<li><a href='state.php?state=$row[slug_name]'>$row[state_name]</a></li>";
    }
}
$sql2= mysqli_query($con,"SELECT * FROM country WHERE country_name LIKE '%{$input_string}%'");
if(mysqli_num_rows($sql2)>=1){
    while($row2=mysqli_fetch_assoc($sql2)){
        $output=$output."<li><a href='countries.php'>$row2[country_name]</a></li>";
    }
}
$sql3= mysqli_query($con,"SELECT * FROM post WHERE post_name LIKE '%{$input_string}%'");
if(mysqli_num_rows($sql3)>=1){
    while($row3=mysqli_fetch_assoc($sql3)){
        $output=$output."<li><a href='attractions.php?q=$row3[post_slug]'>$row3[post_name]</a></li>";
    }
}
$sql4= mysqli_query($con,"SELECT * FROM blog_post WHERE blog_post_name LIKE '%{$input_string}%'");
if(mysqli_num_rows($sql4)>=1){
    while($row4=mysqli_fetch_assoc($sql4)){
        $output=$output."<li><a href='post.php?q=$row4[blog_post_slug]'>$row4[blog_post_name]</a></li>";
    }
}
$sql5= mysqli_query($con,"SELECT * FROM city WHERE city_name LIKE '%{$input_string}%' OR slug LIKE '%{$input_string}%'");
if(mysqli_num_rows($sql5)>=1){
    while($row5=mysqli_fetch_assoc($sql5)){
        $output=$output."<li><a href='cities.php?city=$row5[slug]'>$row5[city_name]</a></li>";
    }
}
if(empty($output)){
    $output=$output."<li><a href='#'>No Data Found</a></li>";
}
echo $output;





?>