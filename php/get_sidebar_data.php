<?php

include_once '../admin/php/config.php';
if($_POST['type']=="p_post"){

$sql = mysqli_query($con,"SELECT * FROM post LIMIT 5");
if(mysqli_num_rows($sql)>0){

    while($row=mysqli_fetch_assoc($sql)){
   
  echo "<div class='popular-post-container'>

  <img src='$hostname/admin/php/upload/atraction/$row[post_img]' alt='$row[post_img]'>

  <div class='td-holder'>
      <a href='attractions.php?q=$row[post_slug]'>$row[post_name] </a>
      <div class='popular-post-deatails '>
          <span>Public</span>
          <span>$row[post_date]</span>
          <span>$row[city_name]</span>
      </div>

      <a href='attractions.php?q=$row[post_slug]' class='read-more'>Readmore<i class='fas fa-location-arrow'></i></a>

  </div>

</div>";


    }

}else{
    echo "<h1>No data Availble </h1> ";
}


}



if($_POST['type']=="top_place"){


    $sql = mysqli_query($con,"SELECT * FROM post");
    if(mysqli_num_rows($sql)>0){
    
        while($row=mysqli_fetch_assoc($sql)){
       
                echo "<div class='item'>
                <a href='attractions.php?q=$row[post_slug]'>
                    <img src='$hostname/admin/php/upload/atraction/$row[post_img]' alt='$row[post_img]'>
                    <div class='item-placetext'>
                        <a href='attractions.php?q=$row[post_slug]'>$row[post_name]</a>
                    </div>
                </a>
            </div>";
        }
    
    
    }else{
        echo "<p>No data Availble </p> ";
    }
    }

?>