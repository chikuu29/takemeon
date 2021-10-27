 <!------------Navigation-Bar-------------- -->
 <nav class="nav-scoll ">
        <div class="navholder" id="nav">
            <div class="navigation">
                <!-- login bar icon   -->
                <?php
                if (isset($_SESSION['user_email']) && isset($_SESSION['user_login'])) {
                ?>
                    <div class="mlogin" onclick="logout()">
                        <i class="fas fa-sign-out-alt" onclick="closelogout()"></i>
                    </div>
                <?php

                } else {
                ?>
                    <div class="mlogin" onclick="openLoginbar()">
                        <i onclick="openLoginbar()" class="fas fa-user-alt"></i>
                    </div>
                <?php
                }
                ?>


                <!-- login bar icon   -->

                <!-- takemon logo  -->
                <div class="image-logo">
                    <img src="img/glogo.png" id='img-change' alt="Takemeon">
                </div>
                <!-- takemon logo  -->

                <!-- mobail nav  -->
                <div id="mobail-nav" class="overlay">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <div class="overlay-content">
                        <a href="index.php"><i class="fas fa-home"></i>Home</a>
                        <a href="admin"><i class="fas fa-users-cog"></i>Admin</a>
                        <a href="blog-post.php"><i class="fas fa-images"></i>Blog</a>
                        <a href="about.html"><i class="fas fa-blog"></i>About</a>
                        <a href="#contact-us"><i class="fa fa-fw fa-envelope"></i>Contact</a>
                    </div>
                    <div class="social-follow">
                        <a href="https://www.youtube.com/c/eAmChikuu" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.instagram.com/eamchikuuu/" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.facebook.com/eamchikuu" target="_blank"><i class="fab fa-facebook-square"></i></a>

                    </div>
                </div>
                <!-- mobail nav  -->
                <!-- desktop nava barr -->
                <div class="desktop-nav">
                    <a href="index.php"><i class="fas fa-home"></i> Home</a>
                    <a href="blog-post.php"><i class="fas fa-images"></i>Blog</a>
                    <a href="about.html"><i class="fas fa-blog"></i>About</a>
                    <a href="#foot-scoll"><i class="fa fa-fw fa-envelope"></i>Contact</a>
                    <a href="admin"><i class="fas fa-users-cog"></i>Admin</a>
                </div>
                <!-- this login for desktop -->
                <?php
                if (isset($_SESSION['user_email']) && isset($_SESSION['user_login'])) {
                ?>
                    <div class="login" onclick="logout()">
                        <a href="javascript:void(0)"><i class="fas fa-sign-out-alt"></i>Logout</a>
                    </div>
                <?php

                } else {
                ?>
                    <div class="login" onclick="openLoginbar()">
                        <a href="javascript:void(0)"><i class="fas fa-user-alt"></i>login</a>
                    </div>
                <?php
                }
                ?>
                <!-- mobail home botton -->
                <div class="home" onclick="openNav()">
                    <i class="fas fa-bars"></i>
                </div>

            </div>
        </div>
 </nav>
    <!------------Navigation-Bar-----X--------- -->
    <!----------login and Signup page ------------->
    <section>
        <!-- login html code start hear -->
        <div class="login-signup" id="loginsighup" style="display: none;">
            <div class="formholder animate">
                <form class="form-content " id="user-login-form" autocomplete="on">
                    <div class="close-loginbtn" onclick="closeloginbar()">
                        <a href="javascript:void(0)"><i class="fas fa-times-circle"></i></a>
                    </div>
                    <!--  <p class="alert">Alert Message</p> -->
                    <div class="login-msg">
                        <img src="img/takemeon.png" alt="">
                        <h1>Sign in to </h1>
                    </div>
                    <div class="social-login">
                        <a href="#" class="btn-face ">
                            <i class="fab fa-facebook-square"></i>
                            Facebook
                        </a>
                        <a href="#" class="btn-google " onclick="window.location='<?php echo $login_url; ?>'">
                            <img src="img/icon-google.png" alt="GOOGLE">
                            Google
                        </a>
                    </div>
                    <div class="par-msg">
                        <p>Or Use Your Email Account</p>
                    </div>
                    <div class="input-field">
                        <div class="letter">
                            <span class="txt1">
                                Username
                            </span>
                        </div>
                        <div class="inputfield">
                            <input class="input100" type="email" name="username" placeholder="Email"  value="<?php echo $cockie_user_email ; ?>">
                        </div>
                        <div class="letter">
                            <span class="txt1">
                                Password
                            </span>
                        </div>
                        <div class="inputfield">
                            <input class="input100" type="password" name="password" placeholder="Password" autocomplete="on" value="<?php echo $cockie_user_password ; ?>">
                        </div>
                    </div>
                    <div class="check-box">
                        <input type="checkbox" name="remember" checked>&nbsp;Remember Me
                    </div>
                    <div class="sbtn">
                        <button type="button" id="user-login-btn"><i class="fas fa-sign-in-alt">&nbsp;Login Now</i></button>
                        <button type="button"><a href="registation.php">SignUp</a></button>
                    </div>
                    <div class="forgot">
                        <span>Forgot <a href="forgotpassword.php" style="color:whitesmoke;">Password?</a></span>
                    </div>
                </form>
            </div>
 
        </div>
    </section>
    <div id="logout">
        <div class="Logout-box">
            <div class="close-loginbtn" onclick="closelogout()">
                <a href="javascript:void(0)"><i class="fas fa-times-circle"></i></a>
            </div>
            <div class="welcomemsg">Welcome</div>
            <div class="user-img">
                <?php
                if (isset($_SESSION['access_token'])) {

                    echo "<img src='{$_SESSION['user_img']}'>";
                } else {
                    echo '<img src="img/download.jpg">';
                }
                ?>

            </div>
            <div class="userheading">
                <h2><?php if (isset($_SESSION['user_full_name'])) {
                        echo $_SESSION['user_full_name'];
                    } ?></h2>
            </div>
            <div class="userlogout-btn">
                <button type="button" onclick="closelogout()" class="btn1 btn">Not Now</button>
                <button type="button" class="btn2 btn" id="logout-alert">Log Out</button>
            </div>
        </div>
    </div>