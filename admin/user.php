<?php include 'header.php' ?>
<div id="mySidenav" class="sidenav" style="display: block;">

    <div class="logo"> <img src="img/glogo.png" alt="takemeon"></div>
    <a href="dash.php" class="icon-a"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard</a>
    <a href="newuser.php" class="icon-a "><i class="fas fa-user-plus"></i>&nbsp;&nbsp;New Admin User</a>
    <a href="add-post.php" class="icon-a "><i class="fas fa-place-of-worship"></i>&nbsp;&nbsp;Add Place</a>
    <a href="post.php" class="icon-a"><i class="fas fa-rss-square"></i>&nbsp;&nbsp;All Post</a>
    <a href="user.php" class="icon-a active"><i class="fas fa-users"></i>&nbsp;&nbsp;All Users</a>


</div>
<!-- <div class="takemeon-container"> -->
<?php include 'sidenav.php' ?>

<div class="container sb-margin mt-5">

    <div class="header-txt-serch-holder mb-2">
        <div>
                <select class="form-select" name="typeuser" id="select_user_type" aria-label="Default select example">
                    <option value="" selected>Select User Type</option>
                    <option value="adminuser">Admin Users</option>
                    <option value="normaluser">Normal Users</option>
                     <option value="googleuser">Google Users</option>
                </select>

        </div>

        <div class="Headder-text fs-3">Find All Users</div>

        <div class="search">

            <input type="text" class="pl-2 fs-5" placeholder="Search">

        </div>


    </div>
 

    <!-- ------user-table-------- -->

    <table id="user-table">

        
       
    </table>



    <!-- ------user-table-------X- -->
 <!--    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav> -->
    <!-- Modal -->
    
</div>
<?php  include 'script.php' ?>

<script type="text/javascript">
// preloder
        $(window).on('load',function(){

                $('#fetch-animation').hide();
        })

        $(document).ready(function() {

        $('.logout').on('click', function() {

                 $('#staticBackdrop').modal('show');

           });
         
         $('#select_user_type').on('change',function(){
                  
                 

            $.ajax({
                  
                  url:"php/get-all-users.php",
                  type:"POST",
                  data:{type:this.value},
                  success:function(data){

                    $('#user-table').html(data);



                  }

            })





         })
        



    });
</script>
</body>
</html>