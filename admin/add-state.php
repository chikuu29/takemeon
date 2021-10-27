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

     <div class="Headder-text fs-3 m-5 text-center">Add State</div>
    <form id="state_form" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="country" class="form-label fs-2">COUNTRY</label>
             <select class="form-select fs-3" name="country_name" aria-label="Default select example">
                <!-- fetch the country from data base---- -->
  <?php
                     include_once('php/config.php');
                     $get_country_name=mysqli_query($con,"SELECT * FROM country");
                   
                      
       
         if (mysqli_num_rows($get_country_name)) {
             echo '<option value="" selected>SELECT</option>';
             while($result=mysqli_fetch_assoc($get_country_name)){
                   
                     echo  "<option value='$result[country_name]'>$result[country_name]</option>";

                 

             }
             
         }else{

           echo '<option value="" selected>SELECT</option>';
               

         }
    


    ?>   
      </select>
        </div>
         <div class="mb-3">
            <label for="state_name" class="form-label fs-2">STATE</label>
            <input type="text" class="form-control  p-3 fs-3" name="state_name" placeholder="Enter State Name" required>

        </div>

            <div class="mb-3">
                <label for="state_short_desc" class="form-label fs-2">SHORT DESCRIPTION</label>
                <input type="text" class="form-control  p-3 fs-3 " name="state_short_desc" placeholder="Enter The Short Description" required>
            </div>
            <div class="mb-3">
                <label for="state_long_desc" class="form-label fs-2">LONG DESCRIPTION</label>
                <!-- <textarea class="form-control fs-5 overflow-auto" name="country_long_desc" placeholder="Write hear...." rows="10" required></textarea> -->
                <textarea  id="" class="form-control fs-5 overflow-auto" cols="30" name="state_long_desc" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="state_location" class="form-label fs-2">EMBEDED lOCATION</label>
                <input type="text" class="form-control  p-3 fs-3 " name="state_location" placeholder="ENTER GOOGLE MAP EMBEED LINK" required>

            </div>


            <div class="mb-3">
                <label for="state_image" class="form-label fs-2">Please Upload Photo</label>
                <input class="form-control fs-3" type="file" name="state_image" id="formFile">
                <div id="emailHelp" class="form-text">less than 1mb</div>


            </div>

            <div class="mb-3 d-none">
                <label for="formFile" class="form-label fs-2">Your_id</label>
                <input type="text" class="form-control  p-3 fs-3 " name="user_id" value="<?php echo $_SESSION['admin_user_id']; ?>">



            </div>
            <button type="button" class="btn btn-primary btn-lg m-2" id="state_save_btn">Submit</button>
            <button type="reset" class="btn btn-secondary btn-lg m-2">Reset</button>
    </form>



</div>
<!-- model dialog -bbox -->
<div class="modal fade" id="state_alert_model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="staticBackdropLabel">HYY <?php echo strtoupper($_SESSION['fullname']); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark text-center" id="state_alert-msg">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Ok</button>

            </div>
        </div>
    </div>
</div>






<?php  include 'script.php' ?>
<script type="text/javascript">
       // preloder script

     $(window).on('load',function(){
            $('#fetch-animation').hide();
        })
        $(document).ready(function() {

        $('.logout').on('click', function() {

             $('#staticBackdrop').modal('show');

        });
           //save state value to the database
   $('#state_save_btn').on('click',function(){
     
        var state_form=document.getElementById('state_form');
        var formdata= new FormData(state_form);

 
        $.ajax({
        url:"php/save_state.php",
        type:"POST",
        data:formdata,
        contentType: false,
        processData: false,
        success:function(data){
          if(data=="DONE"){

                   $('#state_alert-msg').html("Congratulation State is inserted");
                   $('#state_form')[0].reset();
                   $('#state_alert_model').modal('show');
                 }else{
                    
                    document.getElementById('state_alert-msg').innerHTML=data;
                    $('#state_alert_model').modal('show');

                 }        
        }

       });
   });

//save country value to the database


    });
</script>
</body>
</html>
