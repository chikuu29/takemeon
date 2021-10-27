<?php include 'header.php' ?>
<div id="mySidenav" class="sidenav" style="display: block;">
    <div class="logo"> <img src="img/glogo.png" alt="takemeon"></div>
    <a href="dash.php" class="icon-a active"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;Dashboard</a>
    <a href="newuser.php" class="icon-a"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;New Admin User</a>
    <a href="add-post.php" class="icon-a"><i class="fas fa-place-of-worship"></i>&nbsp;&nbsp;Add Place</a>
    <a href="post.php" class="icon-a"><i class="fas fa-rss-square"></i>&nbsp;&nbsp;All Post</a>
    <a href="user.php" class="icon-a"><i class="fas fa-users"></i>&nbsp;&nbsp;All Users</a>
</div>
<?php include 'sidenav.php' ?>
<div class="container mt-5">
    <div class="d-flex flex-row  bd-highlight mb-3 justify-content-between flex-wrap">

        <div class="m-3  " style="width: 18rem;">
            <div class="card-body bg-dark rounded border border-info">
                <div class="text-center mt-4 d-flex flex-column justify-content-center">
                    <i class="fas fa-eye fs-1"></i>
                    <h1 class="card-title text-center">Visitor</h1>
                </div>
                <div class="m-4 text-center">
                    <h1 class="text-danger">1000</h1>
                </div>
            </div>
        </div>


        <div class="m-3" style="width: 18rem;">
            <div class="card-body bg-dark border border-danger">
                <div class="text-center mt-4 d-flex flex-column justify-content-center">
                    <i class="fas fa-users-cog fs-1"></i>
                    <h1 class="card-title text-center">Admin Users</h1>
                </div>
                <div class="m-4 text-center">
                    <a href="newuser.php"><button type="button" class="btn btn-danger btn-lg w-100">Click Hear</button></a>
                </div>
            </div>
        </div>


        <div class="m-3" style="width: 18rem;">
            <div class="card-body bg-dark border border-danger ">
                <div class="text-center mt-4 d-flex flex-column justify-content-center">
                    <i class="fas fa-users fs-1"></i>
                    <h1 class="card-title text-center">Users</h1>
                </div>
                <div class="m-4 text-center">
                    <a href="user.php"><button type="button" class="btn btn-danger btn-lg w-100">Click Hear</button></a>
                </div>
            </div>
        </div>


        <div class="m-3" style="width: 18rem;">
            <div class="card-body bg-dark border border-warning ">
                <div class="text-center mt-4 d-flex flex-column justify-content-center">
                    <i class="fas fa-flag fs-1"></i>
                    <h1 class="card-title text-center">Country</h1>
                </div>
                <div class="m-4 text-center">
                    <a href="add-country.php"><button type="button" class="btn btn-warning w-100 btn-lg">Add</button></a>
                </div>
            </div>
        </div>


        <div class="m-3" style="width: 18rem;">
            <div class="card-body bg-dark border border-warning ">
                <div class="text-center mt-4 d-flex flex-column justify-content-center">
                   <i class="fas fa-star-of-david fs-1"></i>
                    <h1 class="card-title text-center">State</h1>
                </div>
                <div class="m-4 text-center border border-warning">
                    <a href="add-state.php"><button type="button" class="btn btn-warning w-100 btn-lg">Add</button></a>
                </div>
            </div>
        </div>


        <div class="m-3" style="width: 18rem;">
            <div class="card-body bg-dark border border-warning ">
                <div class="text-center mt-4 d-flex flex-column justify-content-center">
                    <i class="fas fa-city fs-1"></i>
                    <h1 class="card-title text-center">City</h1>
                </div>
                <div class="m-4 text-center">
                    <a href="add-city.php"><button type="button" class="btn btn-warning w-100 btn-lg">Add</button></a>
                </div>
            </div>
        </div>


        <div class=" m-3" style="width: 18rem;">
            <div class="card-body bg-dark rounded  border border-success  ">
                <div class="text-center mt-4 d-flex flex-column justify-content-center">
                    <i class="fas fa-place-of-worship fs-1"></i>
                    <h1 class="card-title text-center">Place</h1>
                </div>
                <div class="m-4 text-center">
                    <a href="add-post.php"><button type="button" class="btn btn-success w-100 btn-lg">Add Place</button></a>
                </div>
            </div>
        </div>


        <div class="m-3" style="width: 18rem;">
            <div class="card-body bg-dark border border-success ">
                <div class="text-center mt-4 d-flex flex-column justify-content-center">
                    <i class="fas fa-blog fs-1"></i>
                    <h1 class="card-title text-center">Blog</h1>
                </div>
                <div class="m-4 text-center">
                    <a href="add-blog-post.php"><button type="button" class="btn btn-success w-100 btn-lg">Add Blog</button></a>
                </div>
            </div>
        </div>


        <div class="m-3 " style="width: 18rem; ">
            <div class="card-body bg-dark border border-success">
                <div class="text-center mt-4 d-flex flex-column justify-content-center">
                    <i class="fab fa-youtube fs-1"></i>
                    <h1 class="card-title text-center">Youtube</h1>
                </div>
                <div class="m-4 text-center">
                    <a href="#"><button type="button" class="btn btn-success w-100 btn-lg">Add Video</button></a>
                </div>
            </div>
        </div>

        <div class="m-3 " style="width: 18rem; ">
            <div class="card-body bg-dark border border-success">
                <div class="text-center mt-4 d-flex flex-column justify-content-center">
                   <i class="fas fa-star-of-david fs-1"></i>
                    <h1 class="card-title text-center">State</h1>
                </div>
                <div class="m-4 text-center">
                    <a href="show-state.php"><button type="button" class="btn btn-success w-100 btn-lg">Show State</button></a>
                </div>
            </div>
        </div>
        <div class="m-3 " style="width: 18rem; ">
            <div class="card-body bg-dark border border-success">
                <div class="text-center mt-4 d-flex flex-column justify-content-center">
                   <i class="fas fa-place-of-worship fs-1"></i>
                    <h1 class="card-title text-center">Place</h1>
                </div>
                <div class="m-4 text-center">
                    <a href="show-place.php"><button type="button" class="btn btn-success w-100 btn-lg">Show Place</button></a>
                </div>
            </div>
        </div>



    </div>
</div>
<?php  include 'script.php' ?>
<script type="text/javascript">

     $(window).on('load',function(){
        // setTimeout(function(){
            $('#fetch-animation').hide();
        // },2000)
            
        })

        $(document).ready(function() {

        $('.logout').on('click', function() {
         
                $('#staticBackdrop').modal('show');

             
        });


    });
</script>
</body>
</html>