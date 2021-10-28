<?php include 'header.php' ?>

<title>Takemeon.in | Find travel destinations</title>
<meta name="description" content="We give you your destinations,about place,hotel,activites,food,photo">

</head>

<body>
    <!-- --------Preloader------------------ -->
    <!-- <div id="preloader"></div> -->
    <!-- --------Preloader------------X------ -->

    <?php include 'navbar.php' ?>




    <!-- ------- search box and animation text------ -->
    <section class="background search-section">
        <div class="search-box">
            <div class="first-half">
                <h2>it's time to </h2>
                <p class="typing">hyy</p>
            </div>
            <div class="second-half">
                <form action="#" class="search">
                    <input type="text" id="searh_input" name="search" placeholder="Find Place...." onkeyup="get_search_result(this.value)">
                    <button type="reset" id="search_btn"><i class="fas fa-search"></i></button>
                </form>

            </div>
            <div class="third-half" id="search-item">
                <ul id="searh_holder">
                    
                  
                       

                </ul>

            </div>



        </div>
    </section>

    <!-- ------- search box and animation text------X -->

    <!-- google ads -->
    <!-- <div class="container ads-banner">


    </div> -->
    <!-- google ads -->


    <!-- ------------Recent-post---------- -->
    <div class="container">
        <div class="recent-post-container">
            <div class="page-containt-holder">
                <div class="headding">RECENT POST</div>
                <hr>
                <div id="show_recent_post_data">



                </div>



            </div>
            <div class="sidebar">

                <div class="top-post">
                    <h1 class="headding">POPULAR POST</h1>
                    <div class="popular-post" id="show_popular_post">




                    </div>

                </div>
                <!-- -------Google Ads-------- -->
                <div class="ads" style="height: 30vh;">


                </div>
                <!-- -------Google Ads--------X--- -->


                <div class="top-post">
                    <h1 class="headding"> All Post</h1>
                    <div class="popular-post" id="show_popular_blog">
                     


                    </div>
                    


                </div>
                <!-- -------Google Ads-------- -->
                <div class="ads" style="height: 30vh;">


                </div>
                <!-- -------Google Ads--------X--- -->

            </div>
        </div>
    </div>
    <!-- ------------Recent-post----------X -->
    <!-- google ads -->
    <div class="container ">

    </div>
    <!-- google ads -->

    <!-- ---------Top Place ---------------->
    <section class="container">
        <span>
            <h1 class="headding">State</h1>
        </span>
        <div class="main-content sclick-slider" id="show_state_data">



        </div>
    </section>

    <!-- ---------Top Place --------X-------->


    <!-- google ads -->
    <div class="container">

    </div>
    <!-- google ads -->
    <section class="container">
        <div class="headding">Top Attraction</div>
        <div class="all_post content-noslickbar" id="show_top_place">
            
            


        </div>
    </section>


    
    <?php

    $API_Key="AIzaSyCgiBtSgY7W7LefIcX68r-gp4YwNJX-FII";
    $API_Url="https://www.googleapis.com/youtube/v3/";
    $channel_id='UCFKNtk8cHF2DSwZpB7ApuYQ';
    
    $url_bulider = array(
        'part'=>'snippet,contentDetails,statistics',
        'id'=> $channel_id,
        'key'=>$API_Key,
    );

    $url=$API_Url.'channels?'.http_build_query($url_bulider);
 
    $channel_detailes=json_decode(file_get_contents($url));
    $url_bulide = array(
        'part'=>'snippet,contentDetails',
        'maxResults'=>10,
        'playlistId'=>'UUFKNtk8cHF2DSwZpB7ApuYQ',
        'key'=>$API_Key
        
        
        
    );
    $url=$API_Url.'playlistItems?'.http_build_query($url_bulide);
    
    $playlist_details=json_decode(file_get_contents($url),true);
    
    $data=$playlist_details['items'];
    // <!-- -----------youtube video -holder-------- -->
    echo '  <section class="container">
    <div class="headding">Youtube Vlog Video</div>
    <div class="yt-video-holder">';

    foreach($data as $video){
        $id = $video['contentDetails']['videoId'];
        echo "<div class='yt-video'>
        <iframe src='https://www.youtube.com/embed/$id' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
    </div>";
    }
   echo '</div>
   </section>';

//    <!-- -----------youtube video -holder-------- -->

  






?>
    
  
           
            

      



    <!-- google ads -->
    <div class="container ads-banner">

    </div>
    <!-- google ads -->


    <!-------------Contact Us-------  -->
    <?php include 'contact.php'  ?>
    <!-------- foooter -----X------>
    <script src="js/get-post-data.js"></script>
    <!-- adding new search js file  -->
    <script src="js/fetch_search_item.js"></script>












    <!-- javascript for text animation -->

    <script>
        const Text = ['Traveling', 'Welcome To', 'Takemeon.in ', 'Find Place', 'Tourist Place', 'Information'];
        let count = 0;
        let index = 0;
        let currentText = "";
        let letter = "";
        (function typing() {
            if (count === Text.length) {
                count = 0;
            }
            currentText = Text[count];
            letter = currentText.slice(0, ++index);
            document.querySelector('.typing').textContent = letter;
            if (letter.length === currentText.length) {
                count++;
                index = 0;
            }
            setTimeout(typing, 400);
        }());
    </script>
    <!-- javascript for text animation -->
    <script>
        //       var logout=document.getElementById('logout');
        //       var nav=document.getElementById('nav');
        //       window.onclick = function (event) {
        //     if (event.target == nav  ) {
        //         // logout.style.display = "";
        //     }
        // }
    </script>


    <?php include 'footer.php' ?>