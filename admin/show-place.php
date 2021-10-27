
<?php include 'header.php' ?>
<div id="mySidenav" class="sidenav" style="display: block;">
    <div class="logo"> <img src="img/glogo.png" alt="takemeon"></div>

    <a href="dash.php" class="icon-a"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard</a>
    <a href="newuser.php" class="icon-a "><i class="fas fa-user-plus"></i>&nbsp;&nbsp;New Admin User</a>
    <a href="add-post.php" class="icon-a "><i class="fas fa-place-of-worship"></i>&nbsp;&nbsp;Add Place</a>
    <a href="post.php" class="icon-a"><i class="fas fa-rss-square"></i>&nbsp;&nbsp;All Post</a>
    <a href="user.php" class="icon-a"><i class="fas fa-users"></i>&nbsp;&nbsp;All Users</a>




</div>

<?php include 'sidenav.php' ?>




<div class="container">

    <div class="Headder-text fs-3 m-5 text-center">Search Place</div>

   

    
<form action="">
       <div class="d-flex">
            
            <select  name="country_name" class="form-select m-1 fs-3"  id="get_country" aria-label="Default select example">
                 <option value="" selected>Select Country</option>
            </select>
            <select  name="state_name" class="form-select m-1 fs-3"  id="get_state" aria-label="Default select example">
                 <option value="" selected>Select State</option>
            </select>
            <select  name="city_name" class="form-select m-1 fs-3"  id="get_city" aria-label="Default select example">
                 <option value="" selected>Select city</option>
            </select>
            <button type="button" class="btn btn-success btn-lg m-1" id="show-save-btn">Show</button>
            <button type="reset" class="btn btn-secondary btn-lg m-1">Reset</button>

        </div>
        </form>

        <table id="user-table" class="mt-4">


        
       
        </table>


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

        // fetch country,state,city value
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
                           $('#get_state').html(data);
                        }
                        if(type=="citydata") {
                           $('#get_city').html(data);
                        }
                
               }

            })
        }

       $('#get_country').on("change",function(){
          var country_name=$('#get_country').val();
          loaddata("statedata",country_name);
       })

       $('#get_state').on("change",function(){
        var state_name=$('#get_state').val();
        loaddata("citydata",state_name);

       })

    loaddata('',);

//save post data to data base

       
       $('#show-save-btn').on('click',function(){
        var country_name=$('#get_country').val();
        var state_name=$('#get_state').val();
        var city_name =$('#get_city').val();
 
         $.ajax({
             url:'php/fetch_place_data.php',
             type:'POST',
             data:{country_name:country_name,state_name:state_name,city_name:city_name},
             success:function(data){

                $('#user-table').html(data);

             }


         })


      
        })

       
    });
</script>
</body>
</html>
