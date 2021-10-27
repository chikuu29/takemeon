<?php



include_once '../admin/php/config.php';

$limit_per_page=5;
$page='';
if(isset($_POST['page_no'])){

    $page=$_POST['page_no'];

}else{

    $page=1;

}
$offset=($page-1) * $limit_per_page; 

$getpost_data_sql="SELECT * FROM blog_post  ORDER BY blog_post_id  DESC LIMIT {$offset},{$limit_per_page}";

$get_result=mysqli_query($con,$getpost_data_sql);

if(mysqli_num_rows($get_result)>0){

    while($row = mysqli_fetch_assoc($get_result)){
         
        echo "<div class='page-containt'>
        <div class='post-details-holder'>
            <img src='$hostname/admin/php/upload/post/$row[blog_post_img]' alt='$row[blog_post_img]'>
            <div class='post-details '>
                <span>Admin</span>
                <span>$row[blog_post_date]</span>
                <span>$row[blog_post_city]</span>
            </div>
        </div>

        <a href='post.php?q=$row[blog_post_slug]'>
            <h1>$row[blog_post_name]</h1>
        </a>

        <p class='post-desc'>$row[blog_post_desc]</p>

        <a href='post.php?q=$row[blog_post_slug]' class='read-more'>Readmore<i class='fas fa-location-arrow'></i></a>
    </div>";

}
  
  echo '</div>
               
  <div class="pagination">';
      
    //   if ($page > 1) {
          
          echo '<a id="'.($page-1).'">Prev</a>';
    // }
    for ($i=1; $i <=3 ; $i++) { 
        
        if($page==$i){
            $active='selectd-page';
        }else{
            $active="";
        }
        echo "<a id='$i' class='$active'>$i</a>";
    }

    // if (3 > $page) {
        echo '<a id="'.($page+1).'">Nest</a>';

        // }
     
    
   



}else{
    echo "<h1>No Post Found</h1> ";
}


