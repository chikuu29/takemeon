  <!-------------Contact Us-------  -->
  <section class="container" id="contact-us">
      <div class="Contact">
          <div class="headding">CONTACT-US</div>
          <form id="contact_form">
              <input type="text" name="username" readonly placeholder="Enter Name" value="<?php  if(isset($_SESSION['user_full_name'])){ echo $_SESSION['user_full_name'];} else{ echo "";} ?>">
              <input type="email" name="useremail" readonly placeholder="Enter Email" value="<?php  if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email'];} else{ echo "";} ?>">
              <textarea id="subject" name="subject" placeholder="Write something.."></textarea>
              <input type="text" name="user_id" readonly value="<?php  if(isset($_SESSION['user_id'])){ echo $_SESSION['user_id'];} else{ echo "";} ?>" placeholder="User Id">
              <div class="cbtn">
                  <button type="button" id="contact_btn_submit">Submit</button>
                  <button type="reset">Reset</button>
              </div>


          </form>
      </div>

  </section>
  <!-------------Contact Us-------  -->
  <!-- google ads -->
  <div class="container ads-banner">

  </div>
  <!-- google ads -->
  <!-------- foooter ----------->

  <section>
      <footer id="foot-scoll">
          <div class="main-content about-us">
              <div class="main-footer">
                  <div class="cm1 item">
                      <img src="img/takemeon.png" alt="">
                  </div>
                  <div class="cm2 item">
                      <h2>-About Us</h2>
                      <p>
                          <span style="color: skyblue;">Takemeon.in </span> is the tourist helpline website.Hear We
                          provided to you the information about place,people
                          culture,hotel,food & activites in state wise all over the country.

                      </p>
                      <p>Contact-Us:- </p><a href="https://mail.google.com/" target="_blank">takemeon.care@takemeon.in</a>
                  </div>
                  <div class="cm3 item">
                      <h2>-:Follow Us:-</h2>
                      <div class="f-social">
                          <a href="https://www.youtube.com/c/eAmChikuu" target="_blank"><i class="fab fa-youtube"></i></a>
                          <a href="https://www.instagram.com/eamchikuuu/" target="_blank"><i class="fab fa-instagram"></i></a>
                          <a href="https://www.facebook.com/eamchikuu" target="_blank"><i class="fab fa-facebook-square"></i></a>

                      </div>

                  </div>
              </div>


          </div>
          <div class="last-node">
              <div class="last-cont">
                  <div class="c1">
                      Copyright © 2021 All Rights Reserved <a href="https://takemeon.in/"><span style="color: skyblue; font-size: 20px; font-weight: bold;font-family: roboto,sans-serif;">Takemeon.in</span></a>
                  </div>
                  <ul class="c2">
                      <li><a href="index.php">Home</a></li>
                      <li>Terms &amp; Conditions</a></li>
                      <li><a href="privacypolicy.html">Privacy policy</a></li>
                      <li><a href="#">Contact us</a></li>
                  </ul>
              </div>
          </div>

      </footer>

  </section>
  <!-------- foooter -----X------>


  <!-- slick slider----- -->


  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

  <script src="js/mobailnavabar.js"></script>
  <script src="js/main.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 