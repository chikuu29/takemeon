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
    <div class="Headder-text fs-3 m-5 text-center">Add Country</div>
    <form id="country_form">
        <div class="mb-3">
            <label for="fname" class="form-label fs-2">COUNTRY</label>
            <input type="text" class="form-control  p-3 fs-3" name="country_name" placeholder="Enter Country Name" required>
        </div>
        <div class="mb-3">
            <label for="fname" class="form-label fs-2">SHORT DESCRIPTION</label>
            <input type="text" class="form-control  p-3 fs-3 " name="country_short_desc" placeholder="Enter The Short Description" required>
        </div>
        <div class="mb-3">
            <label for="fname" class="form-label fs-2">LONG DESCRIPTION</label>
            <!-- <textarea class="form-control fs-5 overflow-auto" name="country_long_desc" placeholder="Write hear...." rows="10" required></textarea> -->
            <textarea  id="" class="form-control fs-5 overflow-auto" cols="30" name="country_long_desc" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <label for="fname" class="form-label fs-2">EMBEDED lOCATION</label>
            <input type="text" class="form-control  p-3 fs-3 " name="country_location" placeholder="ENTER GOOGLE MAP EMBEED LINK" required>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label fs-2">Please Upload Photo</label>
            <input class="form-control fs-3" type="file" name="country_image" id="formFile">
            <div id="emailHelp" class="form-text">less than 1mb</div>
        </div>
        <div class="mb-3 d-none">
            <label for="formFile" class="form-label fs-2">Your_id</label>
            <input type="text" class="form-control  p-3 fs-3 " name="user_id" value="<?php echo $_SESSION['admin_user_id']; ?>">
        </div>
        <button type="button" class="btn btn-primary btn-lg m-2" id="country_save-btn">Submit</button>
        <button type="reset" class="btn btn-secondary btn-lg m-2">Reset</button>
    </form>
</div>
<!-- model dialog -bbox -->
<div class="modal fade" id="city_alert_model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="staticBackdropLabel">HYY <?php echo strtoupper($_SESSION['fullname']); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark text-center" id="city_alert-msg">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<?php  include 'script.php' ?>
<script type="text/javascript">
     $(window).on('load',function(){
            $('#fetch-animation').hide();
        })
     
        $(document).ready(function() {

        $('.logout').on('click', function() {

             $('#staticBackdrop').modal('show');

        });
        //save country value to the database
   $('#country_save-btn').on('click',function(){
     
        var country_form=document.getElementById('country_form');
        var formdata= new FormData(country_form);

 
        $.ajax({
        url:"php/save_country.php",
        type:"POST",
        data:formdata,
        contentType: false,
        processData: false,
        success:function(data){
          if(data=="DONE"){
                   $('#city_alert-msg').html("Congratulation Country is inserted");
                    $('#city_alert_model').modal('show');
                    $('#country_form')[0].reset();
                 }else{
                    document.getElementById('city_alert-msg').innerHTML=data;
                    $('#city_alert_model').modal('show');

                 }        
        }

       });
   });

//save country value to the database


    });
</script>
</body>
</html>