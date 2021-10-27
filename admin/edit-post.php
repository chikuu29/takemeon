
<?php include 'header.php' ?>
<div id="mySidenav" class="sidenav" style="display: block;">
    <div class="logo"> <img src="img/glogo.png" alt="takemeon"></div>

    <a href="dash.php" class="icon-a "><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard</a>   
    <a href="newuser.php" class="icon-a"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Add-New-Admin-User</a>
    <a href="add-post.php" class="icon-a"><i class="fas fa-rss-square"></i>&nbsp;&nbsp;New-Post</a>
    <a href="post.php" class="icon-a active"><i class="fas fa-rss-square"></i>&nbsp;&nbsp;All-Post</a>
    <a href="user.php" class="icon-a"><i class="fas fa-users"></i>&nbsp;&nbsp;All-Users</a>
  


</div>

<?php include 'sidenav.php' ?>



 
<div class="container">

    <div class="Headder-text fs-3 m-5 text-center">Add New Blog Post</div>
       <?php
                include_once 'php/config.php';
                $post_id = $_GET['q'];
                $fetch_query="SELECT * FROM blog_post WHERE blog_post_id='{$post_id}' ";
                $row=mysqli_query($con,$fetch_query);
                $fetch_value=mysqli_fetch_assoc($row);
        ?>
   

    <form id="post_form" >

        <div class="mb-3">
            <label for="fname" class="form-label ">Countries</label>
            <select class="form-select fs-3 " name="country_name" id="get_country" aria-label="Default select example">
                 <option value="" selected><?php echo $fetch_value['blog_post_countries'] ; ?></option>
            </select>

        </div>

        <div class="mb-3">
            <label for="fname" class="form-label">State</label>
            <select class="form-select fs-3" name="state_name" id="state_id" aria-label="Default select example">
            <option value="" selected><?php echo $fetch_value['blog_post_state'] ; ?></option>
            </select>

        </div>

        <div class="mb-3">
            <label for="fname" class="form-label ">City</label>
            <select class="form-select fs-3 " name="city_name" id="city_id" aria-label="Default select example">
            <option value="" selected><?php echo $fetch_value['blog_post_city'] ; ?></option>
            </select>

        </div>
        <div class="mb-3">
            <label for="fname" class="form-label ">Seo Post Desc</label>
            <input type="text" class="form-control  fs-3 " name="post_seo_desc" value="<?php echo $fetch_value['blog_post_seo_desc'];?>">
        </div>

        <div class="mb-3">
            <label for="fname" class="form-label ">Seo Url Name</label>
            <input type="text" class="form-control  fs-3 " name="post_seo_name" value="<?php echo $fetch_value['blog_post_slug'];?>">
        </div>

        <div class="mb-3">
            <label for="fname" class="form-label ">Post Taitel</label>
            <input type="text" class="form-control  fs-3" name="post_name"  value="<?php echo $fetch_value['blog_post_name'];?>">
        </div>
        
        <div class="mb-3">
            <label for="fname" class="form-label ">Post Short Desc</label>
            <input type="text" class="form-control  fs-3" name="post_short_desc"  value="<?php echo $fetch_value['blog_post_desc'];?>">
        </div>

        <div class="mb-3">
            <label for="fname" class="form-label ">Post Long Desc</label>
            <textarea class="form-control fs-3 overflow-auto" id="post_long_desc" name="post_long_desc">
                <?php echo $fetch_value['blog_post_content']; ?>
            </textarea>
        </div>

    
       


        <div class="mb-3">
            <label for="formFile" class="form-label">Please Upload Photo</label>
          
            <input class="form-control fs-3" type="file" name="post_image" id="formFile">
            <div   class="form-text">less than 5mb</div>
            <img class="w-100 mb-2" src="<?php echo $hostname;?>/admin/php/upload/post/<?php echo $fetch_value['blog_post_img'] ?>" alt="<?php echo $fetch_value['blog_post_img'] ?>">

        </div>
        <div class="mb-3 d-none">
        <input type="text" value="<?php echo  $_SESSION['admin_user_id']; ?>" none name="userid" >
        <input type="text" value="<?php echo $post_id ?>" none name="post_id" >
        <input type="text" value="<?php echo $fetch_value['blog_post_img']; ?>" none name="img_name" >

        </div>

        <button type="button" class="btn btn-primary btn-lg" id="blog-post-save-btn">Submit</button>
        <button type="reset" class="btn btn-secondary btn-lg">Reset</button>

    </form>



</div>



<?php  include 'script.php' ?>
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>


<script>
   
        CKEDITOR.replace('post_long_desc');

</script>

<script type="text/javascript">

    // preloder
     $(window).on('load',function(){
            $('#fetch-animation').hide();
        })
        $(document).ready(function() {

        $('.logout').on('click', function() {

             $('#staticBackdrop').modal('show');

        });

       
      
//Update post data to data base

       
       $('#blog-post-save-btn').on('click',function(){


            // update ckeditot text area value
              for(instance in CKEDITOR.instances){

                      CKEDITOR.instances[instance].updateElement();

                  }





                swal({
                      title: "Are you sure?",
                      text: "Want To Submit",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                })

                .then((willDelete) => {

                  if (willDelete) {




                                 var post_form = document.getElementById('post_form');
                                 var formdata = new FormData(post_form);
                            

                                  $.ajax({
                                            url:"php/update_blog_post.php",
                                            type:"POST",
                                            data:formdata,
                                            contentType: false,
                                            processData: false,
                                            success:function(data){
                                                    if(data=="DONE"){

                                                    
                                                         swal({
                                                                  title: "Wow Great",
                                                                  text:"Congratulation Your Post Submited",
                                                                  icon: "success",
                                                                  buttons: true,

                                                                }).then((refresh) => {

                                                                    if(refresh){

                                                                        location.reload();

                                                                    }

                                                                })




                                                        
                                                              
                                                        }else{


                                                            swal({
                                                                  title: "Opps",
                                                                  text: data,
                                                                  icon: "error",

                                                                });

                                                            // $('#post_alert_msg').html(data);
                                                            // $('#post_alert_model').modal('show');
                                                        }

                                               

                                            }
                                        });




                  } else {



                        swal({
                              title: "OK",
                              text: "Thank You",
                              icon: "success",
                             
                        })

                    
                  }

                });


      
        })

       
    });
</script>
</body>
</html>
