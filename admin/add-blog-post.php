
<?php include 'header.php' ?>
<div id="mySidenav" class="sidenav" style="display: block;">
    <div class="logo"> <img src="img/glogo.png" alt="takemeon"></div>

    <a href="dash.php" class="icon-a "><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard</a>   
    <a href="newuser.php" class="icon-a"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Add-New-Admin-User</a>
    <a href="add-post.php" class="icon-a active"><i class="fas fa-rss-square"></i>&nbsp;&nbsp;New-Post</a>
    <a href="post.php" class="icon-a"><i class="fas fa-rss-square"></i>&nbsp;&nbsp;All-Post</a>
    <a href="user.php" class="icon-a"><i class="fas fa-users"></i>&nbsp;&nbsp;All-Users</a>



</div>

<?php include 'sidenav.php' ?>



 
<div class="container">

    <div class="Headder-text fs-3 m-5 text-center">Add New Blog Post</div>

   

    <form id="post_form" >

        <div class="mb-3">
            <label for="fname" class="form-label ">Countries</label>
            <select class="form-select fs-3 " name="country_name" id="get_country" aria-label="Default select example">
                 <option value="" selected>SELECT COUNTRY</option>
            </select>

        </div>

        <div class="mb-3">
            <label for="fname" class="form-label">State</label>
            <select class="form-select fs-3" name="state_name" id="state_id" aria-label="Default select example">
                
            </select>

        </div>

        <div class="mb-3">
            <label for="fname" class="form-label ">City</label>
            <select class="form-select fs-3 " name="city_name" id="city_id" aria-label="Default select example">
                
            </select>

        </div>

        <div class="mb-3">
            <label for="fname" class="form-label ">Post Titels</label>
            <input type="text" class="form-control  fs-3 " name="post_name" placeholder="Post Titels" >
        </div>
        <div class="mb-3">
            <label for="fname" class="form-label ">Seo Description</label>
            <input type="text" class="form-control  fs-3" name="post_seo_desc" placeholder="Short Description">
        </div>

        <div class="mb-3">
            <label for="fname" class="form-label ">Short Description</label>
            <input type="text" class="form-control  fs-3" name="post_short_desc" placeholder="Short Description">
        </div>

        <div class="mb-3">
            <label for="fname" class="form-label ">Long Description</label>
            <textarea class="form-control fs-3 overflow-auto" id="post_long_desc" name="post_long_desc"></textarea>
        </div>


       


        <div class="mb-3">
            <label for="formFile" class="form-label">Please Upload Photo</label>
            <input class="form-control fs-3" type="file" name="post_image" id="formFile">
            <div id="emailHelp" class="form-text">less than 5mb</div>

        </div>
        <div class="mb-3 d-none">
        <input type="text" value="<?php echo  $_SESSION['admin_user_id']; ?>" none name="userid" >

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

        // preloder
        function loaddata(type,category_name){
            $.ajax({

               url:'php/get_value.php',
               type:'POST',
               data:{type:type,category_name:category_name},

               success:function(data){
                        if(type==""){
                          $('#get_country').append(data);
                           }
                        if(type=="statedata") {
                           $('#state_id').html(data);
                        }
                        if(type=="citydata") {
                           $('#city_id').html(data);
                        }
                
               }

            })
        }


     

       $('#get_country').on("change",function(){
          var country_name=$('#get_country').val();
          loaddata("statedata",country_name);
       })

       $('#state_id').on("change",function(){
        var state_name=$('#state_id').val();
        loaddata("citydata",state_name);

       })


    loaddata('',);

//save post data to data base

       
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
                                            url:"php/save_blog_post.php",
                                            type:"POST",
                                            data:formdata,
                                            contentType: false,
                                            processData: false,
                                            success:function(data){
                                                    if(data=="DONE"){

                                                        $('#post_form')[0].reset();


                                                         swal({
                                                                  title: "Wow Great",
                                                                  text:"Congratulation Your Post Submited",
                                                                  icon: "success",

                                                                });




                                                        
                                                              
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



























//
      
        })

       
    });
</script>
</body>
</html>
