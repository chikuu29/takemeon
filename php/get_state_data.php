<?php


include_once '../admin/php/config.php';
$sql = mysqli_query($con,"SELECT * FROM state");
if(mysqli_num_rows($sql)>0){

    while($row=mysqli_fetch_assoc($sql)){
   
  echo "<div class='place content-bg'>
                <a href='state.php?state=$row[slug_name]'>
                    <img src='$hostname/admin/php/upload/state/$row[state_img]' alt='$row[state_img]'>
                    <div class='item-text-center'>$row[state_name]</div>
                </a>
                <div class='placetext'>
                    <a href='state.php?state=$row[slug_name]'>Know More</a>
                </div>
            </div>";
 

    }

}else{
    echo "<h1>No State Found</h1> ";
}




?>