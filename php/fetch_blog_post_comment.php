<?php

   include_once '../admin/php/config.php';
   $post_id = mysqli_real_escape_string($con,$_POST['post_id']);
   $sql="SELECT * FROM blog_post_comment WHERE post_id='{$post_id}' ORDER BY comment_id DESC ";
   $result=mysqli_query($con,$sql);
   if(mysqli_num_rows($result)>0){
      
      while($row = mysqli_fetch_assoc($result)){
          echo " <div class='user-msg-holer'>
          <div class='comment-user'>
              <img src='img/comment.jpg' alt='userprofile'>
              <div class='user-clm'>
                  <p>$row[user_name]</p>
                  <span>$row[comment_date]</span>
              </div>
          </div>
           <div class='user-msg'>
              <p class='msg'>
               $row[comment_msg]
              </p>
          </div>
       
       </div>";
      }
      


   }else{
    echo '<p>Be The First Comment</P>';
   }


 
   



?>