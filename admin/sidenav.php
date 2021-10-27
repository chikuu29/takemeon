    <div id="main">
        <div class="sidenav2">
            <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer;color: wheat;" id="home" onclick="HideNav(this)">&#9776;</span>
            </div>
            <!-- <div class="col-div-6">
                <div class="color-change color-active">
                    <div class="color light" onclick="color_change(1) "></div>
                    <div class="color darck" onclick="color_change(2) "></div>
                </div>

            </div>  -->

            <div class="col-div-6 user">

                <img src="php/upload/admin/<?php echo $_SESSION['img']; ?>" class="pro-img logout" alt="">
                 <div class="user-clm">
              
                    <p id="username"><?php echo strtoupper($_SESSION['fullname']);?></p>
                    <span>User-ID-<?php echo  $_SESSION['admin_user_id']; ?></span>
                 </div>
                
            </div>
        </div>