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

    <div class="Headder-text fs-3 m-5 text-center">Add City</div>
    <form id="city_form">
          <div class="mb-3">
            <label for="country" class="form-label fs-2">Country</label>
             <select class="form-select fs-3" name="country_name" id="get_country" aria-label="Default select example">
                <!-- fetch the country from data base---- -->
<?php
                     include_once('php/config.php');
                     $get_country_name=mysqli_query($con,"SELECT * FROM country");
                   
                      
       
         if (mysqli_num_rows($get_country_name)) {
             echo '<option value=" " selected>SELECT</option>';
             while($result=mysqli_fetch_assoc($get_country_name)){
                   
                     echo  "<option value='$result[country_name]'>$result[country_name]</option>";

                 

             }
             
         }else{

           echo '<option value=" " selected>SELECT</option>';
               

         }
    


    ?>   
      </select>
        </div>
         <div class="mb-3">
            <label for="fname" class="form-label fs-2">State</label>
            <select class="form-select fs-3" name="state_name" id="get_state" aria-label="Default select example">
            <option>First Select Country</option>
               
            </select>
             <div class="mb-3">
                <label for="state_name" class="form-label fs-2">City</label>
                <input type="text" class="form-control  p-3 fs-3" name="city_name" placeholder="Enter State Name" required>
            </div>

            <div class="mb-3">
                <label for="state_short_desc" class="form-label fs-2">Short Description</label>
                <input type="text" class="form-control  p-3 fs-3 " name="city_short_desc" placeholder="Enter The Short Description" required>
            </div>
            <div class="mb-3">
                <label for="state_long_desc" class="form-label fs-2">Long Description</label>
                <!-- <textarea class="form-control fs-5 overflow-auto" name="country_long_desc" placeholder="Write hear...." rows="10" required></textarea> -->
                <textarea  id="" class="form-control fs-5 overflow-auto" cols="30" name="city_long_desc" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="state_location" class="form-label fs-2">Embeded Location</label>
                <input type="text" class="form-control  p-3 fs-3 " name="city_location" placeholder="ENTER GOOGLE MAP EMBEED LINK" required>
            </div>


            <div class="mb-3">
                <label for="city_image" class="form-label fs-2">Please Upload Photo</label>
                <input class="form-control fs-3" type="file" name="city_image" id="formFile">
                <div id="emailHelp" class="form-text">less than 1mb</div>
            </div>

            <div class="mb-3 d-none">
                <label for="formFile" class="form-label fs-2">Your_id</label>
                <input type="text" class="form-control  p-3 fs-3 " name="user_id" value="<?php echo $_SESSION['admin_user_id']; ?>">

            </div>
            <button type="button" class="btn btn-primary btn-lg m-2" id="city_save_btn">Submit</button>
            <button type="reset" class="btn btn-secondary btn-lg m-2">Reset</button>
    </form>



</div>
<!-- model dialog -bbox -->
<div class="modal fade" id="city_alert_model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="staticBackdropLabel">Hii <?php echo strtoupper($_SESSION['fullname']); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark text-center" id="alert-msg">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Ok</button>

            </div>
        </div>
    </div>
</div>




<?php  include 'script.php' ?>
<!-- <script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });
</script> -->

<!-- This is script for Drop down Country and State Selection -->
<script type="text/javascript">
     $(window).on('load',function(){
            $('#fetch-animation').hide();
        })
     
    $(document).ready(function() {
        
        $('.logout').on('click', function() {
            $('#staticBackdrop').modal('show');

        });
         
    $('#get_country').on('change', function() {
               
        var country_name=$("#get_country").val();
        $.ajax({
            url:"php/get_city.php",
            type:"POST",
            data:{country_name:country_name},
            success :function(city){
                $('#get_state').html(city);
            }
        });
    });
//save city value to the database
   $('#city_save_btn').on('click',function(){

        var city_form=document.getElementById('city_form');
        var formdata= new FormData(city_form);
 
        $.ajax({
        url:"php/save_city.php",
        type:"POST",
        data:formdata,
        contentType: false,
        processData: false,
        success:function(data){
          if(data=="DONE"){
                   $('#alert-msg').html("Congratulation City is inserted");
                    $('#city_form')[0].reset();
                    $('#city_alert_model').modal('show');
                 }else{
                    document.getElementById('alert-msg').innerHTML=data;
                    $('#city_alert_model').modal('show');
                 }        
        }

       });
   });

//save city value to the database

});

</script>


</body>

</html>
